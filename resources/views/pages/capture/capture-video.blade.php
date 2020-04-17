@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.app')
@section('title', '')
@section('capture-active', 'kt-menu__item--active')
@section('content')
<?php
    $agent = new \Jenssegers\Agent\Agent();
    $platform = $agent->platform();
    $iPhone = $agent->isPhone();
    $version = $agent->version($platform);
    $browser = $agent->browser();
    $recordIsDisabled = false;
    $platform = str_replace(' ','', strtolower($platform) );
    if (($platform == 'osx' || $platform == 'ios') && strtolower($browser) == 'safari')
   {
       $recordIsDisabled = true;
   }
?>
    <div class="container">
        <div class="kt-portlet">
            <div class="kt-portlet__body">

                <center><h1 class="display-4">Capture your thoughts and feelings in video</h1></center>

                <div class="text-center d-flex justify-content-center" id="preview">
                    <div id="spinner" class="d-none kt-spinner kt-spinner--v2 kt-spinner--lg kt-spinner--primary"></div>
                    <video id="live-video" width="270" height="200" muted autoplay="autoplay" class="d-none"></video>
                </div>
                <br>

                @if($recordIsDisabled)
                    <br>
                    <p class="error">The Safari browser allows you to type text and record audio, but not video. If you want to record video, please use a different browser like Chrome or Firefox.</p>
                @else
                    <center>
                        <button id="cameraButton" class="btn btn-primary btn-wide btn-lg" style="width:300px;">
                            <i class="la la-camera"></i> Request video camera
                        </button>
                    </center>
                @endif

                <div class="recorder_wrapper">
                    <div class="recorder">
                        <button class="record_btn" id="button" style="display: none;">
                            <svg class="bi bi-camera-video-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.667 3h6.666C10.253 3 11 3.746 11 4.667v6.666c0 .92-.746 1.667-1.667 1.667H2.667C1.747 13 1 12.254 1 11.333V4.667C1 3.747 1.746 3 2.667 3z"/>
                                <path d="M7.404 8.697l6.363 3.692c.54.313 1.233-.066 1.233-.697V4.308c0-.63-.693-1.01-1.233-.696L7.404 7.304a.802.802 0 000 1.393z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="reviewRecordingModal" tabindex="-1" role="dialog" aria-labelledby="reviewRecordingModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Review Recording</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="recordingsList">
                                    <video id='video' controls />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Delete Recording</button>
                                <button class="btn btn-success" id="uploadInfo">Save Recording</button>
                            </div>
                        </div>
                    </div>
                </div>

		<br>

                <p><b>Please share your fears, frustrations, and needs,
                and what is helping you get through this crisis.</b>
                Your recording can be up to 5 minutes long.
                You will be able to save the recording for private use
                or share it publicly, but
                please avoid using any identifying names or information.
                It will be transcribed by Google's transcription service,
                and you will be able to view a word cloud created from the transcript.
                We hope that you will come back and record more as a journal of your thoughts and experiences.</p>

                <p>If you would prefer, you can
                <a href="{{ route('capture-audio') }}">record audio</a> or
                <a href="{{ route('capture-text') }}">type text</a> instead.</p>

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
