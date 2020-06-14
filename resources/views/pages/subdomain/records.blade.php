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
        <div class="kt-portlet" style="margin-top: 80px;">
            <div class="kt-portlet__body">

                <center><h1 class="display-4">Please share any of your fears, frustrations, and needs, as well as what has been helping you get through this crisis.</h1></center>

                <center><h3>Type in the box below</h3></center>
                <div>
                    <div id="recordingsList" class="d-none">
                        <h3>Your text:</h3>
                    </div>
                    <form >
                        <div class="form-group">
                            <label for="text-area"></label>
                            <textarea class="form-control" aria-label="With textarea" name="mind-text"></textarea>
                        </div>
                    </form>
                    <div class="text-center">
                        <div class="btn-group mb-3 mt-3">
                            <button class="btn btn-success d-none" id="uploadInfo" data-toggle="modal" data-target="#uploadModal" data-backdrop="static" data-keyboard="false">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="recorder_wrapper">
                    <div class="recorder record_btn" id="recorder"
                         style="margin: auto; text-align: center;justify-content: center; align-items: center;display: flex">
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
                                <div id="recordingsList"></div>
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

                <p>If you would prefer, you can
                    <a href="{{ route('capture-video') }}">record video</a> or
                    <a href="{{ route('capture-audio') }}">record audio</a> instead.</p>

            </div>
        </div>
    </div>
    </div>
    @include('pages.capture.modal')

@endsection

@section('scripts')
    <script src="{{ asset('js/pages/capture-text.js') }}?time={{ time() }}"></script>
    <script src="{{ asset('js/pages/capture-audio.js') }}?time={{ time() }}"></script>
    <script src="{{ asset('js/pages/capture-video.js') }}?time={{ time() }}"></script>
@endsection
