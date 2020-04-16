@extends('layout.app')
@section('title', 'Home')
@section('description', '')
@section('content')

    <div class="container content pt-0">

        <img src="{{ asset('media/photos/parentlogger.png') }}" alt="">

        <div class="text-center">
            <h1 class="display-4">We want to hear your thoughts and feelings during the Covid-19 crisis</h1>
        </div>

	<br>
        <p>This is an unprecedented time,
	and our lives have been disrupted by the COVID-19 pandemic
	in so many ways.
        We are all concerned about the health of our family and friends,
        and facing new challenges we could never have imagined.
	At the same time as we're distancing ourselves from each other,
        the stress, uncertainty, and fear gives us an even greater
        need for support.</p>

        <p>The Child Mind Institute and Parents Magazine and collaborators*
        want to help and are here to listen.
        Please share your fears, 
        frustrations, and hopes as an audio or video recording or text
	by clicking the link below.
	After you record your thoughts and feelings,
	we will ask some questions to learn more about your situation.</p>
        
        <div class="text-center">
            <a href="{{ route('capture-choice') }}" class="btn-primary btn btn-wide btn-lg">Share Your Thoughts</a>
        </div>

	<br>
        <p>For those who choose to contribute their recordings to scientific
        research, we will analyze them to create recommendations for
	how clinicians and researchers can best support
	families as we move ahead.</p>

        <p>We know how precious your time is, and greatly appreciate
	your participation in this project.</p>

        <p>*Our collaborators include
        the National Institute of Mental Health, OpenHumans.org, the CRI in Paris,
        and Satrajit Ghosh and Sanu Abraham at MIT.</p>

    </div>

@endsection
