<div class="form-group">
    <label for="form{{ $key }}">{{ $label }}</label>
    <input name="{{ $key }}" type="text" class="form-control @error($key) is-invalid @enderror"
           id="form{{$key}}" value="{{ old($key) }}">
    @error($key)
    <small class="form-text text-error">{{ $message }}</small>
    @enderror
</div>
