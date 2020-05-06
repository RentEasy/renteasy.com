<div class="field">
    <label class="label" for="form{{ $key }}">{{ $label }}</label>
    <div class="control @error($key) has-icons-right @enderror">
        <div class="select is-fullwidth @error($key) is-danger @enderror">
            <select id="form{{ $key }}" name="{{ $key }}">
                <option @if(old($key) == null) selected @endif value="">Select One</option>
                @foreach($options as $k => $v)
                <option @if(old($key) == $k) selected @endif name="{{ $k }}">{{ $v }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @error($key)
    <p class="help is-danger">{{ $message }}</p>
    @enderror
</div>
