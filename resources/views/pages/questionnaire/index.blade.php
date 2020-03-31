@extends('layout.app')
@section('title', 'Questionnaire')
@section('description', '')
@section('content')

    <div class="container">
        <form method="POST" action="">
            @csrf

            {{-- Background information --}}
            @include('pages.questionnaire.background')

            {{-- Exposure status --}}
            @include('pages.questionnaire.exposure')

        </form>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/pages/questionnaire.js') }}"></script>
@endsection
