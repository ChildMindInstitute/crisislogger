@include('layout.authorized.header')
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid   kt-page--loading">

    @include('layout.authorized.header-mobile')

    <div class="kt-grid kt-grid--hor kt-grid--root" id="content-area">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
                @include('layout.authorized.menu.aside')
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                <!-- begin:: Header -->
                <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed header-section ">

                    <div class="container  kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                        <div class="col-sm-12 col-md-4 float-left" style="padding: unset;">
                            <a href="{{ route('home') }}"><img alt="{{ config('app.name') }}" src="{{ asset('media/logos/CrisisLogger_logo_border.png') }}" style="max-height: 48px; max-width: 150px;margin-top: 5px" alt="{{ config('app.name') }}" /></a>
                        </div>
                        <div class="col-sm-12 col-md-8">

                            <div class="kt-header__topbar float-right" style="margin-top: 5px;">

                                <!--begin: Search -->

                                <!--end: Search -->

                                <!--begin: Notifications -->

                                <!--end: Notifications -->

                                <!--begin: Quick Actions -->

                                <!--end: Quick Actions -->

                                <!--begin: User Bar -->
                            @include('layout.authorized.user-bar')

                            <!--end: User Bar -->
                            </div>
                            <div class="float-right">
                                <a href="https://explore.crisislogger.org" class="btn btn-wide btn-lg">Explore</a>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('capture-choice') }}" class="btn btn-wide btn-lg">Share</a>
                            </div>

                        </div>

                    </div>

                    <!-- begin:: Header Topbar -->

                    <!-- end:: Header Topbar -->
                </div>

                <!-- end:: Header -->
                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                    <!-- begin:: Subheader -->
                    <!-- end:: Subheader -->

                    <!-- begin:: Content -->
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" >
                        @yield('content')
                    </div>
                    <!-- end:: Content -->
                </div>

            </div>

        </div>
    </div>
    @include('layout.authorized.footer')

    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#5d78ff",
                    "dark": "#282a3c",
                    "light": "#ffffff",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": [
                        "#c5cbe3",
                        "#a1a8c3",
                        "#3d4465",
                        "#3e4466"
                    ],
                    "shape": [
                        "#f0f3ff",
                        "#d9dffa",
                        "#afb4d4",
                        "#646c9a"
                    ]
                }
            }
        };
    </script>
    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->
    <script src="{{ asset('js/custom.js') }}?time={{ time() }}" type="text/javascript"></script>
    @yield('scripts')
</body>
</html>
