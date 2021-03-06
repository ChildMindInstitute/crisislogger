<h3>For your recording to be really useful for scientific research,
 please provide some background information about yourself:</h3>

@component('components.country')
@endcomponent


@component('components.form-group')
    <label for="dob">Your date of birth?</label>
    <input class="form-control datepicker" id="dob" type="text" value="" style="width: 100%" name="dob" placeholder="Select date" />
@endcomponent

<h3>BACKGROUND</h3>
<h3>First, before we get started with the main questions, we would like to obtain some
background information about you.</h3>

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
    <p>Thinking about what you know of your family history, which of the following best describes the geographic regions where your ancestors (i.e. your great-great-grandparents) come from? You may select as many choices as you need.</p>
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'England, Ireland, Scotland or Wales'])
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'Australia – not of Aboriginal or Torres Strait Islander descent'])
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'Australia – not of Aboriginal or Torres Strait Islander descent'])
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'Australia – of Aboriginal or Torres Strait Islander descent'])
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'New Zealand – not of Maori descent'])
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'New Zealand – of Maori descent'])
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'Northern Europe including Sweden, Norway, Finland and surrounding countries'])
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'Western Europe including France, Germany, the Netherlands and surrounding countries'])
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'Southern Europe including Italy, Greece, Spain, Portugal and surrounding countries'])
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'Middle East including Lebanon, Turkey and surrounding countries'])
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'Eastern Asia including China, Japan, South Korea, North Korea, Taiwan and Hong Kong'])
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'South-East Asia including Thailand, Malaysia, Indonesia, Singapore and surrounding countries'])
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'South Asia including India, Pakistan, Sri Lanka and surrounding countries'])
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'Polynesia, Micronesia or Melanesia including Tonga, Fiji, Papua New Guinea and surrounding countries'])
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'Africa'])
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'North America - not of First Nations, Native American, Inuit or Métis descent'])
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'North America - of First Nations, Native American, Inuit or Métis descent'])
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'Don’t know'])
    @include('components.checkbox', ['name' => 'race[]', 'value' => 'Other '])
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
    <p>What is the highest level of education <em>you</em> completed?</p>
    @include('components.radio', ['name' => 'education', 'value' => 'Some grade school'])
    @include('components.radio', ['name' => 'education', 'value' => 'Some high school'])
    @include('components.radio', ['name' => 'education', 'value' => 'High school diploma or GED'])
    @include('components.radio', ['name' => 'education', 'value' => 'Some college of 2 year degree'])
    @include('components.radio', ['name' => 'education', 'value' => '4 year college degree'])
    @include('components.radio', ['name' => 'education', 'value' => 'Some school beyond college'])
    @include('components.radio', ['name' => 'education', 'value' => 'Graduate or professional degree'])
@endcomponent

@component('components.form-group')
    <p>How many people currently live in your house (excluding yourself)?</p>
    @include('components.input', ['name' => 'number_people_living_in_house'])
@endcomponent

@component('components.form-group')
    <p>Please specify your relationship to the people in your home (check all that apply): </p>
    @include('components.checkbox', ['name' => 'relationship[]', 'value' => 'Partner/Spouse'])
    @include('components.checkbox', ['name' => 'relationship[]', 'value' => 'Parent(s)'])
    @include('components.checkbox', ['name' => 'relationship[]', 'value' => 'Grandparent(s)'])
    @include('components.checkbox', ['name' => 'relationship[]', 'value' => 'Siblings'])
    @include('components.checkbox', ['name' => 'relationship[]', 'value' => 'Children'])
    @include('components.checkbox', ['name' => 'relationship[]', 'value' => 'Other relatives'])
    @include('components.checkbox', ['name' => 'relationship[]', 'value' => 'Unrelated person'])
@endcomponent

@component ('components.form-group')
    <p> Are any adults living in the home an ESSENTIAL WORKER (e.g., healthcare,
    delivery worker, store worker, security, building maintenance)? <p>
    @include('components.radio-group', ['name' => 'essentialworker'])
@endcomponent

@component ('components.form-group')
    <p>If yes,</p>
    <p> Do they come home each day? <p>
    @include('components.radio-group', ['name' => 'essentialworkerhome', 'value' => 'Yes'])
    @include('components.radio-group', ['name' => 'essentialworkerhome', 'value' => 'No, separated due to COVID-19'])
    @include('components.radio-group', ['name' => 'essentialworkerhome', 'value' => 'No, separated due to other reasons'])
@endcomponent

@component ('components.form-group')
    <p>If yes,</p>
    <p> Are they a FIRST RESPONDER, HEALTHCARE PROVIDER or OTHER WORKER in a facility treating COVID-19? <p>
    @include('components.radio-group', ['name' => 'firstresponder'])
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
    @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Intellectual disability'])
    @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Autism Spectrum Disorder'])
    @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Learning Disorder'])
    @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Attention-Deficit/Hyperactivity Disorder'])
    @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Other problems requiring special education services'])
    @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Other childhood onset neurodevelopmental conditions'])
    @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Known genetic conditions'])
    @include('components.checkbox', ['name' => 'health_conditions[]', 'value' => 'Other'])
@endcomponent

@component('components.form-group')
    <p>If other, please specify</p>
    @include('components.input', ['name' => 'other-physical-health'])
@endcomponent
@component('components.form-group')
    <p>How tall are you?</p>
    @include('components.input', ['name' => 'height'])
@endcomponent

@component('components.form-group')
    <p>Measurement:</p>
    @include('components.radio', ['name' => 'mental_health', 'value' => 'Inches(in)'])
    @include('components.radio', ['name' => 'mental_health', 'value' => 'Centimeters(cm)'])
@endcomponent

@component('components.form-group')
    <p>How much do you weigh?</p>
    @include('components.input', ['name' => 'weight'])
@endcomponent

@component('components.form-group')
    <p>Measurement:</p>
    @include('components.radio', ['name' => 'mental_health', 'value' => 'Pounds(lbs)'])
    @include('components.radio', ['name' => 'mental_health', 'value' => 'Kilograms(kg)'])
@endcomponent

@component('components.form-group')
    <p>How would you rate your overall mental health before the COVID-19 crisis in your area?</p>
    @include('components.radio', ['name' => 'mental_health', 'value' => 'Excellent'])
    @include('components.radio', ['name' => 'mental_health', 'value' => 'Very Good'])
    @include('components.radio', ['name' => 'mental_health', 'value' => 'Good'])
    @include('components.radio', ['name' => 'mental_health', 'value' => 'Fair'])
    @include('components.radio', ['name' => 'mental_health', 'value' => 'Poor'])
@endcomponent
