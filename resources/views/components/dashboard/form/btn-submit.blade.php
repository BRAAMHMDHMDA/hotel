
<button type="submit"  wire:loading.attr="disabled"
    {{ $attributes->class(['btn btn-primary d-flex align-items-center'])}}
>
    <span class="d-flex align-items-center">
        <i class='bx bx-save'></i>
        {{$label}}
    </span>
    <span class="spinner-border spinner-border-sm text-white ms-1"
          role="status" wire:loading wire:target="{{$target ?? 'submit'}}"
    >
                    <span class="visually-hidden">Loading...</span>
    </span>
</button>
