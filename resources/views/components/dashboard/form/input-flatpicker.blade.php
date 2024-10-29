@props([
    'name',
    'label',
    'value' => '',
])

@isset($label)
    <label for="{{$name}}" class="form-label">{{$label}}:</label>
@endisset
<input class="flatpickr flatpickr-input active form-control" id="{{$name}}" type="text" wire:model.live="{{$name}}"
       @isset($value) value="{{$value}}" @endisset placeholder="Select Date.." data-id="minDate" readonly="readonly"
/>

@script
    <script>
        flatpickr("#{{$name}}", {});
    </script>
@endscript
