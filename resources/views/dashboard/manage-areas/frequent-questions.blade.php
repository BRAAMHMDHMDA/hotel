<div>
    <x-dashboard.breadcrumb mainTitle="Manage Frequent Question's" :sub-titles="['Areas']"/>
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Manage Frequent Question's Area</h5>
            <hr/>
            <form wire:submit.prevent='submit' class="mt-4">
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-4">
                            <x-dashboard.form.input name="short_title" label="Short Title"/>
                        </div>
                        <div class="col-8">
                            <x-dashboard.form.input name="main_title" label="Main Title"/>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <x-dashboard.form.textarea name="description" label="Description"/>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6">
                            <x-dashboard.form.input class="mb-2" name="first_question" label="First Question"/>
                            <x-dashboard.form.textarea class="mb-2" name="first_answer" label="First Answer" rows="5"/>
                        </div>
                        <div class="col-6">
                            <x-dashboard.form.input class="mb-2" name="second_question" label="Second Question"/>
                            <x-dashboard.form.textarea class="mb-2" name="second_answer" label="Second Answer" rows="5"/>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6">
                            <x-dashboard.form.input class="mb-2" name="third_question" label="Third Question" rows="5"/>
                            <x-dashboard.form.textarea class="mb-2" name="third_answer" label="Third Answer" rows="5"/>
                        </div>
                        <div class="col-6">
                            <x-dashboard.form.input class="mb-2" name="fourth_question" label="Fourth Question" rows="5"/>
                            <x-dashboard.form.textarea class="mb-2" name="fourth_answer" label="Fourth Answer" rows="5"/>
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
