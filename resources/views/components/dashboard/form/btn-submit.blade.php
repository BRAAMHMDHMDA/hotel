
<button type="submit" class="btn btn-primary d-flex align-items-center" wire:loading.attr="disabled">
    <span class="d-flex align-items-center gap-1" >
        {{$label}}
        <i class='bx bx-save'></i>
    </span>
    <span class="spinner-border spinner-border-sm text-white ms-1"
          role="status" wire:loading wire:target="{{$target ?? 'submit'}}"
    >
                    <span class="visually-hidden">Loading...</span>
    </span>
</button>
