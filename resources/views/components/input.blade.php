@php
    $label ??= ucfirst($name);
    $type ??= 'text';
    $class ??= 'col';
    $name ??= '';
    $value ??= null;
@endphp

<div @class(['form-group', $class])>
    @if ($label)
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @endif

    @if ($type === 'textarea')
        <textarea 
            class="form-control @error($name) is-invalid @enderror" 
            id="{{ $name }}"
            name="{{ $name }}"
        >{{ old($name, $value->$name ?? '') }}</textarea>
        
    @else
        <input 
            type="{{ $type }}" 
            class="form-control @error($name) is-invalid @enderror" 
            id="{{ $name }}" 
            name="{{ $name }}" 
            value="{{ old($name, $value->$name ?? '') }}"
        >  
    @endif

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>