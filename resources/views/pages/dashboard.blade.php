@extends('layout.authorized.app')
@section('title', 'My Recordings and Word Clouds')
@section('dashboard-active', 'kt-menu__item--active')
@section('content')

    <div class="container" style="margin-top: 100px;">
        <div class="row">
            @component('components/flash-message')
            @endcomponent
        </div>
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
    input[type="checkbox"] {
        visibility: hidden;
    }
    label {
        cursor: pointer;
    }
    input[type="checkbox"] + label:before {
        border: 1px solid #0067a0;
        content: "\00a0";
        display: inline-block;
        font: 16px/1em sans-serif;
        height: 16px;
        margin-right: 10px;
        vertical-align: top;
        width: 16px;
    }
    input[type="checkbox"]:checked + label:before {
        background: #fff;
        color: #0067a0;
        content: "\2713";
        text-align: center;
    }
    input[type="checkbox"]:checked + label:after {
        font-weight: bold;
    }
    input[type="checkbox"]:focus + label::before {
        outline: rgb(59, 153, 252) auto 5px;
    }
</style>
