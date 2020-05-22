@extends('layout.app')
@section('title', 'Home')
@section('description', '')
@section('content')

    <div class="container kt-portlet pt-0">

        <img src="{{ asset('media/photos/crisislogger-banner-plus-logo.png') }}" alt="">
        <a href="{{ route('login') }}" class="login-btn text-white btn-lg">Login</a>
        <div class="text-center">
   	    <br>
            <h1 class="display-4">Please tell us how you're feeling during this COVID-19 crisis</h1>
        </div>


        <div class="text-center" style="margin-bottom: 30px;margin-top: 30px">
            <a href="{{ route('capture-choice') }}" class="btn-primary btn btn-wide btn-lg mb-4">Share Your Thoughts</a>
            <a href="https://explore.crisislogger.org" class="btn-outline-primary btn btn-wide btn-lg mb-4">Listen to Others' Thoughts</a>
        </div>

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

	<p>We are here to listen and learn from your experience.
	We invite you to share your thoughts with us —
	including your fears, frustrations, and hopes —
	as an audio or video recording by clicking the "Share Your Thoughts"
        link above.
        Explore what others have recorded by clicking the "Listen to Others' Thoughts".
	If you choose to contribute your recording to science,
	it will help us find the best ways to provide support to families.</p>

        <p>The Child Mind Institute and <i>Parents</i> Magazine
	have partnered with
        the National Institute of Mental Health, OpenHumans.org,
        the CRI - Université de Paris,
        and Satrajit Ghosh and Sanu Abraham at MIT
        on this important research project.</p>

	<p><span class="text-muted">CrisisLogger comes out
	of the <a href="https://matter.childmind.org">MATTER Lab</a>
	at the Child Mind Institute.</span></p>

    </div>
@endsection
