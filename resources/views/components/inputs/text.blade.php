<div class="field">
    <label class="label" for="form{{ $key }}">{{ $label }}</label>
    <div class="control has-icons-right">
        <input id="form{{ $key }}" name="{{ $key }}" type="text" value="{{ old($key) }}" class="input @error($key) is-danger @enderror">
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
