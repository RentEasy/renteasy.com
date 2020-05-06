<div class="field">
    <label class="label" for="form{{ $key }}">{{ $label }}</label>
    <div class="control is-expanded has-icons-right">
        <input id="form{{ $key }}" name="{{ $key }}" type="text" value="{{ $value }}" class="input @error($key) is-danger @enderror">
        @error($key)
        <span class="icon is-small is-right">
          <i class="fas fa-exclamation-triangle"></i>
        </span>
        @enderror
    </div>
    @error($key)
    <p class="help is-danger">{{ $message }}</p>
    @enderror
</div>
