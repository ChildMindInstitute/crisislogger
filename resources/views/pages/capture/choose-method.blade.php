@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.app')
@section('title', 'Choose Recording Method')
@section('capture-active', 'kt-menu__item--active')
@section('content')

    <div class="container content">
        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <h1 class="display-4">How would you like to capture your thoughts?</h1>
                <div class="text-center">
                    <a href="{{ route('capture-audio') }}" class="btn btn-primary btn-wide mr-5">Using Microphone</a>
                    <a href="{{ route('capture-video') }}" class="btn btn-primary btn-wide">Using Camera/Webcam</a>
                </div>
            </div>
        </div>
    </div>

@endsection
