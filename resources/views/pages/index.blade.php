@extends('layout.app')
@section('title', 'Home')
@section('description', '')
@section('content')

    <div class="container kt-portlet pt-0">

        <img src="{{ asset('media/photos/crisislogger-banner-plus-logos-4.png') }}" alt="">
        <a href="{{ route('login') }}" class="login-btn text-white btn-lg">Login</a>
        <div class="text-center">
   	    <br>
            <h1 class="display-4">Please tell us how you're feeling during this Covid-19 crisis</h1>
        </div>

	<br>
        <div class="text-center">
            <a href="{{ route('capture-choice') }}" class="btn-primary btn btn-wide btn-lg">Share Your Thoughts</a>
{{--            <a href="{{ route('login') }}" class="btn-outline-primary btn btn-wide btn-lg">Login</a>--}}
{{--            <a href="{{ route('openhumans-authenticate') }}" class="btn-outline-primary btn btn-wide btn-lg">Login</a>--}}
        </div>

	<br>

	<p>This is an incredibly challenging time,
	and the pandemic has transformed our lives in ways we never
	could have imagined.
      	We’re concerned about the health of our loved ones,
	grateful for the medical heroes and essential workers
	in our communities, and trying our best to adapt to this
	new normal. We want to be optimistic,
	but the ongoing stress and uncertainty is
	affecting us all, and it’s hard not to worry about what
	the future holds.</p>

	<p>The Child Mind Institute and <i>Parents</i> magazine
	are here to listen and learn from your experience.
	We invite you to share your thoughts with us —
	including your fears, frustrations, and hopes —
	as an audio or video recording by clicking the "Share Your Thoughts"
        link above.
	If you choose to contribute your recording to science,
	it will help us find the best ways to provide support to families.
        We greatly appreciate your participation in this important project.</p>

        <p><i>Our collaborators include
        the National Institute of Mental Health, OpenHumans.org, the CRI in Paris,
        and Satrajit Ghosh and Sanu Abraham at MIT.</i></p>

    </div>

@endsection
