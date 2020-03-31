@component('components.portlet-sticky', ['title' => 'Background', 'z_index' => 1])
    <h3>First, before we get started with the main questions, we would like to obtain some background information about you.</h3>

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
        <p>Which of the following best describes your child's race?</p>
        @include('components.radio', ['name' => 'child_race', 'value' => 'Black/African American'])
        @include('components.radio', ['name' => 'child_race', 'value' => 'Asian'])
        @include('components.radio', ['name' => 'child_race', 'value' => 'American Indian or Alaska Native'])
        @include('components.radio', ['name' => 'child_race', 'value' => 'Native Hawaiian or other Pacific Islander'])
        @include('components.radio', ['name' => 'child_race', 'value' => 'White/Caucasian'])
        @include('components.radio', ['name' => 'child_race', 'value' => 'More than one race'])
        @include('components.radio', ['name' => 'child_race', 'value' => 'Other'])
    @endcomponent

    @component('components.form-group')
        <p>Is your child of Hispanic or Latino descent -- that is, Mexican, Mexican American, Chicano, Puerto Rican, Cuban, South or Central American or other Spanish culture or origin?</p>
        @include('components.radio-group', ['name' => 'child_hispanic_latino'])
    @endcomponent

    @component('components.form-group')
        <p>Is your child currently in school?</p>
        @include('components.radio-group', ['name' => 'child_school'])
    @endcomponent
    <div class="form-group" id="child_grade_container" style="display: none;">
        <div class="row">
            <div class="col-sm-12">
                <label for="child_grade">What grade?</label>
                <input class="form-control" type="number" min="1" max="12" step="1" name="child_grade" id="child_grade" placeholder="Enter child's grade" />
            </div>
        </div>
    </div>

    @component('components.form-group')
        <p>Do you and your child live in a large city, suburbs of a large city, a small city, a town or village, or in a rural area?</p>
        @include('components.radio', ['name' => 'location', 'value' => 'Large city'])
        @include('components.radio', ['name' => 'location', 'value' => 'Suburbs of a large city'])
        @include('components.radio', ['name' => 'location', 'value' => 'Small city'])
        @include('components.radio', ['name' => 'location', 'value' => 'Town or village'])
        @include('components.radio', ['name' => 'location', 'value' => 'Rural area'])
    @endcomponent

    @component('components.form-group')
        <p>Including you, how many people currently live in your home?</p>
        @include('components.radio', ['name' => 'house_count', 'value' => 'One parent'])
        @include('components.radio', ['name' => 'house_count', 'value' => 'Two parents'])
        @include('components.radio', ['name' => 'house_count', 'value' => 'Grandparents'])
        @include('components.radio', ['name' => 'house_count', 'value' => 'Siblings'])
        @include('components.radio', ['name' => 'house_count', 'value' => 'Children'])
        @include('components.radio', ['name' => 'house_count', 'value' => 'Other relatives'])
    @endcomponent

    @component('components.form-group')
        <p>Are you and your child covered by health insurance?</p>
        @include('components.radio', ['name' => 'health_insurance', 'value' => 'Yes, military'])
        @include('components.radio', ['name' => 'health_insurance', 'value' => 'Yes, employer sponsored'])
        @include('components.radio', ['name' => 'health_insurance', 'value' => 'Yes, individual'])
        @include('components.radio', ['name' => 'health_insurance', 'value' => 'Yes, Medicare'])
        @include('components.radio', ['name' => 'health_insurance', 'value' => 'Yes, Medicaid or CHIP'])
        @include('components.radio', ['name' => 'health_insurance', 'value' => 'Yes, other'])
        @include('components.radio', ['name' => 'health_insurance', 'value' => 'No'])
    @endcomponent

    @component('components.form-group')
        <p>Does your family receive money from government assistance programs like welfare, Aid to Families with Dependent Children, General Assistance, or Temporary Assistance for Needy Families?</p>
        @include('components.radio-group', ['name' => 'government_assistance'])
    @endcomponent

    @component('components.form-group')
        <p>How would you rate your child's overall physical health?</p>
        @include('components.radio', ['name' => 'child_physical_health', 'value' => 'Excellent'])
        @include('components.radio', ['name' => 'child_physical_health', 'value' => 'Very Good'])
        @include('components.radio', ['name' => 'child_physical_health', 'value' => 'Good'])
        @include('components.radio', ['name' => 'child_physical_health', 'value' => 'Fair'])
        @include('components.radio', ['name' => 'child_physical_health', 'value' => 'Poor'])
    @endcomponent

    @component('components.form-group')
        <p>Has a health professional ever told you that your child had any of the following health conditions (check all that apply)?</p>
        @include('components.checkbox', ['name' => 'child_health_conditions[]', 'value' => 'Seasonal allergies'])
        @include('components.checkbox', ['name' => 'child_health_conditions[]', 'value' => 'Asthma or other lung problems'])
        @include('components.checkbox', ['name' => 'child_health_conditions[]', 'value' => 'Heart Problems'])
        @include('components.checkbox', ['name' => 'child_health_conditions[]', 'value' => 'Kidney Problems'])
        @include('components.checkbox', ['name' => 'child_health_conditions[]', 'value' => 'Immune disorder'])
        @include('components.checkbox', ['name' => 'child_health_conditions[]', 'value' => 'Diabetes or high blood sugar'])
        @include('components.checkbox', ['name' => 'child_health_conditions[]', 'value' => 'Cancer'])
        @include('components.checkbox', ['name' => 'child_health_conditions[]', 'value' => 'Arthritis'])
        @include('components.checkbox', ['name' => 'child_health_conditions[]', 'value' => 'Frequent or very bad headaches'])
        @include('components.checkbox', ['name' => 'child_health_conditions[]', 'value' => 'Epilepsy or seizures'])
        @include('components.checkbox', ['name' => 'child_health_conditions[]', 'value' => 'Serious stomach or bowel problems'])
        @include('components.checkbox', ['name' => 'child_health_conditions[]', 'value' => 'Serious acne or skin problems'])
        @include('components.checkbox', ['name' => 'child_health_conditions[]', 'value' => 'Emotional or mental health problems such as Depression or Anxiety'])
        @include('components.checkbox', ['name' => 'child_health_conditions[]', 'value' => 'Problems with alcohol or drugs'])
    @endcomponent

    @component('components.form-group')
        <label for="height">How tall is your child?</label>
        <input id="height" type="text" class="form-control" name="height" />
    @endcomponent

    @component('components.form-group')
        <label for="weight">How much does your child weigh?</label>
        <input id="weight" type="text" class="form-control" name="weight" />
    @endcomponent

    @component('components.form-group')
        <p>How would you rate your child's overall mental health?</p>
        @include('components.radio', ['name' => 'child_mental_health', 'value' => 'Excellent'])
        @include('components.radio', ['name' => 'child_mental_health', 'value' => 'Very Good'])
        @include('components.radio', ['name' => 'child_mental_health', 'value' => 'Good'])
        @include('components.radio', ['name' => 'child_mental_health', 'value' => 'Fair'])
        @include('components.radio', ['name' => 'child_mental_health', 'value' => 'Poor'])
    @endcomponent

    @component('components.form-group')
        <p>Has your child used any of the following more than 5 times in the past year? Yes/No</p>
        @include('components.radio-group', ['name' => 'child_alcohol', 'value' => 'Alcohol'])
        @include('components.radio-group', ['name' => 'child_cigarettes', 'value' => 'Cigarettes or other tobacco'])
        @include('components.radio-group', ['name' => 'child_marijuana', 'value' => 'Marijuana/cannabis (e.g. joint, blunt, pipe, bong)'])
        @include('components.radio-group', ['name' => 'child_other_drugs', 'value' => 'Other drugs including cocaine, crack, amphetamine, methamphetamine, Hallucinogens, Ecstasy, Sedatives, Opiates, Heroin, Narcotics'])
    @endcomponent
@endcomponent
