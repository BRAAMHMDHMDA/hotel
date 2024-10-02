<form wire:submit.prevent='submit'>
    <div class="modal-body">
        <div class="row mb-4">
            <div class="col">
                <x-dashboard.form.input name="number" label="Room Number"/>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <x-dashboard.form.select label="Room Template" :options="$room_templates" name="room_template_id" />
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <x-dashboard.form.select label="Status" :options="['draft'=> 'Draft', 'active'=> 'Active']" name="status"/>
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
