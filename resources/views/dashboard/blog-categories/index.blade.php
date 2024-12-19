<x-dashboard.dashboard-layout title="Blog Categories">

    <x-dashboard.breadcrumb mainTitle="Blog Categories Management">
        @can('blog_category-list')
            <div class="ms-auto">
                <button class="btn btn-primary radius-30" data-bs-toggle="modal" data-bs-target="#create-modal">
                    <i class="bx bxs-plus-square"></i>
                    <span>Add New</span>
                </button>
                <livewire:dashboard.blog-categories.create />
            </div>
        @endcan
    </x-dashboard.breadcrumb>

    <div class="card">
        <div class="card-body">
            <livewire:dashboard.blog-categories.index />
        </div>
    </div>
    @can('blog_category-edit')
    <livewire:dashboard.blog-categories.edit />
    @endcan
    @can('blog_category-delete')
        <livewire:dashboard.blog-categories.delete />
    @endcan

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

