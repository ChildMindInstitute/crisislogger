<?php
    $agent = new \Jenssegers\Agent\Agent();
    $isMobile = $agent->isMobile();
?>
<div class="header" style="text-align: right; padding-top: 0px; padding-bottom: 0px;">
    <div class="container kt-header">
        <div class="row">
            <div class="col-12 my-auto ml-auto">

                <div> <!--div class="float-right"-->
                    @if (Route::current()->getName() !== 'home')

                    @auth
                        <div class="float-right">
                            <a class="btn btn-wide btn-lg" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="ni ni-user-run"></i>
                                <span>{{ __('Logout') }}</span>
                            </a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else

                        <div class="float-left">
                            <a href="{{ route('home') }}"><img alt="{{ config('app.name') }}" src="{{ asset('media/logos/CrisisLogger_logo_border.png') }}" style="max-height:100px;" /></a>
   	                </div>
                        <div class="float-right">
                            <a href="{{ route('login') }}" class="btn btn-wide btn-lg">Login</a>
                        </div>
                    @endauth
                        <div class="float-right">
                            <a href="https://explore.crisislogger.org" class="btn btn-wide btn-lg">Explore</a>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('capture-choice') }}" class="btn btn-wide btn-lg">Share</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
