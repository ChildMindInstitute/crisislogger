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

@yield('scripts')
<script src="{{ asset('plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    $(function() {
        $('.transcript-toggle').bootstrapToggle({
            on: 'Published',
            off: 'Unpublished'
        });
    })
</script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</body>
