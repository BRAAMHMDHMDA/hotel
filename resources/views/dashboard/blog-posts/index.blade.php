<x-dashboard.dashboard-layout title="Blog Posts">

    <x-dashboard.breadcrumb mainTitle="Blog Posts Management">
            <div class="ms-auto">
                <a wire:navigate href="{{ route('dashboard.blog-posts.create') }}" class="btn btn-primary radius-30">
                    <i class="bx bxs-plus-square"></i>
                    <span>Add New</span>
                </a>
            </div>
    </x-dashboard.breadcrumb>

    <div class="card">
        <div class="card-body">
            <livewire:dashboard.blog-posts.index />
        </div>
    </div>
{{--    <livewire:dashboard.blog-posts.edit />--}}
    <livewire:dashboard.blog-posts.delete />

    <x-dashboard.form.modal id="bulk-delete-modal" title="Bulk Delete Members">
        <form>
            <div class="modal-body" id="confirmation_massage">
                Are You Sure you want to Delete All Selected Rows?
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-outline-danger" id="confirm_bulk_delete" >
                    Confirm Bulk Delete
                    <i class="bx bx-trash"></i>
                </button>
            </div>
        </form>
    </x-dashboard.form.modal>


</x-dashboard.dashboard-layout>

