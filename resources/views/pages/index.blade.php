@extends('layout.app')
@section('title', 'Home')
@section('description', '')
@section('content')

    <div class="container content pt-0">

        <img src="{{ asset('media/photos/covid.jpg') }}" alt="">

        <div class="text-center">
            <h1 class="display-4">Call to Action During the Covid-19 Crisis</h1>
        </div>

	<br>
        <p>This is an unprecedented time,
	and our lives have been disrupted by the COVID-19 pandemic
	in so many ways.
        We are all concerned about the health of our family and friends,
        and facing new challenges we could never have imagined.
	At the same time as we're distancing ourselves from each other,
        the stress, uncertaint, and fear gives us an even greater
        need for support.</p>

        <p>The Child Mind Institute, the Child Mind Medical Practice, and its partners*
        are deeply committed to mental health, and we are here to listen.
        We are launching an important research project,
        and hope you will share your fears,
        frustrations, and hopes with us in an audio or video clip
        by clicking the link below.</p>
	<br>
        <div class="text-center">
            <a class="btn-primary btn btn-wide btn-lg" href="{{route('capture', ['voice'=> 'parent'])}}">Share Your Thoughts</a>
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
        the National Institute of Mental Health,
	    <a href="https://openhumans.org">Open Humans</a>,
        the <a href="https://cri-paris.org">CRI</a> in Paris, Parents Magazine, and
        <a href="https://mcgovern.mit.edu/profile/satrajit-ghosh/">Satrajit Ghosh</a>
        and Sanu Abraham at MIT.

    </div>

@endsection
