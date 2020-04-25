<div class="form-group">
    <label for="form{{ $key }}">{{ $label }}</label>
    <input name="{{ $key }}" type="number" min="0" step="0.01" data-number-to-fixed="2"
           data-number-stepfactor="100" class="form-control @error($key) is-invalid @enderror"
           id="form{{$key}}" value="{{ old($key) }}">
    @error($key)
    <small class="form-text text-error">{{ $message }}</small>
    @enderror
</div>
