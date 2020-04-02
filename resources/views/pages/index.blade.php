@extends('layout.app')
@section('title', 'Home')
@section('description', '')
@section('content')

    <div class="container content pt-0">

        <img src="{{ asset('media/photos/covid.jpg') }}" alt="">

        <div class="text-center">
            <h1 class="display-4">Call to Action During the Covid-19 Crisis</h1>
        </div>

        <p>This is an unprecedented time.
        Our lives have been disrupted in so many ways,
        and while we are all concerned about the health of friends,
        family, and ourselves,
        we are at the same time distancing ourselves from each other.
        The uncertainty, stress, and fear can
        result in increased feelings of vulnerability,
        lack of control, and a need for support.</p>

        <p>The Child Mind Institute and its research partners
        are deeply committed to research and care of mental health
        and we are here to listen.
        We urge you to share with us your fears, frustrations, and hopes
        as an audio clip or video by clicking the link below.</p>

        <div class="text-center">
            <a href="{{ route('capture-choice') }}" class="btn-primary btn btn-wide btn-lg">Share Your Thoughts</a>
        </div>

        <p>You will be able to share it publicly in its original form
        or as a transcript, or make it private,
        even creating a journal for yourself over time.
        After you record your thoughts and feelings,
        we will ask some questions to learn more about your situation.</p>

        <p>For those who choose to contribute their recordings to scientific
        research, we will analyze them to generate recommendations and action
        plans to guide clinicians and researchers, so they can better identify
        resources to support you and others.
        We will add new features in the future to visualize your contribution
        in the context of everyone else’s, and to create a collection of
        publicly shared recordings or transcripts.</p>

    </div>

@endsection
