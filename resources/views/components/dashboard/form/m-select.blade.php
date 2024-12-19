@props([
    'label',
    'name',
    'value' => '',
    'hint',
    'placeholder' => 'Select an Options',
    'options',
])

@if(isset($label))
    <label class="{{ $attributes->has('required') ? 'required' : '' }} form-label" for="{{$name}}">
        {{$label}}
    </label>
@endif

<select
        id="{{$name}}" name="{{$name}}[]"
        wire:model="{{$name}}"
        data-control="select2" data-placeholder="{{$placeholder}}"
        data-allow-clear="true" multiple="multiple"
        {{ $attributes->class([
                       'form-select form-select',
                       'is-invalid' => $errors->has($name)
                      ])
        }}
>
    @foreach($options as $option)
        <option
                value="{{$option->id}}"
                @selected(in_array($option->id, old($name, $value)))
        >
            {{__("$option->name")}}
        </option>
    @endforeach
</select>

@if(isset($hint))
    <div class="text-muted fs-7">{{$hint}}</div>
@endif

@error($name)
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror


{{--@props([--}}
{{--     'name', 'label' => '' , 'options', 'oldValue'--}}
{{--])--}}


{{--@if($label !== '')--}}
{{--    <label class="form-label" for="{{ $name }}">{{ $label }}</label>--}}
{{--@endif--}}

{{--<div>--}}
{{--    <select--}}
{{--            id="{{ $name }}"--}}
{{--            data-placeholder="Choose {{ $label }}"--}}
{{--            wire:model.live="{{$name}}" multiple--}}
{{--            {{ $attributes->class([--}}
{{--                          'form-select',--}}
{{--                          'is-invalid' => $errors->has($name)--}}
{{--                          ])--}}
{{--            }}--}}
{{--    >--}}
{{--        @foreach($options as $key => $value)--}}
{{--            <option value={{$value}} wire:key="select-{{$key}}" >{{ $key }}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}

{{--    @error($name)--}}
{{--        <div class="invalid-feedback">--}}
{{--            {{ $message }}--}}
{{--        </div>--}}
{{--    @enderror--}}

{{--</div>--}}
{{--@script--}}
{{--    <script>--}}
{{--        $( '#{{$name}}' ).select2( {--}}
{{--            theme: "bootstrap-5",--}}
{{--            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',--}}
{{--            placeholder: $( this ).data( 'placeholder' ),--}}
{{--            closeOnSelect: false,--}}
{{--        } );--}}
{{--    </script>--}}

{{--@endscript--}}
{{--<div>--}}
{{--    <select id="{{ $name }}"--}}
{{--            wire:model="{{$name}}"--}}
{{--            data-allow-clear="false"--}}
{{--            {{ $attributes->class([--}}
{{--                          'form-select',--}}
{{--                          'is-invalid' => $errors->has($name)--}}
{{--                         ])--}}
{{--           }}--}}
{{--    >--}}
{{--        @empty($oldValue)--}}
{{--            <option value="">--- Select {{ $label }} ---</option>--}}
{{--        @endempty--}}
{{--        @foreach($options as $key => $value)--}}
{{--            <option value="{{ $key }}"--}}
{{--                    wire:key="category-{{$key}}"--}}
{{--            @isset($oldValue)--}}
{{--                @selected($key == $oldValue)--}}
{{--                    @endisset--}}
{{--            >--}}
{{--                {{ $value }}--}}
{{--            </option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--    --}}
{{--</div>--}}
