    @props([
        'name' => 'image',
        'old_image' => 'old_image',
        'label' => 'Image',
        "src",
        "src_old",
    ])


    <label for="{{ $name }}" class="form-label">{{ $label }}</label>

    <input type="file" id="{{ $name }}" placeholder="Enter {{$label}}"
           wire:model="{{$name}}"
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

    <div style="max-width: 50%"
         wire:loading wire:target="{{$name}}"
         wire:loading.class="d-flex justify-content-center align-items-center"
    >
        <span class="spinner-border m-2"></span>
    </div>
    @if (is_null($src) && !is_null($src_old))
        <img src="{{$src_old}}" class="img-fluid mt-2" style="height: 200px" wire:target="{{$name}}" wire:loading.attr="hidden" />
    @else
        <img src="{{$src?->temporaryUrl()}}" class="img-fluid mt-2" style="height: 200px" wire:target="{{$name}}" wire:loading.attr="hidden" />
    @endif


