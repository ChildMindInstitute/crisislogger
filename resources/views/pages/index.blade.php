@extends('layout.app')
@section('title', 'Home')
@section('description', '')
@section('content')

    <div class="container content pt-0">

        <img src="https://place-hold.it/1200x300">

        <div class="text-center">
            <h1 class="display-4">A Call to Action for Parents During the Covid-19 Crisis</h1>
        </div>

        <p>This is an unprecedented time.
        Not only is everyone worried about the health of friends and family
        during the Covid-19 pandemic, we must be concerned for our ourselves,
        and how we will manage through this crisis.
        Our lives are lacking in the structure and familiarity of an established
        routine, impacting our emotional wellbeing,
        resulting in increased feelings of vulnerability,
        lack of control, and a need for support.</p>
        <p>Here is our call to action: we need for you to share with us
        your fears, frustrations, and hopes in the form of
        an audio clip or video by clicking the link below.
        You can share this publicly in its original form or as a transcript,
        or you can choose to make it private,
        even creating a journal for yourself over time.
        After you record your thoughts and feelings,
        we will ask some questions to learn more about your situation.</p>

        <div class="text-center">
            <a href="{{ route('capture-choice') }}" class="btn-primary btn btn-wide btn-lg">Share Your Thoughts</a>
        </div>

        <p>The Child Mind Institute and its research partners
        are deeply committed to research and care of mental health, and
        will analyze this information to generate recommendations and action plans
        to guide clinicians and researchers, so they can better identify
        resources to support you and others.
        We will add new features in the future to visualize your contribution
        in the context of everyone else’s, and to create a collection of
        publicly shared recordings or transcripts.</p>

    </div>

@endsection
