<html lang="en" >
<head>
    <meta charset="utf-8"/>

    <title>{{ config('app.name') }}</title>
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="{{ config('app.name') }}" href="{{ asset('media/favicon/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('media/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('media/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('media/favicon/site.webmanifest')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="{{asset('media/favicon/browserconfig.xml')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{ asset('css/pages/login/login-3.css') }}" rel="stylesheet" type="text/css" />
    @yield('styles')
    <!--end::Page Custom Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('css/skins/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/skins/aside/dark.css') }}" rel="stylesheet" type="text/css" />        <!--end::Layout Skins -->
    <link href="{{ asset('scss/main.css') }}?time={{ time() }}" rel="stylesheet" type="text/css" />

    <style>

        .text-ellipsis {
            height: 150px;
            display: inline-block;
            /* width: 514px; */
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 20px;
            font-size: 1.3rem;
            margin: 0px;
            overflow-y: scroll;
            background: rgba(228, 228, 228, 0.98);
            resize: both;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
