<div class="field">
    <label class="label" for="form{{ $key }}">{{ $label }}</label>
    <div class="control @error($key) has-icons-right @enderror">
        <input id="form{{ $key }}" name="{{ $key }}" type="number" min="0" step="0.01" data-number-to-fixed="2"
               data-number-stepfactor="100" value="{{ str_replace(",", "", $value) }}" class="input @error($key) is-danger @enderror">
        @error($key)
        <span class="icon is-small is-right">
          <i class="fa fa-exclamation-triangle"></i>
        </span>
        @enderror
    </div>
    @error($key)
    <p class="help is-danger">{{ $message }}</p>
    @enderror
</div>
