<label>{{ $label }}</label>
<select class="form-control" name="{{ $name }}">
  	@foreach($options as $value => $label)
        <option {{ $isSelected($value) ? 'selected="selected"' : '' }} value="{{ $value }}">{{ trans($label) }}</option>
    @endforeach
</select>
