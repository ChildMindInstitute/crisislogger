@extends('layout.authorized.app')
@section('title', 'Dashboard')
@section('dashboard-active', 'kt-menu__item--active')
@section('content')

    <div class="container">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        My Recordings
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="row">
                    @foreach(Auth::user()->uploads() as $upload)
                        <div class="col-sm-12 col-md-4">
                            <p>{{ $upload->created_at }}</p>
                            <audio controls src="{{ $upload->name }}"></audio>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

