@extends('layout.authorized.app')
@section('title', 'Word Clouds')
@section('word-clouds-active', 'kt-menu__item--active')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @component('components.portlet')
                    <p>When you record your thoughts, and you choose to contribute to science, they will be transcribed and shown here as word clouds.</p>
                @endcomponent
            </div>
        </div>
        <div id="clouds">
            @include('components.spinner')
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://d3js.org/d3.v3.min.js"></script>
    <script src="https://rawgit.com/jasondavies/d3-cloud/master/build/d3.layout.cloud.js"></script>
    <script src="{{ asset('js/pages/word-clouds.js') }}?time={{ time() }}"></script>
@endsection

