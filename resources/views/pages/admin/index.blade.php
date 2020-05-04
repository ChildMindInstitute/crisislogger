@php
// TODO? introduce roles
if ( Auth::user()->email != env('APP_ADMIN') ) abort(404);
@endphp

@include('layout.head')
<style>
th, td {background-color: #fff; padding:4px 8px; border:2px solid #eee}
</style>
<body style="margin: 20px">
@php
$report = DB::select( DB::raw("select d, sum(type not in ('txt', 'wav')) video, sum(type='wav') audio, sum(type='txt') text from ( select date(created_at) d, SUBSTRING_INDEX(name, '.', -1)  type from uploads  union all select date(created_at) d, 'txt' from text ) t group by d desc") );
@endphp
<table>
    <tr><th>Date</th><th>Video</th><th>Audio</th><th>Text</th></tr>
@foreach ($report as $row)
    <tr><td>{{ $row->d }}</td><td>{{ $row->video }}</td><td>{{ $row->audio }}</td><td>{{ $row->text }}</td></tr>
@endforeach
</table>
</body>
