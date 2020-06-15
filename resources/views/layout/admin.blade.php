@include('layout.root.head')
<style>
th, td {vertical-align:top; background-color: #fff; padding:4px 8px; border:2px solid #eee}
</style>
@yield('styles')
<body style="margin: 20px">
@yield('content-pre')
<table>
    <tr>
@foreach ($columns as $col)
        <th>{{ $col }}</th>
@endforeach
    </tr>
    @yield('content')
</table>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@yield('scripts')
</body>
