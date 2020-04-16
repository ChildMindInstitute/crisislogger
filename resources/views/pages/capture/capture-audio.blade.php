@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.app')
@section('title', '')
@section('capture-active', 'kt-menu__item--active')
@section('content')

    <div class="container">
        <div class="kt-portlet">
            <div class="kt-portlet__body">

                <h1 class="display-4">Capture your thoughts and feelings in audio</h1>

                <div>
                    <div class="recorder_wrapper">
                        <div class="recorder">
                            <button class="record_btn" id="button">
                                <svg class="bi bi-mic-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 3a3 3 0 016 0v5a3 3 0 01-6 0V3z"/>
                                    <path fill-rule="evenodd" d="M3.5 6.5A.5.5 0 014 7v1a4 4 0 008 0V7a.5.5 0 011 0v1a5 5 0 01-4.5 4.975V15h3a.5.5 0 010 1h-7a.5.5 0 010-1h3v-2.025A5 5 0 013 8V7a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
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
