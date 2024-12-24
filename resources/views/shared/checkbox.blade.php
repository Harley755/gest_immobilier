@php
    $label ??= ucfirst($name);
    $type ??= 'text';
    $class ??= 'col';
    $name ??= '';
    $value ??= null;
@endphp


<div @class(['form-check form-switch', $class])>
    <label for="{{ $label }}" class="form-check-label">{{ $label }}</label>

    <input 
        type="hidden" 
        name="{{ $name }}" 
        value="0"
    >
    <input 
        type="checkbox" 
        class="form-check-input @error($name) is-invalid @enderror" 
        role="switch"
        id="{{ $name }}" 
        name="{{ $name }}" 
        value="1"
        @checked(old($name, $value->$name ?? false))
    >

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>