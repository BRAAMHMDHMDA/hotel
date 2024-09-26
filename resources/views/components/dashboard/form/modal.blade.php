@props([
    'title' => '',
    'id',
])

<div class="modal fade"  id="{{$id}}" tabindex="-1" aria-modal="true" role="dialog" wire:ignore.self>
    <div role="document" {{ $attributes->class(['modal-dialog']) }} >
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title border-bottom" id="exampleModalLabel1">{{$title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{$slot}}
        </div>
    </div>
</div>
