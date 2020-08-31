@extends('layout.subdomain.app')
@section('title', 'Home')
@section('description', '')
@section('content')
    <div class="container kt-portlet pt-0">
        <img src="{{ asset('media/photos/crisislogger-banner-plus-logo.png') }}" alt="">
        <a href="{{ route('login') }}" class="login-btn text-white btn-lg">Login</a>
        <div class="text-center">
            <br>
            <h1 class="display-4">Please share your thoughts on climate change</h1>
        </div>


        <div class="text-center" style="margin-bottom: 30px;margin-top: 30px">
            <a href="{{ route('capture-records') }}" class="btn-primary btn btn-wide btn-lg mb-4">Share Your Thoughts</a>
        </div>

        <p>In a year of political and social unrest, in the midst of a pandemic, we still face the greatest environmental
	and ecological crisis our species has faced in recorded history. This has left some people feeling helpless, anxious,
	angry, or hopeless.</p>

        <p>We invite you to share your thoughts regarding climate change —
        including your concerns, frustrations, and suggestions — as an audio or video recording,
        by clicking the "Share Your Thoughts" link above. Explore what others have recorded by clicking the
        "Listen to Others' Thoughts". If you choose to contribute your recording to science,
        it will help researchers to coordinate efforts to better understand the many ways people are responding to
        this crisis in their personal lives so that we can advance public policy initiatives.</p>

        <p><span class="text-muted">The Red Cross Red Crescent is launching climate.crisislogger.org
	to better understand how people are responding to climate change.
        CrisisLogger comes out of the <a href="https://matter.childmind.org">MATTER Lab</a>
        at the Child Mind Institute.</span></p>

    </div>
@endsection
