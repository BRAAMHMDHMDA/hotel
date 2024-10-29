@props([
     'name', 'label' => '' , 'options', 'oldValue'
])


    @if($label !== '')
        <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    @endif
    <div>
        <select id="{{ $name }}"
                wire:model.live="{{$name}}"
                data-allow-clear="false"
            {{ $attributes->class([
                          'form-select',
                          'is-invalid' => $errors->has($name)
                         ])
           }}
        >
            @empty($oldValue)
                <option value="">--- Select {{ $label }} ---</option>
            @endempty
            @foreach($options as $key => $value)
                <option value="{{ $key }}"
                        wire:key="category-{{$key}}"
                        @isset($oldValue)
                            @selected($key == $oldValue)
                        @endisset
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
