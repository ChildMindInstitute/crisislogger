@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.app')
@section('title', 'Capture Thoughts')
@section('capture-active', 'kt-menu__item--active')
@section('content')

    <div class="container">
        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <h1 class="display-4">Capture your thoughts and feelings</h1>
                <p><b>Please share your fears, frustrations, and needs 
                during this time of crisis, as well as what is helping you to get through it.</b> 
                Your recording can range from 30 seconds to 5 minutes.
                It will be transcribed by Google's transcription service,
                and you will be able to view a <b>word cloud</b> created from the transcript.
                You will be able to save the recording for <b>private use
                or share it publicly</b>.
                We hope that you will come back and record more.
                Please avoid using any identifying names or information.</p>
                <h3>Create a video recording</h3>
                <p>If you wish to create an audio recording instead,
                <a href="{{ route('capture-audio') }}">click here.</a></p>
                <p>(1) Press <b>Request Camera</b> to allow access to your camera.</p>
                <p>(2) Press the red camera button
                to begin recording.</p>
                <p>(3) Press the red button again to end your recording.</p>

                <div class="text-center d-flex justify-content-center" id="preview">
                    <div id="spinner" class="d-none kt-spinner kt-spinner--v2 kt-spinner--lg kt-spinner--primary"></div>
                    <video id="live-video" width="270" height="200" muted autoplay="autoplay" class="d-none"></video>
                </div>

                <button id="cameraButton" class="btn btn-primary">
                    <i class="la la-camera"></i> Request Camera
                </button>

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
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Review Recording</h5>
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
