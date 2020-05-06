@extends('layout.admin', ['columns' => ['Date', 'Video', 'Audio', 'Text']])
@section('content')
@foreach ($report as $row)
    <tr><td>{{ $row->d }}</td>
		<td>@if($row->video > 0)<a href="{{ route('admin-video') }}?date={{ $row->d }}">{{ $row->video }}</a>@else 0 @endif</td>
		<td>@if($row->audio > 0)<a href="{{ route('admin-audio') }}?date={{ $row->d }}">{{ $row->audio }}</a>@else 0 @endif</td>
		<td>@if($row->text > 0)<a href="{{ route('admin-text') }}?date={{ $row->d }}">{{ $row->text }}</a>@else 0 @endif</td>
	</tr>
@endforeach
@endsection
