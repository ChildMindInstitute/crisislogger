@component('components.portlet-sticky', ['title' => 'Life Changes in the past 2 Weeks', 'z_index' => 3])
    <h3>Please answer the following questions about any changes in your life in the last 2 weeks due to Coronavirus/COVID-19:</h3>

    @component('components.form-group')
        <p>During the past 2 weeks, if you attend school, has your school building been closed down?</p>
        @include('components.radio-group', ['name' => 'school_closed'])
    @endcomponent

    @component('components.form-group')
        <p>If yes,</p>
        @include('components.radio-group', ['name' => 'classes_resumed_online', 'value' => 'Have classes resumed online?'])
        @include('components.radio-group', ['name' => 'easy_access_to_computer', 'value' => 'Do you have easy access to the internet and a computer?'])
        @include('components.radio-group', ['name' => 'assignments_to_complete', 'value' => 'Are there assignments to complete?'])
        @include('components.radio-group', ['name' => 'meals_from_the_school', 'value' => 'Are you able to receive meals from the school?'])
    @endcomponent

    @component('components.form-group')
        <p>If no,</p>
        @include('components.radio-group', ['name' => 'classes_in_session', 'value' => 'Are classes in session?'])
        @include('components.radio-group', ['name' => 'classes_in_person', 'value' => 'Are you attending classes in person?'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, if you are working, has your workspace been closed?</p>
        @include('components.radio-group', ['name' => 'workspace_closed'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, have you been able to telework?</p>
        @include('components.radio-group', ['name' => 'telework'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how many people outside your household have you had an in-person conversation with?</p>
        @include('components.input', ['name' => 'number_in_person_conversation'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how much time have you spent going outside of the house?</p>
        @include('components.radio', ['name' => 'time_outside_house', 'value' => 'No time'])
        @include('components.radio', ['name' => 'time_outside_house', 'value' => 'Rarely'])
        @include('components.radio', ['name' => 'time_outside_house', 'value' => 'Occasionally'])
        @include('components.radio', ['name' => 'time_outside_house', 'value' => 'Often'])
        @include('components.radio', ['name' => 'time_outside_house', 'value' => 'A lot of the time'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how stressful have the restrictions on leaving home been for you?</p>
        @include('components.radio', ['name' => 'stressful_restrictions', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'stressful_restrictions', 'value' => 'Slightly'])
        @include('components.radio', ['name' => 'stressful_restrictions', 'value' => 'Moderately'])
        @include('components.radio', ['name' => 'stressful_restrictions', 'value' => 'Very'])
        @include('components.radio', ['name' => 'stressful_restrictions', 'value' => 'Extremely'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, have your contacts with people outside of your home changed relative to <em>before</em> the Coronavirus/COVID-19 crisis in your area?</p>
        @include('components.radio', ['name' => 'contacts_relative', 'value' => 'A lot less'])
        @include('components.radio', ['name' => 'contacts_relative', 'value' => 'A little less'])
        @include('components.radio', ['name' => 'contacts_relative', 'value' => 'About the same'])
        @include('components.radio', ['name' => 'contacts_relative', 'value' => 'A little more'])
        @include('components.radio', ['name' => 'contacts_relative', 'value' => 'A lot more'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how much difficulty have you had following the recommendations for keeping away from close contact with people?</p>
        @include('components.radio', ['name' => 'difficulty_keeping_away', 'value' => 'None'])
        @include('components.radio', ['name' => 'difficulty_keeping_away', 'value' => 'A little'])
        @include('components.radio', ['name' => 'difficulty_keeping_away', 'value' => 'Moderate'])
        @include('components.radio', ['name' => 'difficulty_keeping_away', 'value' => 'A lot'])
        @include('components.radio', ['name' => 'difficulty_keeping_away', 'value' => 'A great amount'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, has the quality of the relationships between you and members of your family changed?</p>
        @include('components.radio', ['name' => 'relationship_family', 'value' => 'A lot worse'])
        @include('components.radio', ['name' => 'relationship_family', 'value' => 'A little worse'])
        @include('components.radio', ['name' => 'relationship_family', 'value' => 'About the same'])
        @include('components.radio', ['name' => 'relationship_family', 'value' => 'A little better'])
        @include('components.radio', ['name' => 'relationship_family', 'value' => 'A lot better'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how stressful have these changes in family contacts been for you?</p>
        @include('components.radio', ['name' => 'stressful_family', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'stressful_family', 'value' => 'Slightly'])
        @include('components.radio', ['name' => 'stressful_family', 'value' => 'Moderately'])
        @include('components.radio', ['name' => 'stressful_family', 'value' => 'Very'])
        @include('components.radio', ['name' => 'stressful_family', 'value' => 'Extremely'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, has the quality of your relationships with your friends changed?</p>
        @include('components.radio', ['name' => 'relationship_friends_quality', 'value' => 'A lot worse'])
        @include('components.radio', ['name' => 'relationship_friends_quality', 'value' => 'A little worse'])
        @include('components.radio', ['name' => 'relationship_friends_quality', 'value' => 'About the same'])
        @include('components.radio', ['name' => 'relationship_friends_quality', 'value' => 'A little better'])
        @include('components.radio', ['name' => 'relationship_friends_quality', 'value' => 'A lot better'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how stressful have these changes in social contacts been for you?</p>
        @include('components.radio', ['name' => 'stressful_social', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'stressful_social', 'value' => 'Slightly'])
        @include('components.radio', ['name' => 'stressful_social', 'value' => 'Moderately'])
        @include('components.radio', ['name' => 'stressful_social', 'value' => 'Very'])
        @include('components.radio', ['name' => 'stressful_social', 'value' => 'Extremely'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how much has cancellation of important events (such as graduation, prom, vacation, etc.) in your life been difficult for you?</p>
        @include('components.radio', ['name' => 'cancellation_events_impact', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'cancellation_events_impact', 'value' => 'Slightly'])
        @include('components.radio', ['name' => 'cancellation_events_impact', 'value' => 'Moderately'])
        @include('components.radio', ['name' => 'cancellation_events_impact', 'value' => 'Very'])
        @include('components.radio', ['name' => 'cancellation_events_impact', 'value' => 'Extremely'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, to what degree have changes related to the Coronavirus/COVID-19 crisis in your area created financial problems for you or your family?</p>
        @include('components.radio', ['name' => 'financial_problems_degree', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'financial_problems_degree', 'value' => 'Slightly'])
        @include('components.radio', ['name' => 'financial_problems_degree', 'value' => 'Moderately'])
        @include('components.radio', ['name' => 'financial_problems_degree', 'value' => 'Very'])
        @include('components.radio', ['name' => 'financial_problems_degree', 'value' => 'Extremely'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, to what degree are you concerned about the stability of your living situation?</p>
        @include('components.radio', ['name' => 'stability_living_situation', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'stability_living_situation', 'value' => 'Slightly'])
        @include('components.radio', ['name' => 'stability_living_situation', 'value' => 'Moderately'])
        @include('components.radio', ['name' => 'stability_living_situation', 'value' => 'Very'])
        @include('components.radio', ['name' => 'stability_living_situation', 'value' => 'Extremely'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, did you worry whether your food would run out because of a lack of money?</p>
        @include('components.radio-group', ['name' => 'food_run_out'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how hopeful are you that the Coronavirus/COVID-19 crisis in your area will end soon?</p>
        @include('components.radio', ['name' => 'crisis_will_end_hopeful', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'crisis_will_end_hopeful', 'value' => 'Slightly'])
        @include('components.radio', ['name' => 'crisis_will_end_hopeful', 'value' => 'Moderately'])
        @include('components.radio', ['name' => 'crisis_will_end_hopeful', 'value' => 'Very'])
        @include('components.radio', ['name' => 'crisis_will_end_hopeful', 'value' => 'Extremely'])
    @endcomponent

@endcomponent
