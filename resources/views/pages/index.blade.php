@extends('layout.app')
@section('title', 'Home')
@section('description', '')
@section('content')

    <div class="container content pt-0">

        <img src="{{ asset('media/photos/parentlogger.png') }}" alt="">

        <div class="text-center">
            <h1 class="display-4">We want to hear your thoughts and feelings during the Covid-19 crisis</h1>
        </div>
    @if(Session::has('authorization_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('authorization_success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
        @if(Session::has('authorization_failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('authorization_failed')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
	<br>
        <p>This is an unprecedented time,
	and our lives have been disrupted by the Covid-19 pandemic
	in so many ways.
        We are all concerned about the health of our family and friends,
        and facing new challenges we could never have imagined.
	At the same time as we're distancing ourselves from each other,
        the stress, uncertainty, and fear gives us an even greater
        need for support.</p>

        <p>The Child Mind Institute and its partners*
        are deeply committed to mental health,
        and we are here to listen.
	We are launching an important research project
        and hope you will share your fears,
        frustrations, and hopes with us in an audio or video clip
	by clicking the link below.
	After you record your thoughts and feelings,
	we will ask some questions to learn more about your situation.</p>

        <div class="text-center">
            <a href="{{ route('capture-choice') }}" class="btn-primary btn btn-wide btn-lg">Share Your Thoughts</a>
        </div>

	<br>
        <p>You can share your recording publicly in its original form
        or as a transcript, or decide to keep it private,
        and even create a journal for yourself over time.</p>

        <p>For those who choose to contribute their recordings to scientific
        research, we will analyze them to create recommendations for
	how clinicians and researchers can best support
	families as we move ahead.
        We will continue to add new features to the website
	to visualize your contribution
        in the context of everyone else’s, and to create a collection of
        publicly shared recordings or transcripts.</p>

        <p>We know how precious your time is, and greatly appreciate
	your participation in this project.</p>

        <p>*Our list of partners is growing, and presently includes
        Parents Magazine, the National Institute of Mental Health, Open Humans,
        the CRI in Paris, and Satrajit Ghosh and Sanu Abraham at MIT.

    </div>

@endsection
