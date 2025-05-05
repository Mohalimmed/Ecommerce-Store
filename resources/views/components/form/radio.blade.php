@props(['name', 'label', 'options', 'checked' => false])
@if ($label)
    <label for="" class="form-label fw-bold">{{ $label }}</label>
@endif

@foreach ($options as $value => $text)
    <div class="form-check">
        <input type="radio" name="{{ $name }}" value="{{ $value }}" class="form-check-input"
            @checked(old($name, $checked) == $value)
            {{ $attributes->class(['form-check-input', 'is-invalid' => $errors->has($name)]) }}>
        <label class="form-check-label">{{ $text }}</label>
    </div>
@endforeach
@error($name)
    <div class="text-danger">{{ $message }}</div>
@enderror
