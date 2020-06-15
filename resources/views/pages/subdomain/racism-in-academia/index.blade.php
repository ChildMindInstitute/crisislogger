@extends('layout.app')
@section('title', 'Home')
@section('description', '')
@section('content')
    <div class="container kt-portlet pt-0">
        <p>Subdomain</p>
        <img src="{{ asset('media/photos/crisislogger-banner-plus-logo.png') }}" alt="">
        <a href="{{ route('login') }}" class="login-btn text-white btn-lg">Login</a>
        <div class="text-center">
            <br>
            <h1 class="display-4">Please share your thoughts on racism in academia</h1>
        </div>


        <div class="text-center" style="margin-bottom: 30px;margin-top: 30px">
            <a href="{{ route('capture-video') }}" class="btn-primary btn btn-wide btn-lg mb-4">Share Your Thoughts</a>
        </div>

        <p>In a year of political and social unrest, in the midst of a pandemic, we may finally be witnessing
        a global revolution against systemic racial injustice. A long litany of events exposing racist policies
        and violence has culminated in the horrific murder of George Floyd by police officers meant to protect society.
        This has led to uniform condemnation of his murder, an explosion of protests, and public statements opposing
        racism from prominent figures, corporations, and communities. The scientific and academic research communities
        are stepping up and taking an anti-racist stance as well.  From shutdownstem.com:</p>

        <p><i>As members of the global academic and STEM communities, we have an enormous ethical obligation
        to stop doing "business as usual." No matter where we physically live, we impact and are impacted
        by this moment in history...
        Direct actions are needed to stop this injustice. Unless you engage directly with eliminating racism,
        you are perpetuating it. This moment calls for profound and meaningful change.</i></p>

        <p>We invite you to share your thoughts and personal experience regarding racism in academia —
        including your concerns, frustrations, and suggestions — as an audio or video recording,
        by clicking the "Share Your Thoughts" link above. Explore what others have recorded by clicking the
        "Listen to Others' Thoughts". If you choose to contribute your recording to science,
        it will help researchers to coordinate efforts to better understand the many ways people are responding to
        these injustices in their personal lives so that we can advance public policy and mental health initiatives.</p>

        <p><span class="text-muted">The Child Mind Institute has partnered with
        OpenHumans.org and the CRI - Université de Paris.
        CrisisLogger comes out of the <a href="https://matter.childmind.org">MATTER Lab</a>
        at the Child Mind Institute.</span></p>

    </div>
@endsection
