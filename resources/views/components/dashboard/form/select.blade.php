@props([
     'name', 'label' => '' , 'options'
])


    @if($label !== '')
        <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    @endif
    <div>
        <select id="{{ $name }}"
                wire:model="{{$name}}"
                data-allow-clear="false"
            {{ $attributes->class([
                          'form-select',
                          'is-invalid' => $errors->has($name)
                         ])
           }}
        >
            <option value="">--- Select {{ $label }} ---</option>
            @foreach($options as $key => $value)
                <option value="{{ $key }}"
                        wire:key="category-{{$key}}"
                >
                    {{ $value }}
                </option>
            @endforeach
        </select>
        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
