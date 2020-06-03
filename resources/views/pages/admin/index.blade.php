@extends('layout.admin', ['columns' => ['Date', 'Video', 'Audio', 'Text']])
<style>
label { margin:4px; padding: 2px; width:15%; text-align:right; float:left; }
textarea, input[name='search-text'], input[name='referral-code'] { margin:4px !important; padding: 2px; width:80%; height: 50px; float:left; }
input { float:left; width: 6em; margin:4px !important; padding: 2px 4px; }
.delim { margin:4px; padding: 2px; float:left; }
</style>

@section('content-pre')
<form method="get" action="{{ route('admin-index') }}">
<label for="in">Include Users</label>
    <textarea name="in" placeholder="Where condition for users.&#10;Include All, if empty">{{ $users_include }}</textarea>
<label for="ex">Exclude Users</label>
    <textarea name="ex" placeholder="Where condition for users.&#10;Exclude None, if empty">{{ $users_exclude }}</textarea>
<label for="search-text">Search text</label>
<input name="search-text" placeholder="Search text here" value="{{$searchText}}">
<br/>
<br/>
<label for="referral-code">Search text</label>
<input name="referral-code" placeholder="Referral code here" value="{{$referral_code}}">
<br/>
<br/>
<label for="from">Date Range</label>
    <input name="from" placeholder="2020-01-01" value="{{ $date_from }}">
    <span class="delim"> - </span>
    <input name="till" placeholder="2100-12-31" value="{{ $date_till }}">
<input type="submit" style="float:right" value="Apply"/>
</form>
@endsection
@section('content')
@foreach ($report as $row)
    <tr><td>{{ $row->d }}</td>
        <td>@if($row->video)<a href="{{ route('admin-video') }}?{{ $row->video }}">{{ count(explode('|', $row->video)) }}</a>@else 0 @endif</td>
        <td>@if($row->audio > 0)<a href="{{ route('admin-audio') }}?{{ $row->audio }}">{{ count(explode('|', $row->audio)) }}</a>@else 0 @endif</td>
        <td>@if($row->text > 0)<a href="{{ route('admin-text') }}?{{ $row->text }}">{{ count(explode('|', $row->text)) }}</a>@else 0 @endif</td>
    </tr>
@endforeach
@endsection
