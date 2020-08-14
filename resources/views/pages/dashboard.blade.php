@extends('layout.authorized.app')
@section('title', 'My Recordings and Word Clouds')
@section('dashboard-active', 'kt-menu__item--active')
@section('content')

    <div class="container" id="dashboard">
        <div class="row" style="margin-top: 100px;">
            @component('components/flash-message')
            @endcomponent
        </div>
        <div class="row" style="margin-top: 100px;">
            <h4>My recordings</h4>
        </div>
        <br>
        <div class="row">
            @if(count($uploads) > 0)
                @foreach($uploads  as $upload)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 mb-5"  style="height: max-content;">
                        <div class="gallery-box">
                            @if($upload->status === 'processing')
                                @if(Str::contains($upload->link, '.wav'))
                                    <p style="color: #0abb87; font-size: 14px; text-align: center">
                                        Audio conversion is in progress.
                                    </p>
                                @else
                                    <p style="color: #0abb87; font-size: 14px; text-align: center">
                                        Video conversion is in progress.
                                    </p>
                                @endif
                            @endif
                            @if(isset($upload->transcript->id))
                                <div id="{{'transcript-'.$upload->id}}">
                                    @include('components.spinner')
                                    <div class="video-box">

                                    </div>
                                    <div class="show-more-cloud d-none">
                                        <p style="font-size: 14px;flex: 1; cursor: pointer; color: rgb(110, 110, 110); font-family: sans-serif;cursor: pointer"

                                        >show more</p>
                                        <span style="flex: 1; text-align: right; color: rgb(110, 110, 110); cursor: pointer"
                                        ><i class="fa fa-cloud"></i>
                                        </span>
                                    </div>
                                </div>
                            @else
                                @if($upload->published)
                                <div id="{{'transcript-'.$upload->id}}">
                                    {{--                                            <p class="card-title text-center">No word cloud</p>--}}
                                </div>
                                @endif
                            @endif
                            @if(Str::contains($upload->link, '.wav'))
                                <audio controls src="{{ $upload->link }}" style="width: 100%"></audio>
                            @else
                                @if(Str::contains($upload->link, '.mkv'))
                                    <video controls type="video/mkv" src="{{ $upload->link }}">
                                    </video>
                                @elseif(Str::contains($upload->link, '.webm'))
                                    <video controls type="video/webm" src="{{ $upload->link }}">
                                    </video>
                                @else
                                    <video controls type="video/mp4" src="{{ $upload->link }}">
                                    </video>
                                @endif
                            @endif
                            <div class="remove-btn">
                                <div class="form-group float-left mb-0" style="flex: 1">
                                    <input type="checkbox" class="form-check-input contribute-to-science"
                                           value="{{$upload->contribute_to_science}}"
                                           {{$upload->contribute_to_science?'checked': ''}}  id="contribute-upload-{{$upload->id}}">
                                    <label class="form-check-label text-black" for="contribute-upload-{{$upload->id}}">Science</label>
                                </div>
                                <div class="form-group float-left mb-0" style="flex: 1">
                                    <input type="checkbox" class="form-check-input contribute-to-science"
                                           value="{{$upload->share}}"
                                           {{$upload->share?'checked': ''}}  id="share-upload-{{$upload->id}}">
                                    <label class="form-check-label text-black"
                                           for="share-upload-{{$upload->id}}">Public</label>
                                </div>
                                <a class="remove-resource" style=" font-size: 13px !important;flex: 1" href="#"
                                   id="upload-{{$upload->id}}"><i class="fa fa-trash" style="margin-right: 10px;"></i>
                                    Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center mt-5 no-data-box">
                    <h4>No uploads found.</h4>
                </div>
            @endif
        </div>
        <br>
        <br>
        <div class="row">
            <h4>Texts </h4>
        </div>
        <br>
        <div class="row">
            @if(count($texts) > 0)
                @foreach($texts  as $text)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 mb-5" >
                        <div class="text-box ">
                            <div class="text-content" id="text-content-{{$text->id}}">
                                <p class="text-justify text-ellipsis">{{$text->text}}</p>
                            </div>
                            <div class="remove-btn">
                                <div class="form-group float-left mb-0" style="flex: 1">
                                    <input type="checkbox" class="form-check-input contribute-to-science"
                                           value="{{$text->contribute_to_science}}"
                                           {{$text->contribute_to_science?'checked': ''}}  id="contribute-text-{{$text->id}}">
                                    <label class="form-check-label text-black" for="contribute-text-{{$text->id}}">Science</label>
                                </div>
                                <div class="form-group float-left mb-0" style="flex: 1">
                                    <input type="checkbox" class="form-check-input contribute-to-science"
                                           value="{{$text->share}}"
                                           {{$text->share?'checked': ''}}  id="share-text-{{$text->id}}">
                                    <label class="form-check-label text-black"
                                           for="share-text-{{$text->id}}">Public</label>
                                </div>
                                <a class="remove-resource" style=" font-size: 13px !important; flex: 1" id="text-{{$text->id}}"><i
                                        class="fa fa-trash"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center mt-5 no-data-box">
                    <h4>No texts found.</h4>
                </div>
            @endif
        </div>
        <div class="modal fade" id="text-content-modal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>
@endsection
<style>
    .remove-btn {
        display: flex;
        margin-bottom: 5px;
        text-align: center;
    }
    .container {
        width: 100% !important;
        padding-right: 10px;
        padding-left: 10px;
        margin-right: auto;
        margin-left: auto;
    }
    @media (max-width: 992px) {
        .container {
            max-width: 100% !important;
            padding: unset !important;
        }
    }
    @media (max-width: 768px) {
        .container {
            max-width: 100% !important;
            padding: unset !important;
        }
    }
    .no-data-box{
        width: 100%;
        padding: 15px;
        background: white;
    }
    .show-more-cloud{
        display: flex;
    }
    .text-box{
        background: #ffffff;
        margin: 0 auto;
    }
    .gallery-box video {
        margin-bottom: 20px;
        width: 100%;
        border-radius: 10px;
        max-height: 180px;
        min-height: 180px;
    }
    .gallery-box audio {
        margin-bottom: 20px;
    }
    .text-content{
        margin-bottom: 20px;
    }
    .gallery-box {
        border-radius: 14px;
        overflow: hidden;
        padding:  10px;
        background-color: rgb(250, 250, 250);
        box-shadow: rgba(0, 0, 0, 0.35) 0px 0px 1px 0px;
    }

    a {
        font-size: 13px !important;
        color: #000000 !important;
    }

    input[type="checkbox"] {
        visibility: hidden;
    }
    #dashboard p {
        font-size: 18px !important;
    }
    .video-box {
        height: 200px;
        overflow: hidden;
        overflow-y: scroll;
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
