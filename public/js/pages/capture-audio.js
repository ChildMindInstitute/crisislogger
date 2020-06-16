//webkitURL is deprecated but nevertheless
URL = window.URL || window.webkitURL;
let gumStream;
//stream from getUserMedia()
let rec;
//Recorder.js object
let input;
//MediaStreamAudioSourceNode we'll be recording
// shim for AudioContext when it's not avb.
let AudioContext = window.AudioContext || window.webkitAudioContext;
let audioContext = new AudioContext;
//new audio context to help us record
let timeoutRequest;
let isRecording = false;
let button = document.getElementById("recorder");
const micIcon = "<i class=\"fa fa-microphone\" style='text-align: center;margin: 0 auto'></i>\n"
const stopIcon = `
<svg id="stop-icon" class="bi bi-stop-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path d="M5 3.5h6A1.5 1.5 0 0112.5 5v6a1.5 1.5 0 01-1.5 1.5H5A1.5 1.5 0 013.5 11V5A1.5 1.5 0 015 3.5z"/>
</svg>
`;
button.innerHTML = micIcon;
let recordingsList = document.getElementById("recordingsList");
let upload = document.getElementById('upload');
let upload_info = document.getElementById('uploadInfo');
//add events to those 3 buttons
button.addEventListener("click", toggleRecording);

function toggleRecording() {
    if (isRecording) {
        stopRecording();
        isRecording = false;
    } else {
        startRecording();
    }
}

function startRecording(){
    //console.log('recording clicked');
    isRecording = true;
    button.innerHTML = stopIcon;
    button.classList.add('recording');

    if ( navigator.vibrate ) navigator.vibrate( 150 );
    // Remove the old recording, if we are re-recording
    recordingsList.innerHTML = '';
    //upload_info.classList.add('d-none');

    /* Simple constraints object, for more advanced audio features see
    https://addpipe.com/blog/audio-constraints-getusermedia/ */

    let constraints = {
        audio: true,
        video: false
    };

    /* We're using the standard promise based getUserMedia()
    https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia */
    navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
        console.log("getUserMedia() success, stream created, initializing Recorder.js ...");
        /* assign to gumStream for later use */
        gumStream = stream;
        /* use the stream */
        input = audioContext.createMediaStreamSource(stream);
        /* Create the Recorder object and configure to record mono sound (1 channel) Recording 2 channels will double the file size */
        rec = new Recorder(input, {
            numChannels: 1
        })
        //start the recording process
        rec.record()
        console.log("Recording started");

        isRecording = true;
        button.innerHTML = stopIcon;
        button.classList.add('recording');
        if ( navigator.vibrate ) navigator.vibrate( 150 );

        //limit recording to 5 mins = 300,000 ms
        timeoutRequest = setTimeout(function() {
            console.log('Recording time limit reached')
            stopRecording();
        }, 300000);

    }).catch(function(err) {
        isRecording = false;
        button.classList.remove('recording');
        button.innerHTML = micIcon;
    });
}

function stopRecording() {
    console.log('recording stopped');

    isRecording = false;
    button.classList.remove( 'recording' );
    button.innerHTML = micIcon;
    if ( navigator.vibrate ) navigator.vibrate( [ 200, 100, 200 ] );

    //tell the recorder to stop the recording
    rec.stop(); //stop microphone access
    gumStream.getAudioTracks()[0].stop();
    //create the wav blob and pass it on to createDownloadLink
    rec.exportWAV(createDownloadLink);

    clearTimeout(timeoutRequest);
}

function createDownloadLink(blob) {
    let url = URL.createObjectURL(blob);
    let au = document.createElement('audio');
    let li = document.createElement('div');
    // let link = document.createElement('a');
    //add controls to the <audio> element
    au.controls = true;
    au.src = url;
    au.style['width'] = '100%';
    // au.classList.add('audio-record');
    //link the a element to the blob
    // link.href = url;
    // link.download = new Date().toISOString() + '.wav';
    // link.innerHTML = '<i class="flaticon-download flaticon"></i>';
    // link.classList.add('download-link');
    //add the new audio and a elements to the li element
    li.appendChild(au);
    // li.appendChild(link);

    let filename = new Date().toISOString();
    //filename to send to server without extension
    upload.addEventListener('click', async (e) => {
        e.preventDefault();
        if (!$('input[name="share"]').is(':checked'))
        {
            $('.share-section').after().find('.invalid-feedback').remove();
            $('.share-section').after().append("<span class='invalid-feedback'>You need to choose one of the above options.</span>").show()
            return false;
        }
        if (!$('#years-old').is(':checked'))
        {

            $('#years-old-label').after().find('.invalid-feedback').remove();
            $('#years-old-label').after("<span class='invalid-feedback'>You need to click above checkbox before continue.</span>").show()
            return false;
        }
        uploadButtonClicked(blob, filename);
    });

    recordingsList.appendChild(li);
    $("#reviewRecordingModal").modal({
        backdrop: 'static',
        keyboard: false
    });
}

