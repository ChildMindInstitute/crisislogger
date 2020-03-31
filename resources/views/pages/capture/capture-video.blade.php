@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.app')
@section('title', 'Capture Thoughts')
@section('capture-active', 'kt-menu__item--active')
@section('content')

    <div class="container content">
        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <h1 class="display-4">Capture Your Thoughts on COVID-19</h1>
                <h3>Create a video recording</h3>
                <p>If you wish to create an audio recording, <a href="{{ route('capture') }}">click here.</a></p>
                <p>Press Request Camera to allow access to your camera.</p>
                <p>Press Start to begin recording your thoughts and feelings.</p>
                <p>Press Stop to end recording. You will be able to save the recording for private use or share it publicly as is or as a transcript.</p>
                <p>Press Start if you wish to re-record and overwrite your recording.</p>

                <div class="text-center">
                    <video id="live-video" width="270" height="200" muted controls class="d-none"></video>
                </div>

                <div>
                    <div id="recordingsList" class="d-none">
                        <h3>Your recording:</h3>
                        <video id='video' controls></video>
                    </div>

                    <div class="text-center">
                        <div class="btn-group mb-3 mt-3">
                            <button id="cameraButton" class="btn btn-info">
                                <i class="la la-camera"></i> Request Camera
                            </button>
                            <button id="recordButton" class="btn btn-success">
                                <i class="la la-play"></i> Start
                            </button>
                            <button id="stopButton" class="btn btn-danger">
                                <i class="la la-stop"></i> Stop
                            </button>
                        </div>
                    </div>

                    <div id="uploadInfo" class="d-none">
                        <button class="btn btn-success" data-toggle="modal" data-target="#uploadModal">Upload File</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.capture.modal')

@endsection

@section('scripts')
    <script src="{{ asset('js/pages/capture-valid.js') }}"></script>
    <script src="{{ asset('js/pages/capture-upload.js') }}"></script>
    <script src="{{ asset('js/pages/capture-video.js') }}?time={{ time() }}"></script>
@endsection
