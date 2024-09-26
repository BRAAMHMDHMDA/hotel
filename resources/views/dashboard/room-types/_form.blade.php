<form wire:submit.prevent='submit'>
    <div class="modal-body">
        <div class="row mb-4">
            <div class="col">
                <x-dashboard.form.input name="name" label="Name"/>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <x-dashboard.form.image-input  :src="$image" :src_old="$old_image"/>
            </div>
        </div>
    </div>
    <div class="modal-footer border-0">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
        </button>
        <x-dashboard.form.btn-submit label="Save"/>
    </div>
</form>
