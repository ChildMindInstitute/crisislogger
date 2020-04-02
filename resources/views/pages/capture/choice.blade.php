@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.app')
@section('title', 'Choose Voice')
@section('capture-active', 'kt-menu__item--active')
@section('content')

    <div class="container">

        @component('components.portlet')
            <h1 class="display-4">Please tell us with which voice you would like to express yourself:</h1>
            <div class="text-center row">

                @component('components.voice', ['voice' => 'Parent'])
                    <p>Parents are facing unique challenges of working from home, establishing new routines for school at home, and sometimes finding themselves suddenly unemployed. At the same time, their children are trapped indoors, cut off from their friends and the routine and structure of a school day have been entirely disrupted. Their lives are lacking in the structure and familiarity of an established routine, impacting parents’ and children’s emotional wellbeing. From all of this, there are increased feelings of vulnerability, lack of control, and a need for support.</p>
                @endcomponent

                    @component('components.voice', ['voice' => 'Teacher'])
                        <p>Parents are facing unique challenges of working from home, establishing new routines for school at home, and sometimes finding themselves suddenly unemployed. At the same time, their children are trapped indoors, cut off from their friends and the routine and structure of a school day have been entirely disrupted. Their lives are lacking in the structure and familiarity of an established routine, impacting parents’ and children’s emotional wellbeing. From all of this, there are increased feelings of vulnerability, lack of control, and a need for support.</p>
                    @endcomponent

                    @component('components.voice', ['voice' => 'Healthcare worker'])
                        <p>Parents are facing unique challenges of working from home, establishing new routines for school at home, and sometimes finding themselves suddenly unemployed. At the same time, their children are trapped indoors, cut off from their friends and the routine and structure of a school day have been entirely disrupted. Their lives are lacking in the structure and familiarity of an established routine, impacting parents’ and children’s emotional wellbeing. From all of this, there are increased feelings of vulnerability, lack of control, and a need for support.</p>
                    @endcomponent

                    @component('components.voice', ['voice' => 'Patient'])
                        <p>Parents are facing unique challenges of working from home, establishing new routines for school at home, and sometimes finding themselves suddenly unemployed. At the same time, their children are trapped indoors, cut off from their friends and the routine and structure of a school day have been entirely disrupted. Their lives are lacking in the structure and familiarity of an established routine, impacting parents’ and children’s emotional wellbeing. From all of this, there are increased feelings of vulnerability, lack of control, and a need for support.</p>
                    @endcomponent

            </div>
        @endcomponent

    </div>

@endsection
