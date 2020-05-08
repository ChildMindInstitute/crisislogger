@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.app')
@section('title', '')
@section('capture-active', 'kt-menu__item--active')
@section('content')
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
@endsection
