@props(['name', 'label', 'options', 'checked' => false])

@foreach ($options as $value => $label)
    <div class="form-check">
        <input type="radio" name="{{ $name }}" value="{{ $value }}" class="form-check-input"
            @checked(old($name, $checked) == $value)
            {{ $attributes->class(['form-check-input', 'is-invalid' => $errors->has($name)]) }}>
        <label class="form-check-label">{{ $label }}</label>
    </div>
@endforeach
