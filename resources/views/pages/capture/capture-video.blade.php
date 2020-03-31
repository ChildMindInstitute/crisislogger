@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.app')
@section('title', 'Capture Thoughts')
@section('capture-active', 'kt-menu__item--active')
@section('content')

    <div class="container">
        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <h1 class="display-4">Capture your thoughts and feelings</h1>
                <p>Please share your thoughts, feelings, fears, frustrations, needs, and hopes. Recordings can range from 30 seconds to 5 minutes.  We hope that you will come back and record more.  Please avoid using any identifying names or information.</p>
                <h3>Create a video recording</h3>
                <p>If you wish to create an audio recording, <a href="{{ route('capture-audio') }}">click here.</a></p>
                <p>Press Request Camera to allow access to your camera.</p>
                <p>Press Start to begin recording your thoughts and feelings (and again to delete and re-record).</p>
                <p>Press Stop to end recording. You will be able to save the recording for private use or share it publicly as is or as a transcript.</p>

                <div class="text-center d-flex justify-content-center" id="preview">
                    <div id="spinner" class="d-none kt-spinner kt-spinner--v2 kt-spinner--lg kt-spinner--primary"></div>
                    <video id="live-video" width="270" height="200" muted autoplay="autoplay" class="d-none"></video>
                </div>

                <div>
                    <div id="recordingsList" class="d-none">
                        <h3>Your recording:</h3>
                        <video id='video' controls></video>
                    </div>

                    <div class="text-center">
                        <div class="btn-group mb-3 mt-3">
                            <button id="cameraButton" class="btn btn-primary">
                                <i class="la la-camera"></i> Request Camera
                            </button>
                            <button id="recordButton" class="btn btn-primary d-none">
                                <i class="la la-play"></i> Start
                            </button>
                            <button id="stopButton" class="btn btn-danger">
                                <i class="la la-stop"></i> Stop
                            </button>
                            <button class="btn btn-success d-none" id="uploadInfo" data-toggle="modal" data-target="#uploadModal">Save Recording</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('pages.capture.modal')

@endsection

@section('scripts')
    <script src="{{ asset('js/pages/capture-valid.js') }}?time={{ time() }}"></script>
    <script src="{{ asset('js/pages/capture-upload.js') }}?time={{ time() }}"></script>
    <script src="{{ asset('js/pages/capture-video.js') }}?time={{ time() }}"></script>
@endsection
