<h3>LIFE CHANGES DUE TO CORONAVIRUS/COVID-19 CRISIS IN THE LAST TWO WEEKS</h3>
<h3>During the PAST TWO WEEKS...</h3>

@component('components.form-group')
    <p>If you attend school, has your school building been closed?</p>
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
    <p>If you had a job prior to the Coronavirus/COVID-19, are you still working?</p>
    @include('components.radio-group', ['name' => 'still_working'])
@endcomponent

@component('components.form-group')
    <p>If yes, are you still going to your workplace?</p>
    @include('components.radio-group', ['name' => 'still_going'])
@endcomponent

@component('components.form-group')
    <p>If yes, are you teleworking or working from home?</p>
    @include('components.radio-group', ['name' => 'telework'])
@endcomponent

@component('components.form-group')
    <p>If no, were you laid off from your job?</p>
    @include('components.radio-group', ['name' => 'laidoff'])
@endcomponent

@component('components.form-group')
    <p>If no, did you lose your job?</p>
    @include('components.radio-group', ['name' => 'losejob'])
@endcomponent

@component('components.form-group')
    <p>During the past 2 weeks, how many people outside your household have you had an in-person conversation with?</p>
    @include('components.input', ['name' => 'number_in_person_conversation'])
@endcomponent

@component('components.form-group')
    <p>During the past 2 weeks, how much time have you spent going outside of the home (e.g., going to stores, parks, etc.)?</p>
    @include('components.radio', ['name' => 'time_outside_house', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'time_outside_house', 'value' => '1-2 days per week'])
    @include('components.radio', ['name' => 'time_outside_house', 'value' => 'A few days per week'])
    @include('components.radio', ['name' => 'time_outside_house', 'value' => 'Several days per week'])
    @include('components.radio', ['name' => 'time_outside_house', 'value' => 'Every day'])
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
    <p>How hopeful are you that the Coronavirus/COVID-19 crisis in your area will end soon?</p>
    @include('components.radio', ['name' => 'crisis_will_end_hopeful', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'crisis_will_end_hopeful', 'value' => 'Slightly'])
    @include('components.radio', ['name' => 'crisis_will_end_hopeful', 'value' => 'Moderately'])
    @include('components.radio', ['name' => 'crisis_will_end_hopeful', 'value' => 'Very'])
    @include('components.radio', ['name' => 'crisis_will_end_hopeful', 'value' => 'Extremely'])
@endcomponent

<h3>DAILY BEHAVIORS (THREE MONTHS PRIOR TO CRISIS)</h3>
<h3>During the THREE MONTHS PRIOR to the onset of the Coronavirus/COVID-19 crisis in
your area...</h3>

@component('components.form-group')
    <p>...on average, what time did you go to bed on WEEKDAYS?</p>
    @include('components.radio', ['name' => 'bedtime_weekdays', 'value' => 'Before 9 pm'])
    @include('components.radio', ['name' => 'bedtime_weekdays', 'value' => '9 pm-11 pm'])
    @include('components.radio', ['name' => 'bedtime_weekdays', 'value' => '11 pm-1 am'])
    @include('components.radio', ['name' => 'bedtime_weekdays', 'value' => 'After 1 am'])
@endcomponent

@component('components.form-group')
    <p>...on average, what time did you go to bed on WEEKENDS?</p>
    @include('components.radio', ['name' => 'bedtime_weekends', 'value' => 'Before 9 pm'])
    @include('components.radio', ['name' => 'bedtime_weekends', 'value' => '9 pm-11 pm'])
    @include('components.radio', ['name' => 'bedtime_weekends', 'value' => '11 pm-1 am'])
    @include('components.radio', ['name' => 'bedtime_weekends', 'value' => 'After 1 am'])
@endcomponent

@component('components.form-group')
    <p>...on average, how many hours per night did you sleep on WEEKDAYS?</p>
    @include('components.radio', ['name' => 'hours_slept_weekdays', 'value' => '< 6 hours'])
    @include('components.radio', ['name' => 'hours_slept_weekdays', 'value' => '6-8 hours'])
    @include('components.radio', ['name' => 'hours_slept_weekdays', 'value' => '8-10 hours'])
    @include('components.radio', ['name' => 'hours_slept_weekdays', 'value' => '> 10 hours'])
@endcomponent

@component('components.form-group')
    <p>...on average, how many hours per night did you sleep on WEEKENDS?</p>
    @include('components.radio', ['name' => 'hours_slept_weekends', 'value' => '< 6 hours'])
    @include('components.radio', ['name' => 'hours_slept_weekends', 'value' => '6-8 hours'])
    @include('components.radio', ['name' => 'hours_slept_weekends', 'value' => '8-10 hours'])
    @include('components.radio', ['name' => 'hours_slept_weekends', 'value' => '> 10 hours'])
@endcomponent

@component('components.form-group')
    <p>...how many days per week did you exercise (e.g., increased heart rate, breathing) for at least 30 minutes?</p>
    @include('components.radio', ['name' => 'days_excercised', 'value' => 'None'])
    @include('components.radio', ['name' => 'days_excercised', 'value' => '1-2 days'])
    @include('components.radio', ['name' => 'days_excercised', 'value' => '3-4 days'])
    @include('components.radio', ['name' => 'days_excercised', 'value' => '5-6 days'])
    @include('components.radio', ['name' => 'days_excercised', 'value' => 'Daily'])
@endcomponent

@component('components.form-group')
    <p>...how many days per week did you spend time outdoors?</p>
    @include('components.radio', ['name' => 'days_outdoors', 'value' => 'None'])
    @include('components.radio', ['name' => 'days_outdoors', 'value' => '1-2 days'])
    @include('components.radio', ['name' => 'days_outdoors', 'value' => '3-4 days'])
    @include('components.radio', ['name' => 'days_outdoors', 'value' => '5-6 days'])
    @include('components.radio', ['name' => 'days_outdoors', 'value' => 'Daily'])
@endcomponent

<h3>EMOTIONS/WORRIES (THREE MONTHS PRIOR TO CRISIS)</h3>
<h3>During the THREE MONTHS PRIOR to the onset of the Coronavirus/COVID-19 crisis in
your area...</h3>

@component('components.form-group')
    <p>...how worried were you generally?</p>
    @include('components.radio', ['name' => 'worried', 'value' => 'Not worried at all'])
    @include('components.radio', ['name' => 'worried', 'value' => 'Slightly worried'])
    @include('components.radio', ['name' => 'worried', 'value' => 'Moderately worried'])
    @include('components.radio', ['name' => 'worried', 'value' => 'Very worried'])
    @include('components.radio', ['name' => 'worried', 'value' => 'Extremely worried'])
@endcomponent

@component('components.form-group')
    <p>...how happy versus sad were you?</p>
    @include('components.radio', ['name' => 'happy_sad', 'value' => 'Very sad/depressed/unhappy'])
    @include('components.radio', ['name' => 'happy_sad', 'value' => 'Moderately sad/depressed/unhappy'])
    @include('components.radio', ['name' => 'happy_sad', 'value' => 'Neutral'])
    @include('components.radio', ['name' => 'happy_sad', 'value' => 'Moderately happy/cheerful'])
    @include('components.radio', ['name' => 'happy_sad', 'value' => 'Very happy/cheerful'])
@endcomponent

@component('components.form-group')
    <p>… how much were you able to enjoy your usual activities?</p>
    @include('components.radio', ['name' => 'enjoy_life', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'enjoy_life', 'value' => 'Slightly'])
    @include('components.radio', ['name' => 'enjoy_life', 'value' => 'Moderately'])
    @include('components.radio', ['name' => 'enjoy_life', 'value' => 'Very much'])
    @include('components.radio', ['name' => 'enjoy_life', 'value' => 'A lot'])
@endcomponent

@component('components.form-group')
    <p>...how relaxed versus anxious were you?</p>
    @include('components.radio', ['name' => 'anxious_calm', 'value' => 'Very relaxed/calm'])
    @include('components.radio', ['name' => 'anxious_calm', 'value' => 'Moderately relaxed/calm'])
    @include('components.radio', ['name' => 'anxious_calm', 'value' => 'Neutral'])
    @include('components.radio', ['name' => 'anxious_calm', 'value' => 'Moderately nervous/anxious'])
    @include('components.radio', ['name' => 'anxious_calm', 'value' => 'Very nervous/anxious'])
@endcomponent

@component('components.form-group')
    <p>...how fidgety or restless were you?</p>
    @include('components.radio', ['name' => 'restless', 'value' => 'Not fidgety/restless at all'])
    @include('components.radio', ['name' => 'restless', 'value' => 'Slightly fidgety/restless'])
    @include('components.radio', ['name' => 'restless', 'value' => 'Moderately fidgety/restless'])
    @include('components.radio', ['name' => 'restless', 'value' => 'Very fidgety/restless'])
    @include('components.radio', ['name' => 'restless', 'value' => 'Extremely fidgety/restless'])
@endcomponent

@component('components.form-group')
    <p>...how fatigued or tired were you?</p>
    @include('components.radio', ['name' => 'fatigue', 'value' => 'Not fatigued or tired at all'])
    @include('components.radio', ['name' => 'fatigue', 'value' => 'Slightly fatigued or tired'])
    @include('components.radio', ['name' => 'fatigue', 'value' => 'Moderately fatigued or tired'])
    @include('components.radio', ['name' => 'fatigue', 'value' => 'Very fatigued or tired'])
    @include('components.radio', ['name' => 'fatigue', 'value' => 'Extremely fatigued or tired'])
@endcomponent

@component('components.form-group')
    <p>...how well were you able to concentrate or focus?</p>
    @include('components.radio', ['name' => 'focused_distracted', 'value' => 'Very focused/attentive'])
    @include('components.radio', ['name' => 'focused_distracted', 'value' => 'Moderately focused/attentive'])
    @include('components.radio', ['name' => 'focused_distracted', 'value' => 'Neutral'])
    @include('components.radio', ['name' => 'focused_distracted', 'value' => 'Moderately unfocused/distracted'])
    @include('components.radio', ['name' => 'focused_distracted', 'value' => 'Very unfocused/distracted'])
@endcomponent

@component('components.form-group')
    <p>...how irritable or easily angered have you been?</p>
    @include('components.radio', ['name' => 'irritable', 'value' => 'Not irritable or easily angered at all'])
    @include('components.radio', ['name' => 'irritable', 'value' => 'Slightly irritable or easily angered'])
    @include('components.radio', ['name' => 'irritable', 'value' => 'Moderately irritable or easily angered'])
    @include('components.radio', ['name' => 'irritable', 'value' => 'Very irritable or easily angered'])
    @include('components.radio', ['name' => 'irritable', 'value' => 'Extremely irritable or easily angered'])
@endcomponent

@component('components.form-group')
    <p>...how lonely were you?</p>
    @include('components.radio', ['name' => 'lonely', 'value' => 'Not lonely at all'])
    @include('components.radio', ['name' => 'lonely', 'value' => 'Slightly lonely'])
    @include('components.radio', ['name' => 'lonely', 'value' => 'Moderately lonely'])
    @include('components.radio', ['name' => 'lonely', 'value' => 'Very lonely'])
    @include('components.radio', ['name' => 'lonely', 'value' => 'Extremely lonely'])
@endcomponent

@component('components.form-group')
    <p>… to what extent did you have negative thoughts, thoughts about unpleasant
    experiences or things that made you feel bad?</p>
    @include('components.radio', ['name' => 'negative_thoughts', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'negative_thoughts', 'value' => 'Rarely'])
    @include('components.radio', ['name' => 'negative_thoughts', 'value' => 'Occasionally'])
    @include('components.radio', ['name' => 'negative_thoughts', 'value' => 'Often'])
    @include('components.radio', ['name' => 'negative_thoughts', 'value' => 'A lot of the time'])
@endcomponent

<h3>MEDIA USE (THREE MONTHS PRIOR TO CRISIS)</h3>
<h3>During the THREE MONTHS PRIOR to the onset of the Coronavirus/COVID-19 crisis in
your area, how much time per day did you spend...</h3>

@component('components.form-group')
    <p>...watching TV or digital media (e.g., Netflix, YouTube, web surfing)? </p>
    @include('components.radio', ['name' => 'tv_digital_media', 'value' => 'No TV or digital media'])
    @include('components.radio', ['name' => 'tv_digital_media', 'value' => 'Under 1 hour'])
    @include('components.radio', ['name' => 'tv_digital_media', 'value' => '1-3 hours'])
    @include('components.radio', ['name' => 'tv_digital_media', 'value' => '4-6 hours'])
    @include('components.radio', ['name' => 'tv_digital_media', 'value' => 'More than 6 hours'])
@endcomponent

@component('components.form-group')
    <p>...using social media (e.g., Facetime, Facebook, Instagram, Snapchat, Twitter, TikTok)? </p>
    @include('components.radio', ['name' => 'social_media', 'value' => 'No social media'])
    @include('components.radio', ['name' => 'social_media', 'value' => 'Under 1 hour'])
    @include('components.radio', ['name' => 'social_media', 'value' => '1-3 hours'])
    @include('components.radio', ['name' => 'social_media', 'value' => '4-6 hours'])
    @include('components.radio', ['name' => 'social_media', 'value' => 'More than 6 hours'])
@endcomponent

@component('components.form-group')
    <p>...playing video games? </p>
    @include('components.radio', ['name' => 'video_games', 'value' => 'No video games'])
    @include('components.radio', ['name' => 'video_games', 'value' => 'Under 1 hour'])
    @include('components.radio', ['name' => 'video_games', 'value' => '1-3 hours'])
    @include('components.radio', ['name' => 'video_games', 'value' => '4-6 hours'])
    @include('components.radio', ['name' => 'video_games', 'value' => 'More than 6 hours'])
@endcomponent

<h3>SUBSTANCE USE (THREE MONTHS PRIOR TO CRISIS)</h3>
<h3>During the THREE MONTHS PRIOR to the onset of the Coronavirus/COVID-19 crisis in
your area, how frequently did you use...</h3>

@component('components.form-group')
    <p>...alcohol? </p>
    @include('components.radio', ['name' => 'alcohol', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'alcohol', 'value' => 'Rarely'])
    @include('components.radio', ['name' => 'alcohol', 'value' => 'Once a month'])
    @include('components.radio', ['name' => 'alcohol', 'value' => 'Once a week'])
    @include('components.radio', ['name' => 'alcohol', 'value' => 'Several times a week'])
    @include('components.radio', ['name' => 'alcohol', 'value' => 'Once a day'])
    @include('components.radio', ['name' => 'alcohol', 'value' => 'More than once a day'])
@endcomponent

@component('components.form-group')
    <p>...vaping products? </p>
    @include('components.radio', ['name' => 'vape', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'vape', 'value' => 'Rarely'])
    @include('components.radio', ['name' => 'vape', 'value' => 'Once a month'])
    @include('components.radio', ['name' => 'vape', 'value' => 'Once a week'])
    @include('components.radio', ['name' => 'vape', 'value' => 'Several times a week'])
    @include('components.radio', ['name' => 'vape', 'value' => 'Once a day'])
    @include('components.radio', ['name' => 'vape', 'value' => 'More than once a day'])
@endcomponent

@component('components.form-group')
    <p>...cigarettes or other tobacco? </p>
    @include('components.radio', ['name' => 'tobacco', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'tobacco', 'value' => 'Rarely'])
    @include('components.radio', ['name' => 'tobacco', 'value' => 'Once a month'])
    @include('components.radio', ['name' => 'tobacco', 'value' => 'Once a week'])
    @include('components.radio', ['name' => 'tobacco', 'value' => 'Several times a week'])
    @include('components.radio', ['name' => 'tobacco', 'value' => 'Once a day'])
    @include('components.radio', ['name' => 'tobacco', 'value' => 'More than once a day'])
@endcomponent

@component('components.form-group')
    <p>...marijuana/cannabis (e.g., joint, blunt, pipe, bong)? </p>
    @include('components.radio', ['name' => 'cannabis', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'cannabis', 'value' => 'Rarely'])
    @include('components.radio', ['name' => 'cannabis', 'value' => 'Once a month'])
    @include('components.radio', ['name' => 'cannabis', 'value' => 'Once a week'])
    @include('components.radio', ['name' => 'cannabis', 'value' => 'Several times a week'])
    @include('components.radio', ['name' => 'cannabis', 'value' => 'Once a day'])
    @include('components.radio', ['name' => 'cannabis', 'value' => 'More than once a day'])
@endcomponent

@component('components.form-group')
    <p>...opiates, heroin, cocaine, or narcotics? </p>
    @include('components.radio', ['name' => 'opiates', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'opiates', 'value' => 'Rarely'])
    @include('components.radio', ['name' => 'opiates', 'value' => 'Once a month'])
    @include('components.radio', ['name' => 'opiates', 'value' => 'Once a week'])
    @include('components.radio', ['name' => 'opiates', 'value' => 'Several times a week'])
    @include('components.radio', ['name' => 'opiates', 'value' => 'Once a day'])
    @include('components.radio', ['name' => 'opiates', 'value' => 'More than once a day'])
@endcomponent

@component('components.form-group')
    <p>...other drugs including cocaine, crack, amphetamine, methamphetamine,
    hallucinogens, or ecstasy? </p>
    @include('components.radio', ['name' => 'other_drugs', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'other_drugs', 'value' => 'Rarely'])
    @include('components.radio', ['name' => 'other_drugs', 'value' => 'Once a month'])
    @include('components.radio', ['name' => 'other_drugs', 'value' => 'Once a week'])
    @include('components.radio', ['name' => 'other_drugs', 'value' => 'Several times a week'])
    @include('components.radio', ['name' => 'other_drugs', 'value' => 'Once a day'])
    @include('components.radio', ['name' => 'other_drugs', 'value' => 'More than once a day'])
@endcomponent

@component('components.form-group')
    <p>...sleeping medications or sedatives/hypnotics?</p>
    @include('components.radio', ['name' => 'sedatives', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'sedatives', 'value' => 'Rarely'])
    @include('components.radio', ['name' => 'sedatives', 'value' => 'Once a month'])
    @include('components.radio', ['name' => 'sedatives', 'value' => 'Once a week'])
    @include('components.radio', ['name' => 'sedatives', 'value' => 'Several times a week'])
    @include('components.radio', ['name' => 'sedatives', 'value' => 'Once a day'])
    @include('components.radio', ['name' => 'sedatives', 'value' => 'More than once a day'])
@endcomponent

<h3>DAILY BEHAVIORS (PAST TWO WEEKS)</h3>
<h3>During the PAST TWO WEEKS...<h3>

@component('components.form-group')
    <p>...on average, what time did you go to bed on WEEKDAYS?</p>
    @include('components.radio', ['name' => 'bedtime_weekdays', 'value' => 'Before 9 pm'])
    @include('components.radio', ['name' => 'bedtime_weekdays', 'value' => '9 pm-11 pm'])
    @include('components.radio', ['name' => 'bedtime_weekdays', 'value' => '11 pm-1 am'])
    @include('components.radio', ['name' => 'bedtime_weekdays', 'value' => 'After 1 am'])
@endcomponent

@component('components.form-group')
    <p>...on average, what time did you go to bed on WEEKENDS?</p>
    @include('components.radio', ['name' => 'bedtime_weekends', 'value' => 'Before 9 pm'])
    @include('components.radio', ['name' => 'bedtime_weekends', 'value' => '9 pm-11 pm'])
    @include('components.radio', ['name' => 'bedtime_weekends', 'value' => '11 pm-1 am'])
    @include('components.radio', ['name' => 'bedtime_weekends', 'value' => 'After 1 am'])
@endcomponent

@component('components.form-group')
    <p>...on average, how many hours per night did you sleep on WEEKDAYS?</p>
    @include('components.radio', ['name' => 'hours_slept_weekdays', 'value' => '< 6 hours'])
    @include('components.radio', ['name' => 'hours_slept_weekdays', 'value' => '6-8 hours'])
    @include('components.radio', ['name' => 'hours_slept_weekdays', 'value' => '8-10 hours'])
    @include('components.radio', ['name' => 'hours_slept_weekdays', 'value' => '> 10 hours'])
@endcomponent

@component('components.form-group')
    <p>...on average, how many hours per night did you sleep on WEEKENDS?</p>
    @include('components.radio', ['name' => 'hours_slept_weekends', 'value' => '< 6 hours'])
    @include('components.radio', ['name' => 'hours_slept_weekends', 'value' => '6-8 hours'])
    @include('components.radio', ['name' => 'hours_slept_weekends', 'value' => '8-10 hours'])
    @include('components.radio', ['name' => 'hours_slept_weekends', 'value' => '> 10 hours'])
@endcomponent

@component('components.form-group')
    <p>...how many days per week did you exercise (e.g., increased heart rate, breathing) for at least 30 minutes?</p>
    @include('components.radio', ['name' => 'days_excercised', 'value' => 'None'])
    @include('components.radio', ['name' => 'days_excercised', 'value' => '1-2 days'])
    @include('components.radio', ['name' => 'days_excercised', 'value' => '3-4 days'])
    @include('components.radio', ['name' => 'days_excercised', 'value' => '5-6 days'])
    @include('components.radio', ['name' => 'days_excercised', 'value' => 'Daily'])
@endcomponent

@component('components.form-group')
    <p>...how many days per week did you spend time outdoors?</p>
    @include('components.radio', ['name' => 'days_outdoors', 'value' => 'None'])
    @include('components.radio', ['name' => 'days_outdoors', 'value' => '1-2 days'])
    @include('components.radio', ['name' => 'days_outdoors', 'value' => '3-4 days'])
    @include('components.radio', ['name' => 'days_outdoors', 'value' => '5-6 days'])
    @include('components.radio', ['name' => 'days_outdoors', 'value' => 'Daily'])
@endcomponent

<h3>EMOTIONS/WORRIES (PAST TWO WEEKS)</h3>
<h3>During the PAST TWO WEEKS...</h3>

@component('components.form-group')
    <p>...how worried were you generally?</p>
    @include('components.radio', ['name' => 'worried', 'value' => 'Not worried at all'])
    @include('components.radio', ['name' => 'worried', 'value' => 'Slightly worried'])
    @include('components.radio', ['name' => 'worried', 'value' => 'Moderately worried'])
    @include('components.radio', ['name' => 'worried', 'value' => 'Very worried'])
    @include('components.radio', ['name' => 'worried', 'value' => 'Extremely worried'])
@endcomponent

@component('components.form-group')
    <p>...how happy versus sad were you?</p>
    @include('components.radio', ['name' => 'happy_sad', 'value' => 'Very sad/depressed/unhappy'])
    @include('components.radio', ['name' => 'happy_sad', 'value' => 'Moderately sad/depressed/unhappy'])
    @include('components.radio', ['name' => 'happy_sad', 'value' => 'Neutral'])
    @include('components.radio', ['name' => 'happy_sad', 'value' => 'Moderately happy/cheerful'])
    @include('components.radio', ['name' => 'happy_sad', 'value' => 'Very happy/cheerful'])
@endcomponent

@component('components.form-group')
    <p>… how much were you able to enjoy your usual activities?</p>
    @include('components.radio', ['name' => 'enjoy_life', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'enjoy_life', 'value' => 'Slightly'])
    @include('components.radio', ['name' => 'enjoy_life', 'value' => 'Moderately'])
    @include('components.radio', ['name' => 'enjoy_life', 'value' => 'Very much'])
    @include('components.radio', ['name' => 'enjoy_life', 'value' => 'A lot'])
@endcomponent

@component('components.form-group')
    <p>...how relaxed versus anxious were you?</p>
    @include('components.radio', ['name' => 'anxious_calm', 'value' => 'Very relaxed/calm'])
    @include('components.radio', ['name' => 'anxious_calm', 'value' => 'Moderately relaxed/calm'])
    @include('components.radio', ['name' => 'anxious_calm', 'value' => 'Neutral'])
    @include('components.radio', ['name' => 'anxious_calm', 'value' => 'Moderately nervous/anxious'])
    @include('components.radio', ['name' => 'anxious_calm', 'value' => 'Very nervous/anxious'])
@endcomponent

@component('components.form-group')
    <p>...how fidgety or restless were you?</p>
    @include('components.radio', ['name' => 'restless', 'value' => 'Not fidgety/restless at all'])
    @include('components.radio', ['name' => 'restless', 'value' => 'Slightly fidgety/restless'])
    @include('components.radio', ['name' => 'restless', 'value' => 'Moderately fidgety/restless'])
    @include('components.radio', ['name' => 'restless', 'value' => 'Very fidgety/restless'])
    @include('components.radio', ['name' => 'restless', 'value' => 'Extremely fidgety/restless'])
@endcomponent

@component('components.form-group')
    <p>...how fatigued or tired were you?</p>
    @include('components.radio', ['name' => 'fatigue', 'value' => 'Not fatigued or tired at all'])
    @include('components.radio', ['name' => 'fatigue', 'value' => 'Slightly fatigued or tired'])
    @include('components.radio', ['name' => 'fatigue', 'value' => 'Moderately fatigued or tired'])
    @include('components.radio', ['name' => 'fatigue', 'value' => 'Very fatigued or tired'])
    @include('components.radio', ['name' => 'fatigue', 'value' => 'Extremely fatigued or tired'])
@endcomponent

@component('components.form-group')
    <p>...how well were you able to concentrate or focus?</p>
    @include('components.radio', ['name' => 'focused_distracted', 'value' => 'Very focused/attentive'])
    @include('components.radio', ['name' => 'focused_distracted', 'value' => 'Moderately focused/attentive'])
    @include('components.radio', ['name' => 'focused_distracted', 'value' => 'Neutral'])
    @include('components.radio', ['name' => 'focused_distracted', 'value' => 'Moderately unfocused/distracted'])
    @include('components.radio', ['name' => 'focused_distracted', 'value' => 'Very unfocused/distracted'])
@endcomponent

@component('components.form-group')
    <p>...how irritable or easily angered have you been?</p>
    @include('components.radio', ['name' => 'irritable', 'value' => 'Not irritable or easily angered at all'])
    @include('components.radio', ['name' => 'irritable', 'value' => 'Slightly irritable or easily angered'])
    @include('components.radio', ['name' => 'irritable', 'value' => 'Moderately irritable or easily angered'])
    @include('components.radio', ['name' => 'irritable', 'value' => 'Very irritable or easily angered'])
    @include('components.radio', ['name' => 'irritable', 'value' => 'Extremely irritable or easily angered'])
@endcomponent

@component('components.form-group')
    <p>...how lonely were you?</p>
    @include('components.radio', ['name' => 'lonely', 'value' => 'Not lonely at all'])
    @include('components.radio', ['name' => 'lonely', 'value' => 'Slightly lonely'])
    @include('components.radio', ['name' => 'lonely', 'value' => 'Moderately lonely'])
    @include('components.radio', ['name' => 'lonely', 'value' => 'Very lonely'])
    @include('components.radio', ['name' => 'lonely', 'value' => 'Extremely lonely'])
@endcomponent

@component('components.form-group')
    <p>… to what extent did you have negative thoughts, thoughts about unpleasant
    experiences or things that made you feel bad?</p>
    @include('components.radio', ['name' => 'negative_thoughts', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'negative_thoughts', 'value' => 'Rarely'])
    @include('components.radio', ['name' => 'negative_thoughts', 'value' => 'Occasionally'])
    @include('components.radio', ['name' => 'negative_thoughts', 'value' => 'Often'])
    @include('components.radio', ['name' => 'negative_thoughts', 'value' => 'A lot of the time'])
@endcomponent

<h3>MEDIA USE (PAST TWO WEEKS)</h3>
<h3>During the PAST TWO WEEKS how much time per day did you spend...</h3>

@component('components.form-group')
    <p>...watching TV or digital media (e.g., Netflix, YouTube, web surfing)? </p>
    @include('components.radio', ['name' => 'tv_digital_media', 'value' => 'No TV or digital media'])
    @include('components.radio', ['name' => 'tv_digital_media', 'value' => 'Under 1 hour'])
    @include('components.radio', ['name' => 'tv_digital_media', 'value' => '1-3 hours'])
    @include('components.radio', ['name' => 'tv_digital_media', 'value' => '4-6 hours'])
    @include('components.radio', ['name' => 'tv_digital_media', 'value' => 'More than 6 hours'])
@endcomponent

@component('components.form-group')
    <p>...using social media (e.g., Facetime, Facebook, Instagram, Snapchat, Twitter, TikTok)? </p>
    @include('components.radio', ['name' => 'social_media', 'value' => 'No social media'])
    @include('components.radio', ['name' => 'social_media', 'value' => 'Under 1 hour'])
    @include('components.radio', ['name' => 'social_media', 'value' => '1-3 hours'])
    @include('components.radio', ['name' => 'social_media', 'value' => '4-6 hours'])
    @include('components.radio', ['name' => 'social_media', 'value' => 'More than 6 hours'])
@endcomponent

@component('components.form-group')
    <p>...playing video games? </p>
    @include('components.radio', ['name' => 'video_games', 'value' => 'No video games'])
    @include('components.radio', ['name' => 'video_games', 'value' => 'Under 1 hour'])
    @include('components.radio', ['name' => 'video_games', 'value' => '1-3 hours'])
    @include('components.radio', ['name' => 'video_games', 'value' => '4-6 hours'])
    @include('components.radio', ['name' => 'video_games', 'value' => 'More than 6 hours'])
@endcomponent

<h3>SUBSTANCE USE (PAST TWO WEEKS)</h3>
<h3>During the PAST TWO WEEKS, how frequently did you use...</h3>

@component('components.form-group')
    <p>...alcohol? </p>
    @include('components.radio', ['name' => 'alcohol', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'alcohol', 'value' => 'Rarely'])
    @include('components.radio', ['name' => 'alcohol', 'value' => 'Once a month'])
    @include('components.radio', ['name' => 'alcohol', 'value' => 'Once a week'])
    @include('components.radio', ['name' => 'alcohol', 'value' => 'Several times a week'])
    @include('components.radio', ['name' => 'alcohol', 'value' => 'Once a day'])
    @include('components.radio', ['name' => 'alcohol', 'value' => 'More than once a day'])
@endcomponent

@component('components.form-group')
    <p>...vaping products? </p>
    @include('components.radio', ['name' => 'vape', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'vape', 'value' => 'Rarely'])
    @include('components.radio', ['name' => 'vape', 'value' => 'Once a month'])
    @include('components.radio', ['name' => 'vape', 'value' => 'Once a week'])
    @include('components.radio', ['name' => 'vape', 'value' => 'Several times a week'])
    @include('components.radio', ['name' => 'vape', 'value' => 'Once a day'])
    @include('components.radio', ['name' => 'vape', 'value' => 'More than once a day'])
@endcomponent

@component('components.form-group')
    <p>...cigarettes or other tobacco? </p>
    @include('components.radio', ['name' => 'tobacco', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'tobacco', 'value' => 'Rarely'])
    @include('components.radio', ['name' => 'tobacco', 'value' => 'Once a month'])
    @include('components.radio', ['name' => 'tobacco', 'value' => 'Once a week'])
    @include('components.radio', ['name' => 'tobacco', 'value' => 'Several times a week'])
    @include('components.radio', ['name' => 'tobacco', 'value' => 'Once a day'])
    @include('components.radio', ['name' => 'tobacco', 'value' => 'More than once a day'])
@endcomponent

@component('components.form-group')
    <p>...marijuana/cannabis (e.g., joint, blunt, pipe, bong)? </p>
    @include('components.radio', ['name' => 'cannabis', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'cannabis', 'value' => 'Rarely'])
    @include('components.radio', ['name' => 'cannabis', 'value' => 'Once a month'])
    @include('components.radio', ['name' => 'cannabis', 'value' => 'Once a week'])
    @include('components.radio', ['name' => 'cannabis', 'value' => 'Several times a week'])
    @include('components.radio', ['name' => 'cannabis', 'value' => 'Once a day'])
    @include('components.radio', ['name' => 'cannabis', 'value' => 'More than once a day'])
@endcomponent

@component('components.form-group')
    <p>...opiates, heroin, cocaine, or narcotics? </p>
    @include('components.radio', ['name' => 'opiates', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'opiates', 'value' => 'Rarely'])
    @include('components.radio', ['name' => 'opiates', 'value' => 'Once a month'])
    @include('components.radio', ['name' => 'opiates', 'value' => 'Once a week'])
    @include('components.radio', ['name' => 'opiates', 'value' => 'Several times a week'])
    @include('components.radio', ['name' => 'opiates', 'value' => 'Once a day'])
    @include('components.radio', ['name' => 'opiates', 'value' => 'More than once a day'])
@endcomponent

@component('components.form-group')
    <p>...other drugs including cocaine, crack, amphetamine, methamphetamine,
    hallucinogens, or ecstasy? </p>
    @include('components.radio', ['name' => 'other_drugs', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'other_drugs', 'value' => 'Rarely'])
    @include('components.radio', ['name' => 'other_drugs', 'value' => 'Once a month'])
    @include('components.radio', ['name' => 'other_drugs', 'value' => 'Once a week'])
    @include('components.radio', ['name' => 'other_drugs', 'value' => 'Several times a week'])
    @include('components.radio', ['name' => 'other_drugs', 'value' => 'Once a day'])
    @include('components.radio', ['name' => 'other_drugs', 'value' => 'More than once a day'])
@endcomponent

@component('components.form-group')
    <p>...sleeping medications or sedatives/hypnotics?</p>
    @include('components.radio', ['name' => 'sedatives', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'sedatives', 'value' => 'Rarely'])
    @include('components.radio', ['name' => 'sedatives', 'value' => 'Once a month'])
    @include('components.radio', ['name' => 'sedatives', 'value' => 'Once a week'])
    @include('components.radio', ['name' => 'sedatives', 'value' => 'Several times a week'])
    @include('components.radio', ['name' => 'sedatives', 'value' => 'Once a day'])
    @include('components.radio', ['name' => 'sedatives', 'value' => 'More than once a day'])
@endcomponent

<h3>Supports</h3>

@component('components.form-group')
    <p>Which of the following supports were in place for you before the
    Coronavirus/COVID-19 crisis in your area and have been disrupted over the PAST
    TWO WEEKS? (check all that apply)</p>
    @include('components.checkbox', ['name' => 'supports[]', 'value' => 'Resource room'])
    @include('components.checkbox', ['name' => 'supports[]', 'value' => 'Tutoring'])
    @include('components.checkbox', ['name' => 'supports[]', 'value' => 'Mentoring programs'])
    @include('components.checkbox', ['name' => 'supports[]', 'value' => 'After school activity programs'])
    @include('components.checkbox', ['name' => 'supports[]', 'value' => 'Volunteer programs'])
    @include('components.checkbox', ['name' => 'supports[]', 'value' => 'Psychotherapy'])
    @include('components.checkbox', ['name' => 'supports[]', 'value' => 'Psychiatric care'])
    @include('components.checkbox', ['name' => 'supports[]', 'value' => 'Occupational therapy'])
    @include('components.checkbox', ['name' => 'supports[]', 'value' => 'Physical therapy'])
    @include('components.checkbox', ['name' => 'supports[]', 'value' => 'Speech/language therapy'])
    @include('components.checkbox', ['name' => 'supports[]', 'value' => 'Sporting activities'])
    @include('components.checkbox', ['name' => 'supports[]', 'value' => 'Medical care for chronic illnesses'])
    @include('components.input', ['name' => 'supports[]', 'placeholder'=>'Other'])
@endcomponent

@component('components.form-group')
    <p>Please describe anything else that concerns you about the impact of Coronavirus/COVID-19 on you, your friends, or your family.</p>
    @include('components.textarea', ['name' => 'other_covid_concerns'])
@endcomponent

@component('components.form-group')
    <p>Please provide any comments that you would like about this survey and/or related topics.</p>
    @include('components.textarea', ['name' => 'other_survey_comments'])
@endcomponent
