<x-dashboard.modal id="create-modal" title="Add New Images" class="modal-md" >
    <div class="modal-body">
        <div class="row">
            <div class="col">
                <form wire:submit.prevent="submit">
                    <div class="mb-4">
                        <x-dashboard.form.input type="file" name="images" label="Upload Images" placeholder="Upload Images" multiple />
                    </div>
                    <!-- Loading indicator for file input -->
                    <div wire:loading wire:target="images" class="mb-3">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Uploading...</span>
                        </div>
                        <span class="ms-2">Uploading images...</span>
                    </div>

                    <!-- Preview selected images with cancel button -->
                    @if ($images)
                        <div class="row" style="margin-bottom: 20px">
                            @foreach ($images as $index => $image)
                                <div class="col-3 position-relative">
                                    <img src="{{ $image->temporaryUrl() }}" class="img-fluid img-thumbnail">
                                    <button type="button" wire:click="removeImage({{ $index }})"
                                            class="btn btn-danger btn-sm position-absolute top-0 end-0">
                                        x
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="modal-footer border-0 mt-5">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <x-dashboard.form.btn-submit label="Save"/>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-dashboard.modal>
