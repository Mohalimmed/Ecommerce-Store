@props(['name', 'label' => false, 'value' => ''])
@if ($label)
    <label for="" class="form-label fw-bold">{{ $label }}</label>
@endif
<textarea name="{{ $name }}" {{ $attributes }}> {{ old($name, $value) }}</textarea>
@error($name)
    <div class="text-danger">{{ $message }}</div>
@enderror
