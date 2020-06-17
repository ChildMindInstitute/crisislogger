var video, timeoutRequest, reqBtn, recordButton, stream, recorder;
let video_preview = document.getElementById('video_preview');
let audio_preview = document.getElementById('audio_preview');
video_preview.setAttribute('style', 'width: 100%');
reqBtn = document.getElementById('cameraButton');
reqBtn.onclick = requestVideo;
recordButton = document.getElementById('video-record-button');
videoContainer = document.getElementById('recordingsList');

let videoUpload = document.getElementById('upload');
let preview = document.getElementById('live-video');
let spinner = document.getElementById('spinner');

let isVideoRecording = false;
const camIcon = `
<svg class="bi bi-camera-video-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path d="M2.667 3h6.666C10.253 3 11 3.746 11 4.667v6.666c0 .92-.746 1.667-1.667 1.667H2.667C1.747 13 1 12.254 1 11.333V4.667C1 3.747 1.746 3 2.667 3z"/>
    <path d="M7.404 8.697l6.363 3.692c.54.313 1.233-.066 1.233-.697V4.308c0-.63-.693-1.01-1.233-.696L7.404 7.304a.802.802 0 000 1.393z"/>
</svg>
`;
const videoStopIcon = `
<svg id="stop-icon" class="bi bi-stop-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path d="M5 3.5h6A1.5 1.5 0 0112.5 5v6a1.5 1.5 0 01-1.5 1.5H5A1.5 1.5 0 013.5 11V5A1.5 1.5 0 015 3.5z"/>
</svg>
`;
recordButton.addEventListener("click", toggleRecording);

function toggleRecording() {
    if (isAudioRecording)
    {
        Swal.fire({
            text:' You should stop the recording to start new one'
        })
        return false;
    }
    if (isVideoRecording) {
        stopVideoRecording();
        isVideoRecording = false;
    } else {
        startVideoRecording();
    }
}
function requestVideo() {

    if (document.getElementById('error-id'))
    {
        document.getElementById('error-id').remove();
    }
    spinner.classList.remove('d-none');

    let constraints = {
        audio: true,
        video: {
            width: {min: '100%', ideal: 320},
            height: {min: 240, ideal: 240},
        }
    };

    navigator.mediaDevices.getUserMedia(constraints).then(stm => {
        stream = stm;
        reqBtn.style.display = 'none';
        recordButton.removeAttribute('disabled');
        preview.srcObject = stream;
        preview.captureStream = preview.captureStream || preview.mozCaptureStream;
        preview.classList.remove('d-none');
        spinner.classList.add('d-none');
        recordButton.style.display = "inline-block";
    }).catch(e => {
        if (e)
        {

            let errorMsg = 'We can not find the camera device. please check and try again';
            let error = document.createElement('p');
            error.innerText =  errorMsg;
            error.setAttribute('id', 'error-id');
            error.classList.add('error');
            reqBtn.after(error);
            spinner.classList.add('d-none');
        }
    });
}

function startVideoRecording() {
    isVideoRecording = true;
    recordButton.innerHTML = videoStopIcon;
    recordButton.classList.add('recording');
    if (document.getElementById('error-id'))
    {
        document.getElementById('error-id').remove();
    }
    if ( navigator.vibrate ) navigator.vibrate( 150 );

    preview.classList.remove('d-none');
    try {
        recorder = new MediaRecorder(stream, {
            mimeType: 'video/webm'
        });
        recorder.start();
        timeoutRequest = setTimeout(function() {
            console.log('Recording time limit reached')
            stopRecording();
        }, 300000);
    }
    catch (e) {
        isVideoRecording = false
        recordButton.classList.remove('recording');
        recordButton.innerHTML = camIcon;
        let errorMsg = 'Seems like your browser does\'t support video recording, please try to use Chrome or Firefox';
        let error = document.createElement('p');
        error.innerText =  errorMsg;
        error.setAttribute('id', 'error-id');
        error.classList.add('error');
        recordButton.after(error);
    }


    //limit recording to 5 mins = 300,000 ms
    timeoutRequest = setTimeout(function() {
        stopVideoRecording();
    }, 300000);
}


function stopVideoRecording() {
    isVideoRecording = false;
    recordButton.classList.remove('recording');
    recordButton.innerHTML = camIcon;
    audio_preview.style['display'] = 'none';
    video_preview.style['display'] = 'block';
    $("#reviewRecordingModal").modal({
        backdrop: 'static',
        keyboard: false
    });
    if ( navigator.vibrate ) navigator.vibrate( [ 200, 100, 200 ] );
    const chunks = [];
    preview.classList.add('d-none');
    recorder.ondataavailable = e => {
        chunks.push(e.data);
        video_preview.src = URL.createObjectURL(e.data);
        var blob = new Blob(chunks, {type: 'video/webm'});
        let filename = new Date().toISOString() + ".webm";

        videoUpload.addEventListener('click', async (e) => {
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
    };
    recorder.stop();
    clearTimeout(timeoutRequest);
}
//webkitURL is deprecated but nevertheless
URL = window.URL || window.webkitURL;
let gumStream;
let isAudioRecording = false;
//stream from getUserMedia()
let rec;
//Recorder.js object
let input;
//MediaStreamAudioSourceNode we'll be recording
// shim for AudioContext when it's not avb.
let AudioContext = window.AudioContext || window.webkitAudioContext;
let audioContext = new AudioContext;
//new audio context to help us record
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
button.addEventListener("click", audioToggleRecording);

function audioToggleRecording() {

    if (isVideoRecording)
    {
        Swal.fire({
            text:' You should stop the recording to start new one'
        })
        return false;
    }
    if (isAudioRecording) {
        stopRecording();
        isAudioRecording = false;
    } else {
         if(audioContext.state === 'suspended') {
             audioContext.resume().then(function() {
                startRecording();
            });
            return true;
        }
        startRecording();
    }
}

function startRecording(){
    //console.log('recording clicked');
    button.innerHTML = stopIcon;
    button.classList.add('recording');

    if ( navigator.vibrate ) navigator.vibrate( 150 );
    // Remove the old recording, if we are re-recording
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
        isAudioRecording = true;
        button.innerHTML = stopIcon;
        button.classList.add('recording');
        if ( navigator.vibrate ) navigator.vibrate( 150 );

        //limit recording to 5 mins = 300,000 ms
        timeoutRequest = setTimeout(function() {
            console.log('Recording time limit reached')
            stopRecording();
        }, 300000);

    }).catch(function(err) {
        isAudioRecording = false;
        button.classList.remove('recording');
        button.innerHTML = micIcon;
    });
}

function stopRecording() {
    isAudioRecording = false;
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
    // let link = document.createElement('a');
    //add controls to the <audio> element
    audio_preview.controls = true;
    audio_preview.src = url;
    audio_preview.style['width'] = '100%';
    audio_preview.style['display'] = 'block';
    video_preview.style['display'] = 'none';
    // au.classList.add('audio-record');
    //link the a element to the blob
    // link.href = url;
    // link.download = new Date().toISOString() + '.wav';
    // link.innerHTML = '<i class="flaticon-download flaticon"></i>';
    // link.classList.add('download-link');
    //add the new audio and a elements to the li element
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
    $("#reviewRecordingModal").modal({
        backdrop: 'static',
        keyboard: false
    });
    $('#reviewRecordingModal').on('hidden.bs.modal', function () {
        audio_preview.src=null
        video_preview.src=null
    })
}

