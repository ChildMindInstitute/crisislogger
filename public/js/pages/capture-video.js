var video, reqBtn, startBtn, stopBtn, stream, recorder, uploadBtn;
video = document.getElementById('video');
reqBtn = document.getElementById('cameraButton');
startBtn = document.getElementById('recordButton');
stopBtn = document.getElementById('stopButton');
videoContainer = document.getElementById('recordingsList');
uploadBtn = document.getElementById('uploadInfo');
reqBtn.onclick = requestVideo;
startBtn.onclick = startRecording;
stopBtn.onclick = stopRecording;
startBtn.disabled = true;
stopBtn.disabled = true;
let upload = document.getElementById('upload');

function requestVideo() {
    navigator.mediaDevices.getUserMedia({
        video: true,
        audio: true
    })
    .then(stm => {
        stream = stm;
        reqBtn.style.display = 'none';
        startBtn.removeAttribute('disabled');
        video.src = URL.createObjectURL(stream);
    }).catch(e => console.error(e));
}

function startRecording() {
    uploadBtn.classList.add('d-none');
    recorder = new MediaRecorder(stream, {
        mimeType: 'video/webm'
    });
    recorder.start();
    stopBtn.removeAttribute('disabled');
    startBtn.disabled = true;
    startBtn.innerHTML = "<i class=\"la la-circle\"></i> Recording";
}


function stopRecording() {
    const chunks = [];
    recorder.ondataavailable = e => {
        chunks.push(e.data);
        videoContainer.classList.remove('d-none');
        video.src = URL.createObjectURL(e.data);
    };
    recorder.stop();
    startBtn.removeAttribute('disabled');
    stopBtn.disabled = true;
    startBtn.innerHTML = "<i class=\"la la-play\"></i> Start";

    var blob = new Blob(chunks, {type: 'video/mp4'});
    let url = URL.createObjectURL(blob);
    uploadBtn.classList.remove('d-none');

    let filename = new Date().toISOString() + ".mp4";
    //filename to send to server without extension
    upload.addEventListener('click', async (e) => {
        e.preventDefault();
        uploadButtonClicked(blob, filename);
    });
}
