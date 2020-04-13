<label class="kt-radio">
    <input type="radio" name="{{ $name }}" value="{{ $value }}" @if(isset($required)) required @endif> {{ $value }}
    <span></span>
</label>
