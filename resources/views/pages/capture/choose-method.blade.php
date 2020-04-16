@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.app')
@section('title', 'Choose Recording Method')
@section('capture-active', 'kt-menu__item--active')
@section('content')

    <div class="container">
        <div class="kt-portlet">
            <div class="kt-portlet__body">
<<<<<<< HEAD
                <h1 class="display-4">How would you like to capture your thoughts?</h1>
                <div class="text-center">
                    <a href="{{ route('capture-audio') }}?voice={{ $_GET['voice'] ?? '' }}" class="btn btn-primary btn-wide mr-5 btn-lg">Audio</a>
                    <a id="videoButton" href="{{ route('capture-video') }}?voice={{ $_GET['voice'] ?? '' }}" class="btn btn-primary btn-wide btn-lg mr-5">Video</a>
                    <a id="textButton" href="{{ route('capture-text') }}?voice={{ $_GET['voice'] ?? '' }}" class="btn btn-primary btn-wide btn-lg">Text</a>
=======
                <center><h1 class="display-4">How would you like to capture your thoughts?</h1></center>
                <div class="row text-center">
                    <div class="col-md-4 mb-4" >
                        <a href="{{ route('capture-audio') }}?voice={{ $_GET['voice'] ?? '' }}" class="btn btn-primary btn-wide btn-lg">Audio</a>
                    </div>
                    <div class="col-md-4 mb-4" >
                        <a id="videoButton" href="{{ route('capture-video') }}?voice={{ $_GET['voice'] ?? '' }}" class="btn btn-primary btn-wide btn-lg">Video</a>
                    </div>
                    <div class="col-md-4 mb-4" >
                        <a  href="{{ route('capture-text') }}?voice={{ $_GET['voice'] ?? '' }}&type=text" class="btn btn-primary btn-wide btn-lg">Text&nbsp;&nbsp;</a>
                    </div>
>>>>>>> a2f7c055aac3004316eb39fe00477d6f9ab83307
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/pages/choose-method.js') }}?time={{ time() }}"></script>
@endsection