@extends('layout.authorized.app')
@section('title', 'My Recordings and Word Clouds')
@section('dashboard-active', 'kt-menu__item--active')
@section('content')

    <div class="container gallery-container" style="margin-top: 100px;">
        <div id="dashboard_gallery">
        </div>
    </div>
@endsection
<style>
    .remove-btn {
        display: inline-grid;
        bottom: 0px;
        position: absolute;
    }
    a {
        font-size: 13px !important;
        color: #000000 !important;
    }
</style>
