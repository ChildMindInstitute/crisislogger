@extends('layout.app')
@section('title', 'Home')
@section('description', '')
@section('content')

    <div class="container content pt-0">

        <div class="text-center">
            <h1 class="display-4">A Call to Action for Parents During the Covid-19 Crisis</h1>
        </div>

        <p>As parents, this is an unprecedented time. Not only are parents worried about the health of loved ones, they are also worried about themselves and how they will manage through the crisis. Parents are  facing  unique challenges of working from home, establishing new routines for school at home, and sometimes finding themselves suddenly unemployed. At the same time, their children are trapped indoors, cut off from their friends and the routine and structure of a school day have been entirely disrupted. Their lives are lacking in the structure and familiarity of an established routine impacting parents' and children’s emotional wellbeing. From all of this, there are increased feelings of vulnerability, lack of control, and a need for support.</p>
        <p>Here is our call to action: we need for you to share with us your fears, frustrations, and hopes in the form of an audio clip or video that you can easily generate by clicking the link below. You can share this publicly in their original form or as a transcript, or you can choose to make them private, even creating a journal for yourself. After you record your thoughts and feelings, we will ask a few questions to learn more about your situation. The Child Mind Institute will then collect this information and analyze it to generate recommendations and action plans to guide clinicians and researchers, so they can better identify resources to support you and others. We will add new features in the future to visualize your contribution in the context of everyone else’s, and to create a collection of publicly shared recordings or transcripts.</p>

        <div class="text-center">
            <a href="{{ route('capture') }}" class="btn-primary btn btn-wide btn-lg">Share Your Thoughts</a>
        </div>

    </div>

@endsection
