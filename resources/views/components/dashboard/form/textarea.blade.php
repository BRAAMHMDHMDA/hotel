@props([
    'type' => 'text',
    'value' => '',
    'name',
    'label'
])


<label for="{{ $name }}" class="form-label">{{ $label }}</label>
<textarea id="{{ $name }}" placeholder="Enter {{$label}}"
       wire:model="{{$name}}"
    {{ $attributes->class([
                      'form-control',
                      'is-invalid' => $errors->has($name)
                     ])
    }}
>{{ old($name, $value) }}</textarea>

@error($name)
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror
