@extends('layout.authorized.app')
@section('title', 'Word Clouds')
@section('word-clouds-active', 'kt-menu__item--active')
@section('content')

    <div class="container-fluid">
        <div class="row" id="clouds">
            @include('components.spinner')
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://d3js.org/d3.v4.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/holtzy/D3-graph-gallery@master/LIB/d3.layout.cloud.js"></script>
    <script src="{{ asset('js/pages/word-clouds.js') }}?time={{ time() }}"></script>
@endsection

