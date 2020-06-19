@extends('layout.subdomain.app')
@section('title', 'Questionnaire')
@section('description', '')
@section('content')
<?php
    $questionnaireComponents = array();
    try {
        $questionnairePath = resource_path('views/pages/subdomain/'.session()->get('subdomain').'/questionnaire');
        $files = File::files($questionnairePath);
        foreach ($files as $file)
        {
            $filename = $file->getFilename();
            $filename = substr($filename, 0, strpos($filename, '.'));
            if ($filename =='index')
            {
                continue;
            }
            $questionnaireComponents[] = array('view' => 'pages.subdomain.'.session()->get('subdomain').'.questionnaire.'.$filename,
                'title' => strtoupper(substr($filename, 0, 1)).''.substr($filename, 1, strlen($filename)));
        }
    }
    catch (\Exception $e)
    {
    }
?>
    {{--<div class="container">
        <form method="POST" action="{{ route('questionnaire_form_upload') }}">
            @csrf

            @include('pages.questionnaire.background')
            @include('pages.questionnaire.exposure')
            @include('pages.questionnaire.life-changes')

            @component('components.form-group')
                <button type="submit" class="btn btn-success">Submit</button>
            @endcomponent
        </form>
    </div>--}}

    <div class="container">
        @component('components.portlet')
            @if(!count($questionnaireComponents))
            <div class=" kt-grid--desktop-xl kt-grid--ver-desktop-xl kt-wizard-v3 kt-wizard-v3--extend" id="questionnaire_wizard" data-ktwizard-state="step-first">
                <div class="kt-grid__item kt-wizard-v3__aside">
                    <!--begin: Form Wizard Nav -->
                    <div class="kt-wizard-v3__nav">
                        <div class="kt-wizard-v3__nav-items">
                            @foreach( $questionnaireComponents as $key => $questionnaire)
                            @if($key === 0 )
                            <div class="kt-wizard-v3__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                                <div class="kt-wizard-v3__nav-body">
                                    <div class="kt-wizard-v3__nav-label">
                                        <span>{{$key + 1}}</span> {{$questionnaire['title']}}
                                    </div>
                                    <div class="kt-wizard-v3__nav-bar"></div>
                                </div>
                            </div>
                            @else
                            <div class="kt-wizard-v3__nav-item" data-ktwizard-type="step">
                                <div class="kt-wizard-v3__nav-body">
                                    <div class="kt-wizard-v3__nav-label">
                                        <span>{{$key + 1}}</span> {{$questionnaire['title']}}
                                    </div>
                                    <div class="kt-wizard-v3__nav-bar"></div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            <div class="kt-wizard-v3__nav-item" data-ktwizard-type="step">
                                <div class="kt-wizard-v3__nav-body">
                                    <div class="kt-wizard-v3__nav-label">
                                        <span>{{count($questionnaireComponents) + 1}}</span> Submit
                                    </div>
                                    <div class="kt-wizard-v3__nav-bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end: Form Wizard Nav -->

                </div>
                <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v3__wrapper">
                    <!--begin: Form Wizard Form-->
                    <form id="QuestionnaireForm" class="kt-form" method="POST" action="{{ route('questionnaire_form_upload') }}">
                        @foreach($questionnaireComponents as $questionnaire2)
                        @csrf
                        <!--begin: Form Wizard Step 1-->
                        @if($key === 0 )
                        <div class="kt-wizard-v3__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                            @include($questionnaire2['view'])
                        </div>
                        @else
                            <div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
                                @include($questionnaire2['view'])
                            </div>
                        @endif
                        @endforeach
                        <!--begin: Form Wizard Step 4-->
                        <div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
                            <p>Please ensure the information you have added is correct and to the best of your knowledge.</p>
                            <p>Thank you for your cooperation!</p>
                        </div>
                        <!--end: Form Wizard Step 4-->

                        <!--begin: Form Actions -->
                        <div class="kt-form__actions">
                            <div class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                                <span>
                                    <span>Previous</span>
                                </span>
                            </div>
                            <button type="submit" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit" id="questionaireSubmit">
                                <span>
                                    <span>Submit</span>
                                </span>
                            </button>
                            <div class="btn btn-info btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                                <span>
                                    <span>Next Step</span>
                                </span>
                            </div>
                        </div>
                        <!--end: Form Actions -->
                    </form>
                    <!--end: Form Wizard Form-->
                </div>
            </div>
            @else
                <p>Sorry, but there is no questionnaire data yet</p>
                <br>
                <br>
                <a class="btn btn-success " href="{{route('dashboard')}}">
                    Go to dashboard
                </a>
            @endif
        @endcomponent
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/pages/questionnaire.js') }}"></script>

    <script>
        $(function () {
            $.ajax({
                type: "get",
                url: "/getCountries/",
                success: function (res) {
                    if (res) {
                        $("#country").empty();
                        $("#state").empty();
                        $("#city").empty();
                        $("#country").append('<option>Select Country</option>');
                        let output = []
                        let usKey = 0;
                        $.each(res, function (key, value) {
                            if (usKey === 0 && value.abbrev !== undefined && value.abbrev.toString().toLowerCase() == 'u.s.a.')
                            {
                                usKey = '<option value="' + value.name.common + '" data-id="' + value.ne_id + '">' + value.name.common + '</option>';
                            }
                            else {
                                output.push('<option value="' + value.name.common + '" data-id="' + value.ne_id + '">' + value.name.common + '</option>');
                            }
                        });
                        if(output.length > 0 && usKey !== 0)
                        {
                            output.sort()
                            output.unshift(usKey, output);
                        }
                        $('#country').append(output.join(' '))

                    }
                }
            });
        });

        $('#country').change(function () {
            var cid = $(this).find(':selected').data('id');
            if (cid) {
                $.ajax({
                    type: "get",
                    url: "/getStates/" + cid,
                    success: function (res) {
                        if (res) {
                            $("#state").empty();
                            $("#city").empty();
                            $("#state").append('<option>Select State</option>');
                            $.each(res, function (key, value) {
                                $("#state").append('<option value="' + value.name + '">' + value.name + '</option>');
                            });
                        }
                    }

                });
            }
        });

        $('#state').change(function () {
            var sid = $(this).val();
            var cid = $("#country").find(':selected').data('id');
            if (sid) {
                $.ajax({
                    type: "get",
                    url: "/getCities/" + cid + "/" + sid,
                    success: function (res) {
                        if (res) {
                            $("#city").empty();
                            $("#city").append('<option>Select City</option>');
                            $.each(res, function (key, value) {
                                if (value.name !== undefined)
                                {
                                    $("#city").append('<option value="' + value.name + '">' + value.name + '</option>');
                                }
                            });
                        }
                    }

                });
            }
        });

    </script>
@endsection

@section('styles')
    <link href="{{ asset('css/pages/wizard/wizard-3.css') }}" rel="stylesheet" type="text/css">
@endsection
