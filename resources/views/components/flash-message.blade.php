@if(session()->has('session_error'))
<div class="alert alert-danger alert-dismissible fade show"  style="width: 100%" role="alert">
    {{session()->get('session_error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(session()->has('session_success'))
    <div class="alert alert-success alert-dismissible fade show" style="width: 100%" role="alert">
        {{session()->get('session_success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
