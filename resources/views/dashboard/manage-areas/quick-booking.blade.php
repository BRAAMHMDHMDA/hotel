<div>
    <x-dashboard.breadcrumb mainTitle="Manage Quick Booking" :sub-titles="['Areas']"/>
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Manage Quick Booking Area</h5>
            <hr/>
            <form wire:submit.prevent='submit' class="mt-4">
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col">
                            <x-dashboard.form.input name="short_title" label="Short Title"/>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <x-dashboard.form.input name="main_title" label="Main Title"/>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <x-dashboard.form.textarea name="description" label="Description"/>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-4">
                            <x-dashboard.form.input name="button_text" label="Button Text"/>
                        </div>
                        <div class="col-8">
                            <x-dashboard.form.input name="button_link" label="Button Link"/>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <x-dashboard.form.image-input :src="$image" :src_old="$old_image"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-secondary m-2" data-bs-dismiss="modal">
                        Close
                    </button>
                    <x-dashboard.form.btn-submit label="Save"/>
                </div>
            </form>
        </div>
    </div>
</div>
