@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.app')
@section('title', '')
@section('capture-active', 'kt-menu__item--active')
@section('content')
    <div class="container">
        <div class="kt-portlet">
            <div class="kt-portlet__body">

                <center><h1 class="display-4">Share your thoughts and feelings in text</h1></center>

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

                <p><b>Please share your fears, frustrations, needs, and hopes,
                and what is helping you get through this crisis.</b>
                You will be able to save your text for private use
                or share it publicly, but                
                please avoid using any identifying names or information.
                We hope that you will come back and record more as a journal of your thoughts and experiences.</p>

                <p>If you would prefer, you can  
                <a href="{{ route('capture-video') }}">record video</a> or
                <a href="{{ route('capture-audio') }}">record audio</a> instead.</p>

            </div>
        </div>
    </div>

    @include('pages.capture.modal')

@endsection

@section('scripts')
    <script src="{{ asset('js/pages/capture-text.js') }}?time={{ time() }}"></script>
@endsection
