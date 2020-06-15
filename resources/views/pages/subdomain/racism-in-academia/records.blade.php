@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.subdomain.app')
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
    $platform = str_replace(' ', '', strtolower($platform));
    if (($platform == 'osx' || $platform == 'ios') && strtolower($browser) == 'safari') {
        $recordIsDisabled = true;
    }
    ?>
    <div class="container">
        <div class="kt-portlet" style="margin-top: 80px;">
            <div class="kt-portlet__body">
                <center><h1 class="display-4">Please share any of your fears, frustrations, and needs, as well as what
                        has been helping you get through this crisis.</h1></center>
                <center><h3>Type in the box below</h3></center>
                <div id="recording-widget" class="row">
                <div id="text-record-area" class="col-lg-4 col-md-4 col-sm-12">
                    <div id="recordingsList-txt" class="d-none">
                        <h3>Your text:</h3>
                    </div>
                    <form>
                        <div class="form-group">
                            <label for="text-area"></label>
                            <textarea class="form-control" aria-label="With textarea" name="mind-text"></textarea>
                        </div>
                    </form>
                    <div class="text-center">
                        <div class="btn-group mb-3 mt-3">
                            <button class="btn btn-success d-none" id="uploadInfo-text" data-toggle="modal"
                                    data-target="#uploadModal" data-backdrop="static" data-keyboard="false">Submit
                            </button>
                        </div>
                    </div>
                </div>
                <div id="audio-record-area" class="recorder_wrapper col-lg-4 col-md-4 col-sm-12">
                    <div class="recorder record_btn" id="recorder"
                         style="margin: auto; text-align: center;justify-content: center; align-items: center;display: flex">
                    </div>
                </div>
                <div id="video-record-area" class="col-lg-4 col-md-4 col-sm-12">
                    <div class="text-center d-flex justify-content-center" id="preview">
                        <div id="spinner" class="d-none kt-spinner kt-spinner--v2 kt-spinner--lg kt-spinner--primary"></div>
                        <video id="live-video" width="270" height="200" muted autoplay="autoplay" class="d-none"></video>
                    </div>
                    @if($recordIsDisabled)
                        <p class="error">The Safari browser allows you to type text and record audio, but not video. If you
                            want to record video, please use a different browser like Chrome or Firefox.</p>
                    @else
                        <center>
                            <button id="cameraButton" class="btn btn-primary btn-wide btn-lg" style="width:300px;">
                                <i class="la la-camera"></i> Request video camera
                            </button>
                        </center>
                    @endif

                    <div class="recorder_wrapper">
                        <div class="recorder">
                            <button class="record_btn" id="video-record-button" style="display: none;">
                                <svg class="bi bi-camera-video-fill" width="1em" height="1em" viewBox="0 0 16 16"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.667 3h6.666C10.253 3 11 3.746 11 4.667v6.666c0 .92-.746 1.667-1.667 1.667H2.667C1.747 13 1 12.254 1 11.333V4.667C1 3.747 1.746 3 2.667 3z"/>
                                    <path
                                        d="M7.404 8.697l6.363 3.692c.54.313 1.233-.066 1.233-.697V4.308c0-.63-.693-1.01-1.233-.696L7.404 7.304a.802.802 0 000 1.393z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
                <!-- Modal -->
                <div class="modal fade" id="reviewRecordingModal" tabindex="-1" role="dialog"
                     aria-labelledby="reviewRecordingModal" aria-hidden="true">
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
                                <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">
                                    Delete Recording
                                </button>
                                <button class="btn btn-success" id="uploadInfo">Save Recording</button>
                            </div>
                        </div>
                    </div>
                </div>
                <p>You will be able to save your text for private use
                    or share it publicly.
                    <span style="color: red">Please avoid using any identifying names or information. </span>
                    We hope that you will come back and record more as a journal of your thoughts and experiences.</p>
            </div>
        </div>
    </div>
    <style>
        #recording-widget{
            margin-top: 48px;
            vertical-align: middle;
            align-items: center;
            justify-content: center;
            margin-bottom: 54px;
        }
    </style>
    @include('pages.capture.modal')
@endsection

@section('scripts')
    <script src="{{ asset('js/recorder.js') }}"></script>
    <script src="{{ asset('js/pages/capture-upload.js') }}?time={{ time() }}"></script>
    <script src="{{ asset('js/pages/capture-valid.js') }}?time={{ time() }}"></script>
    <script src="{{ asset('js/pages/capture-text.js') }}?time={{ time() }}"></script>
    <script src="{{ asset('js/pages/all-recording.js') }}?time={{ time() }}"></script>
@endsection
