@props([
    'type' => 'text',
    'value' => '',
    'name',
    'label'
])


<label for="{{ $name }}" class="form-label">{{ $label }}</label>
<input type="{{$type}}" id="{{ $name }}" placeholder="Enter {{$label}}"
        wire:model="{{$name}}" value="{{ old($name, $value) }}"
        {{ $attributes->class([
                          'form-control',
                          'is-invalid' => $errors->has($name)
                         ])
        }}
/>

@error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
