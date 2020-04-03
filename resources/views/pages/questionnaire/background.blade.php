@component('components.portlet-sticky', ['title' => 'Background', 'z_index' => 1])
    <h3>For your recording to be really useful for scientific research,
     please provide some background information about yourself:</h3>

    @component('components.form-group')
        <label for="dob">Your date of birth?</label>
        <input class="form-control datepicker" id="dob" type="text" value="" name="dob" required placeholder="Select date" />
    @endcomponent

    @component('components.form-group')
        <label for="sex">Sex</label>
        @include('components.radio', ['name' => 'sex', 'value' => 'Male'])
        @include('components.radio', ['name' => 'sex', 'value' => 'Female'])
        @include('components.radio', ['name' => 'sex', 'value' => 'Other'])
    @endcomponent

    <div class="form-group" id="other-sex-container" style="display:none">
        <div class="row">
            <div class="col-sm-12">
                <label for="other-sex">Other</label>
                <input id="other-sex" name="other-sex" type="text" class="form-control" placeholder="Specify gender" />
            </div>
        </div>
    </div>

    @component('components.form-group')
        <p>Which of the following best describes your race?</p>
        @include('components.radio', ['name' => 'race', 'value' => 'Black/African American'])
        @include('components.radio', ['name' => 'race', 'value' => 'Asian'])
        @include('components.radio', ['name' => 'race', 'value' => 'American Indian or Alaska Native'])
        @include('components.radio', ['name' => 'race', 'value' => 'Native Hawaiian or other Pacific Islander'])
        @include('components.radio', ['name' => 'race', 'value' => 'White/Caucasian'])
        @include('components.radio', ['name' => 'race', 'value' => 'More than one race'])
        @include('components.radio', ['name' => 'race', 'value' => 'Other'])
    @endcomponent

    @component('components.form-group')
        <p>Are you of Hispanic or Latino descent -- that is, Mexican, Mexican American, Chicano, Puerto Rican, Cuban, South or Central American or other Spanish culture or origin?</p>
        @include('components.radio-group', ['name' => 'hispanic_latino'])
    @endcomponent

    @component('components.form-group')
        <p>Are you currently working or in school?</p>
        @include('components.radio', ['name' => 'working_or_in_school', 'value' => 'Working for pay'])
        @include('components.radio', ['name' => 'working_or_in_school', 'value' => 'On leave'])
        @include('components.radio', ['name' => 'working_or_in_school', 'value' => 'Unemployed and looking for a job'])
        @include('components.radio', ['name' => 'working_or_in_school', 'value' => 'Retired'])
        @include('components.radio', ['name' => 'working_or_in_school', 'value' => 'Staying at home/homemaker'])
        @include('components.radio', ['name' => 'working_or_in_school', 'value' => 'Disabled'])
        @include('components.radio', ['name' => 'working_or_in_school', 'value' => 'Enrolled in school/college/university'])
    @endcomponent

    @component('components.form-group')
        <p>What is your occupation?</p>
        @include('components.input', ['name' => 'occupation', 'placeholder' => 'Enter occupation'])
    @endcomponent

    @component('components.form-group')
        <p>Have you served in the military?</p>
        @include('components.radio-group', ['name' => 'military'])
    @endcomponent

    @component('components.form-group')
        <p>What best describes the area you live in?</p>
        @include('components.radio', ['name' => 'location', 'value' => 'Large city'])
        @include('components.radio', ['name' => 'location', 'value' => 'Suburbs of a large city'])
        @include('components.radio', ['name' => 'location', 'value' => 'Small city'])
        @include('components.radio', ['name' => 'location', 'value' => 'Town or village'])
        @include('components.radio', ['name' => 'location', 'value' => 'Rural area'])
    @endcomponent

    @component('components.form-group')
        <p>What is the highest level of education <strong>you</strong> completed?</p>
        @include('components.radio', ['name' => 'education', 'value' => 'Some grade school'])
        @include('components.radio', ['name' => 'education', 'value' => 'Some high school'])
        @include('components.radio', ['name' => 'education', 'value' => 'High school diploma or GED'])
        @include('components.radio', ['name' => 'education', 'value' => 'Some college of 2 year degree'])
        @include('components.radio', ['name' => 'education', 'value' => '4 year college degree'])
        @include('components.radio', ['name' => 'education', 'value' => 'Some school beyond college'])
        @include('components.radio', ['name' => 'education', 'value' => 'Graduate or professional degree'])
    @endcomponent

    @component('components.form-group')
        <p>What is the highest level of education <strong>your mother</strong> completed?</p>
        @include('components.radio', ['name' => 'education_mother', 'value' => 'Some grade school'])
        @include('components.radio', ['name' => 'education_mother', 'value' => 'Some high school'])
        @include('components.radio', ['name' => 'education_mother', 'value' => 'High school diploma or GED'])
        @include('components.radio', ['name' => 'education_mother', 'value' => 'Some college of 2 year degree'])
        @include('components.radio', ['name' => 'education_mother', 'value' => '4 year college degree'])
        @include('components.radio', ['name' => 'education_mother', 'value' => 'Some school beyond college'])
        @include('components.radio', ['name' => 'education_mother', 'value' => 'Graduate or professional degree'])
    @endcomponent

    @component('components.form-group')
        <p>What is the highest level of education <strong>your father</strong> completed?</p>
        @include('components.radio', ['name' => 'education_father', 'value' => 'Some grade school'])
        @include('components.radio', ['name' => 'education_father', 'value' => 'Some high school'])
        @include('components.radio', ['name' => 'education_father', 'value' => 'High school diploma or GED'])
        @include('components.radio', ['name' => 'education_father', 'value' => 'Some college of 2 year degree'])
        @include('components.radio', ['name' => 'education_father', 'value' => '4 year college degree'])
        @include('components.radio', ['name' => 'education_father', 'value' => 'Some school beyond college'])
        @include('components.radio', ['name' => 'education_father', 'value' => 'Graduate or professional degree'])
    @endcomponent

    @component('components.form-group')
        <p>How many people currently live in your house (excluding yourself)?</p>
        @include('components.input', ['name' => 'number_people_living_in_house'])
    @endcomponent

    @component('components.form-group')
        <p>Please specify the relationship to the people in your house (check all that apply)</p>
        @include('components.checkbox', ['name' => 'relationship[]', 'value' => 'Partner/Spouse'])
        @include('components.checkbox', ['name' => 'relationship[]', 'value' => 'Parents(s)'])
        @include('components.checkbox', ['name' => 'relationship[]', 'value' => 'Grandparent(s)'])
        @include('components.checkbox', ['name' => 'relationship[]', 'value' => 'Siblings'])
        @include('components.checkbox', ['name' => 'relationship[]', 'value' => 'Children'])
        @include('components.checkbox', ['name' => 'relationship[]', 'value' => 'Other relatives'])
        @include('components.checkbox', ['name' => 'relationship[]', 'value' => 'Unrelated person'])
    @endcomponent

    @component('components.form-group')
        <p>How many rooms (total) are in your house?</p>
        @include('components.input', ['name' => 'number_rooms'])
    @endcomponent

    @component('components.form-group')
        <p>Are you covered by health insurance?</p>
        @include('components.radio', ['name' => 'health_insurance', 'value' => 'Yes, military'])
        @include('components.radio', ['name' => 'health_insurance', 'value' => 'Yes, employer sponsored'])
        @include('components.radio', ['name' => 'health_insurance', 'value' => 'Yes, individual'])
        @include('components.radio', ['name' => 'health_insurance', 'value' => 'Yes, Medicare'])
        @include('components.radio', ['name' => 'health_insurance', 'value' => 'Yes, Medicaid or CHIP'])
        @include('components.radio', ['name' => 'health_insurance', 'value' => 'Yes, other'])
        @include('components.radio', ['name' => 'health_insurance', 'value' => 'No'])
    @endcomponent

    @component('components.form-group')
        <p>In the 3 months prior to the Coronavirus/COVID-19 crisis in your area, did you or your family receive money from government assistance programs like welfare, Aid to Families with Dependent Children, General Assistance, or Temporary Assistance for Needy Families</p>
        @include('components.radio-group', ['name' => 'money_government_program'])
    @endcomponent

    @component('components.form-group')
        <p>How would you rate your overall physical health?</p>
        @include('components.radio', ['name' => 'physical_health', 'value' => 'Excellent'])
        @include('components.radio', ['name' => 'physical_health', 'value' => 'Very Good'])
        @include('components.radio', ['name' => 'physical_health', 'value' => 'Good'])
        @include('components.radio', ['name' => 'physical_health', 'value' => 'Fair'])
        @include('components.radio', ['name' => 'physical_health', 'value' => 'Poor'])
    @endcomponent

    @component('components.form-group')
        <p>Has a health professional ever told you that you have had any of the following health conditions (check all that apply)?</p>
        @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Seasonal allergies'])
        @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Asthma or other lung problems'])
        @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Heart Problems'])
        @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Kidney Problems'])
        @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Immune disorder'])
        @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Diabetes or high blood sugar'])
        @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Cancer'])
        @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Arthritis'])
        @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Frequent or very bad headaches'])
        @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Epilepsy or seizures'])
        @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Serious stomach or bowel problems'])
        @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Serious acne or skin problems'])
        @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Emotional or mental health problems such as Depression or Anxiety'])
        @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Problems with alcohol or drugs'])
    @endcomponent

    @component('components.form-group')
        <p>How tall are you?</p>
        @include('components.input', ['name' => 'height'])
    @endcomponent

    @component('components.form-group')
        <p>How much do you weigh?</p>
        @include('components.input', ['name' => 'weight'])
    @endcomponent

    @component('components.form-group')
        <p>How would you rate your overall mental health before the COVID-19 crisis in your area?</p>
        @include('components.radio', ['name' => 'mental_health', 'value' => 'Excellent'])
        @include('components.radio', ['name' => 'mental_health', 'value' => 'Very Good'])
        @include('components.radio', ['name' => 'mental_health', 'value' => 'Good'])
        @include('components.radio', ['name' => 'mental_health', 'value' => 'Fair'])
        @include('components.radio', ['name' => 'mental_health', 'value' => 'Poor'])
    @endcomponent


@endcomponent
