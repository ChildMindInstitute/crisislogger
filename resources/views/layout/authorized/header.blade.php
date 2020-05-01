<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="{{ config('app.name') }}" href="{{ asset('media/favicon/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('media/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('media/favicon/favicon-16x16.png')}}">
    <!--begin::Fonts -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    @yield('styles')
    <!--end::Page Vendors Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('css/skins/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/brand/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/aside/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/custom.css') }}?time={{ time() }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('scss/main.css') }}?time={{ time() }}" rel="stylesheet" type="text/css" />
    <style>

        .text-ellipsis {
            height: 150px !important;
            display: inline-block;
            /*width: 514px;*/
            width: 100% !important;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 20px;
            font-size: 1.3rem;
            margin: 0px;
            overflow-y: scroll;
            background: rgba(228, 228, 228, 0.98);
            resize: both;
            cursor: pointer;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
    <!--end::Layout Skins -->
</head>
