<div class="field">
    <label class="label" for="form{{ $key }}">{{ $label }}</label>
    <div class="control has-icons-right">
        <input id="form{{ $key }}" name="{{ $key }}" type="number" min="0" step="0.01" data-number-to-fixed="2"
               data-number-stepfactor="100" value="{{ old($key) }}" class="input @error($key) is-danger @enderror">
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
