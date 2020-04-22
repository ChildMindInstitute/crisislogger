<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-footer__copyright" style="width: 100%; padding-top:25px;">
            <div class="row text-center" style="width: 100%;justify-content: center">
                <p class="col-lg-1 col-md-4 col-sm-12"><a href="/privacy.html" style="color: #74788d !important;">Privacy</a></p>
                <p class="col-lg-1 col-md-4 col-sm-12">©2020 Child Mind Institute</p>
                <p class="col-lg-1 col-md-4 col-sm-12"><img class="third-party-logos" src="{{ asset('media/logos/CMI_spot_logo.jpg') }}" alt="" style="max-height:50px;" /></p>
                <p class="col-lg-1 col-md-4 col-sm-12"><img class="third-party-logos" src="{{ asset('media/logos/parents_magazine_logo.png') }}" alt="" style="max-height:20px;" /></p>
                <p class="col-lg-1 col-md-4 col-sm-12"><img class="third-party-logos" src="{{ asset('media/logos/nimh-logo.png') }}" alt="" style="max-height:30px;" /></p>
                <p class="col-lg-1 col-md-4 col-sm-12"><img class="third-party-logos" src="{{ asset('media/logos/open-humans.png') }}" alt="" style="max-height:30px;" /></p>
                <p class="col-lg-1 col-md-4 col-sm-12"><img class="third-party-logos" src="{{ asset('media/logos/CRI.png') }}" alt="" style="max-height:50px;" /></p>
            </div>
        </div>
    </div>
</div>
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
