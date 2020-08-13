@extends('layout.admin', ['columns' => ['Date', 'Video', 'Audio', 'Text']])
<style>
label { margin:4px; padding: 2px; width:15%; text-align:right; float:left; }
textarea, input[name='search-text'], input[name='referral-code'] { margin:4px !important; padding: 2px; width:80%; height: 50px; float:left; }
input { float:left; width: 6em; margin:4px !important; padding: 2px 4px; }
.delim { margin:4px; padding: 2px; float:left; }
table td, table th {
    text-align: center;
}
p {
    font-size: 14px !important;
}
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
<label for="query">Query used to collect the below data</label>
<textarea  readonly name="query" placeholder="Used SQL query">{{ $query }}</textarea>
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
    <p><span style="color: green">--- </span> : Public and approved status by admin</p>
    <p><span style="color: red">--- </span> : Public and rejected status by admin</p>
    <p><span style="color: grey">--- </span> : Private by user</p>
    <div class="card-body">
        <a class="btn btn-primary float-right" style="font-size: 18px !important;" href="{{route('admin-export')}}">Export Data</a>
    </div>
    <?php $totalVideoPublished = $totalAudioPublished  = $textPublished = 0;?>
    @foreach ($result as $date =>  $row)
        <?php
            $totalVideoPublished += isset($row['video']['published'])? count($row['video']['published']): 0;
            $totalAudioPublished += isset($row['audio']['published'])? count($row['audio']['published']): 0;
            $textPublished += isset($row['txt']['published'])? count($row['txt']['published']): 0;
        ?>
    <tr>
        <td>{{ $date }}</td>
            <td>
                @if(isset($row['video']))
                <a style="color: green" href="{{ isset($row['video']['published'])?route('admin-video').'?'.join('|', $row['video']['published']): '#'}}">{{isset($row['video']['published'])? count($row['video']['published']): 0}}</a>
                <a  style="color: red" href="{{ isset($row['video']['rejected'])?route('admin-video').'?'.join('|', $row['video']['rejected']): '#' }}">{{isset($row['video']['rejected'])? count($row['video']['rejected']): 0}}</a>
                (<a style="color: grey" href="{{ isset($row['video']['private'])?route('admin-video').'?'.join('|', $row['video']['private']): '#' }}">{{isset($row['video']['private'])? count($row['video']['private']): 0}}</a>)
                @endif
            </td>

            <td>
                @if(isset($row['audio']))
                <a style="color: green" href="{{ isset($row['audio']['published'])?route('admin-audio').'?'.join('|', $row['audio']['published']): '#' }}" >{{isset($row['audio']['published'])? count($row['audio']['published']): 0}}</a>
                <a style="color: red" href="{{ isset($row['audio']['rejected'])?route('admin-audio').'?'.join('|', $row['audio']['rejected']): '#' }}">{{isset($row['audio']['rejected'])? count($row['audio']['rejected']): 0}}</a>
                (<a style="color: grey" href="{{ isset($row['audio']['private'])?route('admin-audio').'?'.join('|', $row['audio']['private']): '#' }}">{{isset($row['audio']['private'])? count($row['audio']['private']): 0}}</a>)
                @endif
            </td>
            <td>
                @if(isset($row['txt']))
                <a style="color: green" href="{{ isset($row['txt']['published'])? route('admin-text').'?'.join('|', $row['txt']['published']): '#' }}">{{isset($row['txt']['published'])? count($row['txt']['published']): 0}}</a>
                <a style="color: red" href="{{ isset($row['txt']['rejected'])? route('admin-text').'?'.join('|', $row['txt']['rejected']): '#' }}">{{isset($row['txt']['rejected'])? count($row['txt']['rejected']): 0}}</a>
                (<a style="color: grey" href="{{ isset($row['txt']['private'])? route('admin-text').'?'.join('|', $row['txt']['private']): '#' }}">{{isset($row['txt']['private'])? count($row['txt']['private']): 0}}</a>)
                @endif
            </td>

    </tr>
@endforeach
    <p>Total published video : {{$totalVideoPublished}}, Total published audio: {{$totalAudioPublished}}, Total published text: {{$textPublished}}</p>
@endsection
