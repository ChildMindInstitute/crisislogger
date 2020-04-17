@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.app')
@section('title', '')
@section('capture-active', 'kt-menu__item--active')
@section('content')

    <div class="container">
        <div class="kt-portlet">
            <div class="kt-portlet__body">

                <center><h1 class="display-4">Capture your thoughts and feelings in audio</h1></center>

                <div>
                    <div class="recorder_wrapper">
                        <div class="recorder record_btn" id="recorder" style="margin: auto; text-align: center;justify-content: center; align-items: center;display: flex">

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
                                    <div id="recordingsList" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Delete Recording</button>
                                    <button class="btn btn-success" id="uploadInfo">Save Recording</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
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
                <a href="{{ route('capture-video') }}">record video</a> or
                <a href="{{ route('capture-text') }}">type text</a> instead.</p>

            </div>
        </div>
    </div>

    @include('pages.capture.modal')

@endsection

@section('scripts')
    <script src="{{ asset('js/recorder.js') }}"></script>
    <script src="{{ asset('js/pages/capture-valid.js') }}?time={{ time() }}"></script>
    <script src="{{ asset('js/pages/capture-upload.js') }}?time={{ time() }}"></script>
    <script src="{{ asset('js/pages/capture-audio.js') }}?time={{ time() }}"></script>
@endsection
