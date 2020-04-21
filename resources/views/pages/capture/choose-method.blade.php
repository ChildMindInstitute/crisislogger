@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.app')
@section('title', 'Choose Recording Method')
@section('capture-active', 'kt-menu__item--active')
@section('content')

    <div class="container">
        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <center><h1 class="display-4">How would you like to share your thoughts?</h1></center>
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
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/pages/choose-method.js') }}?time={{ time() }}"></script>
@endsection