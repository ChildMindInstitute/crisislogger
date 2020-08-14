@extends('layout.admin', ['columns' => ['ID', 'Date', 'Upload', 'Text', 'User Name', 'Email Address', 'Domain']])
@section('styles')
<style>
input { display: inline-block; height:16px; width: 80px; margin: 8px 10px 0 0}
.rank { display: inline-block; height:16px; width: 20px; margin: 0}
button { width:30px; height: 30px; background-repeat: no-repeat; background-position: center; }
.hide1 > td { background-color: #fee }
.hide1 button { background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAIAAABvFaqvAAAFF0lEQVR4nG2V2W/UVRTHz11+6yydtpQWkEFgpLRARKOxCQKCaNwiYqJv/gXqk4o+mPDokhh9M1Fj3GJioomCBpLG8OASoIWCJZSmAbFKZ7pMZ/2t995zfBglVPy83OQm309uvsk5lxERrKRz02q1qtUqY8wYg4hEpJSSUhaLRdu2OeeMMURkjDHGAIDdKqpUKkEQ9PT05HI5ABBCEJHSShtDWs9em42SZHB4yPd9IOKMdVIrRHEcl8vl3t6+fD6rNQrBEYmIEBEBY5n6CdkJTxg/de1yoa93a/9aR8j/ipIkqVQqAwMDjuMQASJxzozBGyLFFCAwwxDBoPn9ytW849yxbagT551DKTU3N1csFqWUiNSxaG3wX8iQlXJNrCUxEZqlyY5NpTiOL1y8uEI0NzfX39+vtSaiTn9aGwD4x0JESFJxO2WW1oolTV+VeTtbuq3cbswvLgIA11ovLCzkcjnf9zv9I1In/I/iXwwwGSs7iQMKj1478/qJj05cGd80vOXM2BkiklLKRqNRKpWUUkIIrTXnnG4BiWJjhE11O/7ywvFPJkYdv/v6ybndG4azmUy5XJZBEORyOUS0LMsYI4S4UfDNj0IkJUXZST89d/zj80eh18VW3eZ9C+W/tm4dnDz/mwzaQSaTQQ4ppciQAQBwhgAIQEQIRGTIKEYNoT/85dvPrv7Y7rd9bTJtc3DXvvpi9Xpsa61l0grz/d1/UPP45MlGWD1w9/1Fa2NBSyshZBxRg2Ch1BU3fuenL07+ORF6lA3c25vuc9sPbEnWemBHQVytViUZQ8BPzUx8fW409tXo/MQrB17cLzdI4suOQC6sVjsU4ZvHPv65clYW8l7AVyXOE9sfLGWKPGDcEpYApRQnIgJEhk1Iy46athpvHH3vdP1izU8aLGxAVPGCt7//4Nel85AF1WisDp1ntj20M7vZCS3LshOhuWAAwAkAdXrfph2D/euZMsRhiS29Ovr+d7WJ2Enn9eJrP7z/fXsy8hPQSS6GQ9sf2CHXdzXtDHlcSGYzbVAIIV4+fNiR0pbiztK2yzMXw1azzeO2z8emJn3P+3z069Ptq2EvJ9Q9Lfno0O57u4f6k1wWXS45SWKSJPBmo8EWl2vt5eXibQPzqj7PkyNfvXspv1wPWq7lJGHKgXPbClUkEnh23cj+jfd01a2syXBuGQlckGBoWWJmZoZnC/ml5QYlYrVY1W2yLz39wppWLsf8gKI0o1I3brXqq9PcwbW7Hlm3p1Bz8+SChZGnEscAgKPF9OXpkZERjgBdfasWqrU41g54a9zVRw49nxddCsBLlRMpz8sM9ZUODdxXaHndlJMgUJK20AhkAMKwKIyKxSIjIiI4ferU4OBWQ4iCRxaMVaff+uaDpghB486BLU8N7lkTeIIsSwrP94GBYZAmMUOYmZ7ed2DvunVrOyJqNpuTk5PDw8Op0pqLhpNeWLpy7JcTnuXsHbx3VeB0a5dZkguRzWbTNO2MzuzsrO+7jzz60IrFVqvVzp49u3PnXUbzNkaxo2OeVhcW40qjl3e5aBmbAWeO4xhjXNe9dOmS7/uPPf7w/6zaarU6NjZeKm3L5DyFKTCTRHFtsU4JSpDGAsaZMcZxnPHx8VJp8779e25kV4iMMUhw5tyF5aXq5ts3ZDyXM5Yq0w5CpTUDk6TJ1NQU5/zgwSd7erpv/jJWiBCRADQwNDgzNbUwvxRFETKK0gQRfVu6jjMyMlIoFOAW/gb3SlNSz7DgPgAAAABJRU5ErkJggg=='); }
.hide0 > td { background-color: #efe }
.hide0 button { background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAIAAABvFaqvAAAFaUlEQVR4nF2VyY9cVxXGzz333jfUq6G7uqq7yy4PbUe2DLYRllCUlS3LoCgKoUmMN0aRN5H/Dq9ZgFiwQEhkQwzBkQcwZmVBQBDLETa4A4pj4+qxpq7q4dWb7nRYxCSG3/58Ot/m9zEighdwzgFAnufj8bgoCiKy1gIA5zxN05mZmUajIaVERPhf2BdBBI5ZKibx1mYfPL82Myc93zFyHIlIGCuBDYe9lcF6LagdPvAS8wXg54fggL4MUsak27HOtuvNGvpRoUTAmQOdITPEhCWpnWPGSBisDeLezsGjC7X61PMeX35kYaU34pE3PVUil3kYWBCe0WgyB5ghVygsAdeOFyZnhpf8j//051MnTjZnZ1+o5mDU3WKloFzxkRSmOwylkWWGDsGAxRwxYUBAU5nzekkRsbSCTrulv/395VdeCUol4IxZa+MkNgTTpSom+eaHf3z0+9/IqPSN71+EhcOqHKECsgpJh4xWf3mjf/sPtlr96jtv8/Z87ou/Pnjw6rlvcgQkos1kiyIApmE4WPn19WO9rYPP1v75wx/RyrqJjdNG5sqfpP2r17avfXBg9enMp0+Wf3U7zLVGahw6sPTvJ84RxnFc9aIAA0sAocx1WnauPsn37Gb3f/Bj+dmzcrzlg+7fuLX9wZ32OImcRm52JuNhbz1zeqo+3XnyDIHxy5cvt5ot6WTBGY9klcPg0aOKBSqoVtjB/Y+mDs2PP/7o6fu39gxTL9eTSKzPVva+fq6Degeh5lfZVlKJyqzT6bT37gPDiLGCaQ7Z+ObtwS9u7tvRHFWKSguZFSqyLCpgQthrVuYufHvYrKogVNJr1OckYRzHAgAK4TiCnwvH5FhC4/xbaNjw3ffntQmsCwozrYgDbVrV3dNqnf9evzmd+eAjDwHjeIdH4eZkB40xwjrNXOo7IGoYkU8m86+daV/8burAy6lwzBlhcmZarb1vvrrRqEzCwHq+8QKHPmdCJ4VKM3TOcefQ2ZxbjRbyPLBADnbTJCfnKVNLDCpSUkzSLCTkPhqPMeET94hLchgyDwnQWkvG+gZYUWTCFNJ4Fjfe+93azbtlS6A1gYuFUjbdN5ps/PRquzecLrIKoLOOSekc48B8LtAYw5jghKF21iScio1rt7Krd14aFU6ZbuR1a0ER+iExmezOJ7ubP3n3eGdzJsmmJTqyIHia5JVSGYnIWKuUctbUNS1fv9O/9tv5NIt0mgvv2WwruHRBnXm5yxkg8/K0NRov/eznzdFWKY0BFHjYWV0+cvQIttvtlZXVTIANOO90R+/dObCrkKtdPxs1p+YWL3Tm9tpvneWvndkQiJryLPbTycPrN5qCA+nU5AZcY25W1Gq1p58+qaimk64SRionzYMBN+NWNPvmG916w4VBn4pD587KoNS/+yGMRkPHRFRPJsqvBmvDja987RiR41euXCmHpd6gLzy/XKmWo6nO8sZkvlF5/ey4OWO8wEkB0kM/bCwcZNOVrSLdrjeOfuctFZVSssPt0enTp6UUzFoLxj7+7DF4vF2tB5kTO+lqd3mZJdYPJZSc9B3HcuCVnGoyA1tDg6VdUVKc3b3/l4uXLk1Vq/iF2Ijc408+AQeN1rwhiIu0O+jrJIswAO45xplAQOtJp/JYcM9qdu/evcXFxf379/+/s4Fg6dE/VrbH7WNHS8Ln28Vmf0OR4szjKIgYk3yiEhGJ9dXVneHo/BuLM1PTwBgAOHrB2Z8ziHfvPXho4uxU+4gsy/VkZHLtM8kZGm3Wet31fvfkqZNfP3E8CsP/Lg8AA0ZEBiwCQ3i+MNZYq+2/Hi4Nt0exzosi5wCMUHJ54vjxhcMLjhwiY4jAnlcBgP8Ah/s0YEfQ/dMAAAAASUVORK5CYII='); }
.hide1 input, .hide1 .rank { display:none;}
.show > .btn.btn-default, .btn.btn-default.active, .btn.btn-default:active, .btn.btn-default:hover {
    color: #ffffff;
    background: #c2c3ca;
    border-color: #c1c6e0;
}
.btn.btn-default {
    background: #efefef;
    color: #74788d;
    border: 1px solid #e8ecfa;
}
</style>

@endsection
@section('scripts')
<script>

function toggleHide(e, id, type) {
    var tr = e.parentNode.parentNode;
    var h = tr.classList.contains("hide1")? 1: 0;
    var h2 = (h+1)%2;

    axios.post('{{ route('admin-hide') }}', { id: id, hide: h2 , type: type})
        .then(() => {
            tr.classList.remove('hide'+h);
            tr.classList.add('hide'+h2);
        })
        .catch(error => {
            alert(error);
            console.log(error);
        })
}
function toggleTranscript(e, id) {
    axios.post('{{ route('toggle-transcript') }}', { id: id, status: e.checked})
        .then(() => {
        })
        .catch(error => {
            alert(error);
            console.log(error);
        })
}
function setRank(e, id, type, transcript = false) {
    axios.post('{{ route('admin-rank') }}', { id: id, rank: e.value, type: type, transcript: transcript })
        .then(() => {
            if (transcript)
            {
                document.getElementById(id+'-trans-rate').innerText = e.value == 1? "top": e.value;
                console.log(document.getElementById(id+'-trans-rate'))
                return;
            }

            e.nextSibling.innerHTML = e.value == 1? "top": e.value;
        })
        .catch(error => {
            alert(error);
            console.log(error);
        })
}
</script>
@endsection
@section('content')
@foreach ($report as $row)
    @if(is_null($row->hide))
        @php
            $row->hide = 1;
        @endphp
    @endif
    <tr class="hide{{$row->hide}}">
        <td>
@if($row->hide === 1 || $row->hide === 0 || $row->hide=== null)
    <button onclick="toggleHide(this, {{ $row->id }}, '{{$type}}')"></button>&nbsp;{{ $row->id }}<br>
    <input type="range" min="1" max="100" value="{{ $row->rank }}" onchange="setRank(this, {{ $row->id }}, '{{$type}}')" ><span class="rank">{{ $row->rank }}</span>
@else
    {{ $row->id }}
@endif
    </td>
    <td>{{ $row->created_at }}</td>
        <td>
        @if($row->share === 1)
            {{ $row->name }}<br/>
            @if($type=='audio')
            <audio controls preload="auto" src="https://storage.googleapis.com/{{ config('app.google_cloud_buck')}}/{{ $row->name }}"></audio>
            @elseif($type=='video')
            <video controls preload="auto"><source src="https://storage.googleapis.com/{{ config('app.google_cloud_buck')}}/{{ $row->name }}"></video>
            @endif
        @endif
    </td>
    <td>
        @if($row->share  > 0)
        {{ $row->text }}
            <br>
            @if($type !=='text')
                <input type="checkbox" class="transcript-toggle" {{$row->published? 'checked': ''}}
                onchange="toggleTranscript(this, {{ $row->id }})" data-toggle="toggle">
                <input type="range" min="1" max="100" value="{{ $row->textRank }}" onchange="setRank(this, {{ $row->id }}, '{{$type}}', true)" >
                <span id="{{$row->id.'-trans-rate'}}" class="rank">{{ $row->textRank }}</span>
            @endif
        @endif
    </td>
    <td>
        @if($row->user_name)
        {{$row->user_name}}
        @endif
    </td>
    <td>
        @if($row->user_email)
            {{ $row->user_email}}
        @endif
    </td>
    <td>
        @if($row->where_from)
            {{ $row->where_from}}
        @endif
    </td>
</tr>
@endforeach
<form method="POST" name="hide" action="{{ route('admin-hide') }}">
    @csrf
</form>
@endsection
