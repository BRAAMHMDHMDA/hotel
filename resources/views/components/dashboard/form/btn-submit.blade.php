@props([
    'target' => 'submit',
    'label' => 'Submit',
    'icon' => 'bx bx-save',
])
<button type="submit" wire:loading.attr="disabled"
    {{ $attributes->class(['btn btn-primary d-flex align-items-center'])}}
>
    <span class="d-flex align-items-center" >
        <span class="spinner-border spinner-border-sm me-2"
              role="status" wire:loading wire:target="{{$target}}"
        >
                    <span class="visually-hidden">Loading...</span>
        </span>
        @isset( $icon )
            <i class="{{$icon}}" wire:loading.remove wire:target="{{$target}}"></i>
        @endisset
        {{  $label }}
    </span>
</button>
