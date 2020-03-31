@component('components.portlet-sticky', ['title' => 'Exposure COVID-19 Health / Exposure Status', 'z_index' => 2])
    <h3>During the past two weeks:</h3>

    @component('components.form-group')
        <p>Has your child been exposed to someone likely to have Coronavirus (COVID-19)?</p>
        @include('components.radio', ['name' => 'child_exposed', 'value' => 'Yes, with positive test'])
        @include('components.radio', ['name' => 'child_exposed', 'value' => 'Yes, with medical diagnosis'])
        @include('components.radio', ['name' => 'child_exposed', 'value' => 'Yes, but not diagnosed'])
        @include('components.radio', ['name' => 'child_exposed', 'value' => 'No'])
    @endcomponent

    @component('components.form-group')
        <p>Has <strong>your child</strong> been diagnosed with Coronavirus (COVID-19)?</p>
        @include('components.radio', ['name' => 'child_exposed', 'value' => 'Yes, positive test'])
        @include('components.radio', ['name' => 'child_exposed', 'value' => 'Yes, medical diagnosis'])
        @include('components.radio', ['name' => 'child_exposed', 'value' => 'No'])
    @endcomponent

    @component('components.form-group')
        <p>Has your child had any of the following symptoms in the past month? (Y/N each)</p>
        @include('components.radio-group', ['name' => 'child_symptom_fever', 'value' => 'Fever'])
        @include('components.radio-group', ['name' => 'child_symptom_cough', 'value' => 'Cough'])
        @include('components.radio-group', ['name' => 'child_symptom_shortness_breath', 'value' => 'Shortness Breath'])
        @include('components.radio-group', ['name' => 'child_symptom_sore_throat', 'value' => 'Sore Throat'])
        @include('components.radio-group', ['name' => 'child_symptom_fatigue', 'value' => 'Fatigue'])
    @endcomponent

    @component('components.form-group')
        <p>Has anyone in your child's family been diagnosed with Coronavirus (COVID-19)?</p>
        @include('components.radio', ['name' => 'child_family', 'value' => 'Yes, member of household'])
        @include('components.radio', ['name' => 'child_family', 'value' => 'Yes, non-household member'])
        @include('components.radio', ['name' => 'child_family', 'value' => 'No'])
    @endcomponent

    @component('components.form-group')
        <p>In the last week, have any of the following happened to your child’s family members because of COVID-19?</p>
        @include('components.checkbox', ['name' => 'child_family_members[]', 'value' => 'Fallen ill physically'])
        @include('components.checkbox', ['name' => 'child_family_members[]', 'value' => 'Hospitalized'])
        @include('components.checkbox', ['name' => 'child_family_members[]', 'value' => 'Isolated or put into quarantine'])
        @include('components.checkbox', ['name' => 'child_family_members[]', 'value' => 'Lost job'])
    @endcomponent

    @component('components.form-group')
        <p>How worried is your child about being infected? 1 is not worried at all, 7 is very worried.</p>
        @include('components.radio-range', ['name' => 'child_worried', 'max' => 7])
    @endcomponent
@endcomponent
