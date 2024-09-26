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
            @foreach($options as $option)
                <option value="{{ $option->id }}"
                        wire:key="category-{{$option->id}}"
                >
                    {{ $option->name }}
                </option>
            @endforeach
        </select>
        @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
