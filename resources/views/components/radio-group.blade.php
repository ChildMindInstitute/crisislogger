<div>
    @if(isset($value))
        <label>{{ $value }}</label>
    @endif
    <div class="kt-radio-inline">
        <label class="kt-radio">
            <input type="radio" name="{{ $name }}" value="Yes" @if(isset($required)) required @endif> Yes
            <span></span>
        </label>
        <label class="kt-radio">
            <input type="radio" name="{{ $name }}" value="No" @if(isset($required)) required @endif> No
            <span></span>
        </label>
    </div>
</div>
