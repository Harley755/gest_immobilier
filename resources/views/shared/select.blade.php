@php
    $label ??= ucfirst($name);
    $name ??= '';
    $class ??= 'col';
    $value ??= null;
@endphp

<div @class(['', $class])>
    @if ($label)
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @endif


    <select 
        class="form-select @error($name) is-invalid @enderror" 
        id="{{ $name }}" 
        name="{{ $name }}[]"
        multiple
    >
        @forelse ($options as $k => $v)
             <option 
                value="{{ $k }}"
                @selected($value->contains($k))
            >
                {{ $v ?? '' }}
            </option>
        @empty
             <option 
                value=""
            >
                Aucun élément
            </option>
        @endforelse
    </select>
        
    

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>