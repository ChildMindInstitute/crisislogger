@extends('layout.authorized.app')
@section('title', 'My Recordings and Word Clouds')
@section('dashboard-active', 'kt-menu__item--active')
@section('content')

    <div class="container-fluid ">
        <div class="row">
            @component('components/flash-message')
            @endcomponent
        </div>
        <div class="row">
            <h4>Uploaded video and audio</h4>
            <div class="card col-lg-12">
                <div class="card-body">
                    <div class="row">
                        @if(count($uploads) > 0)

                            @foreach($uploads  as $upload)
                                <div class="col-sm-12 col-md-4 col-lg-3 mb-4 " style="box-shadow: 2px 1px 4px 4px #e0dbdb;">
                                    <div class="kt-portlet" >
                                        <div class="kt-portlet__head">
                                            <div class="kt-portlet__head-label">
                                                <h3 class="kt-portlet__head-title">
                                                    {{ $upload->created_at }}
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__body" >
                                            @if(Str::contains($upload->link, '.wav'))
                                                <audio controls src="{{ $upload->link }}"  style="width: 100%"></audio>
                                            @else
                                                @if(Str::contains($upload->link, '.mkv'))
                                                    <video controls type="video/mkv" src="{{ $upload->link }}"  >
                                                    </video>
                                                @elseif(Str::contains($upload->link, '.webm'))
                                                    <video controls type="video/webm" src="{{ $upload->link }}"  >
                                                    </video>
                                                @else
                                                    <video controls type="video/mp4" src="{{ $upload->link }}"  >
                                                    </video>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    @if(isset($upload->transcript->id))
                                        <div class="kt-portlet"  id="{{'transcript-'.$upload->id}}">
                                            @include('components.spinner')
                                        </div>
                                    @else
                                        <div class="kt-portlet " id="{{'transcript-'.$upload->id}}">
{{--                                            <p class="card-title text-center">No word cloud</p>--}}
                                        </div>
                                    @endif
                                    <div class="kt-portlet   remove-btn">
                                        <div class="form-group float-left mb-0">
                                            <input type="checkbox" class="form-check-input contribute-to-science"  value="{{$upload->contribute_to_science}}" {{$upload->contribute_to_science?'checked': ''}}  id="contribute-upload-{{$upload->id}}">
                                            <label class="form-check-label text-black" for="contribute-upload-{{$upload->id}}">Science?</label>
                                        </div>
                                        <div class="form-group float-left mb-0">
                                            <input type="checkbox" class="form-check-input contribute-to-science"  value="{{$upload->share}}"   {{$upload->share?'checked': ''}}  id="share-upload-{{$upload->id}}">
                                            <label class="form-check-label text-black" for="share-upload-{{$upload->id}}">Public?</label>
                                        </div>
                                        <a class="remove-resource"  style="    font-size: 13px;" href="#" id="upload-{{$upload->id}}" ><i class="fa fa-trash" style="margin-right: 10px;" ></i> Delete?</a>
                                    </div>
                                </div>
                            @endforeach
                        @else

                            <div class="text-center mt-5">
                                <h4>No uploads found.</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
        <br>
        <div class="row">
            <h4>Texts </h4>
            <div class="card col-lg-12">
                <div class="card-body">
                    @if(count($texts) > 0)
                        <div class="row">

                            @foreach($texts  as $text)
                                <div class="col-sm-12 col-md-4 col-lg-3 mb-4 " style="box-shadow: 2px 1px 4px 4px #e0dbdb;">
                                    <div class="kt-portlet text-content" id="text-content-{{$text->id}}">
                                        <p class="text-justify text-ellipsis">{{$text->text}}</p>
                                    </div>
                                    <div class="kt-portlet" style="display: inline-grid">
                                        <div class="form-group float-left mb-0">
                                            <input type="checkbox" class="form-check-input contribute-to-science"  value="{{$text->contribute_to_science}}"   {{$text->contribute_to_science?'checked': ''}}  id="contribute-text-{{$text->id}}">
                                            <label class="form-check-label text-black" for="contribute-text-{{$text->id}}">Science?</label>
                                        </div>
                                        <div class="form-group float-left mb-0">
                                            <input type="checkbox" class="form-check-input contribute-to-science"  value="{{$text->share}}"   {{$text->share?'checked': ''}}  id="share-text-{{$text->id}}">
                                            <label class="form-check-label text-black" for="share-text-{{$text->id}}">Public?</label>
                                        </div>
                                        <a class="remove-resource" href="#" id="text-{{$text->id}}"><i class="fa fa-trash" style="margin-right: 10px" ></i> Delete?</a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @else
                        <div class="text-center mt-5">
                            <h4>No uploads found.</h4>
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal fade" id="text-content-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .remove-btn {
        display: inline-grid;
    }
    a {
        font-size: 13px !important;
        color: #000000 !important;
    }
    input[type="checkbox"] {
        visibility: hidden;
    }
    label {
        cursor: pointer;
    }
    input[type="checkbox"] + label:before {
        border: 1px solid #0067a0;
        content: "\00a0";
        display: inline-block;
        font: 16px/1em sans-serif;
        height: 16px;
        margin-right: 10px;
        vertical-align: top;
        width: 16px;
    }
    input[type="checkbox"]:checked + label:before {
        background: #fff;
        color: #0067a0;
        content: "\2713";
        text-align: center;
    }
    input[type="checkbox"]:checked + label:after {
        font-weight: bold;
    }
    input[type="checkbox"]:focus + label::before {
        outline: rgb(59, 153, 252) auto 5px;
    }
</style>
@section('scripts')
    <script src="https://d3js.org/d3.v3.min.js"></script>
    <script src="https://rawgit.com/jasondavies/d3-cloud/master/build/d3.layout.cloud.js"></script>
    <script src="{{ asset('js/pages/word-clouds.js') }}?time={{ time() }}"></script>
@endsection
