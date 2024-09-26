<x-dashboard.form.modal id="delete-modal" title="Delete Room-Type" wire:ignore.self>
    <form wire:submit='submit'>
        <div class="modal-body">
            Are You Sure you want to delete this record ?
        </div>
        <div class="modal-footer border-0">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
            </button>
            <x-dashboard.form.btn-delete />
        </div>
    </form>
</x-dashboard.form.modal>
