<x-dashboard.dashboard-layout title="Testimonials">

    <x-dashboard.breadcrumb mainTitle="Testimonials Management">
        @can('Testimonial-create')
            <div class="ms-auto">
                <button class="btn btn-primary radius-30" data-bs-toggle="modal" data-bs-target="#create-modal">
                    <i class="bx bxs-plus-square"></i>
                    <span>Add New</span>
                </button>
                <livewire:dashboard.testimonials.create />
            </div>
        @endcan
    </x-dashboard.breadcrumb>

    <div class="card">
        <div class="card-body">
            <div class="alert alert-warning border-0 bg-warning  alert-dismissible fade show py-0 " style="width:fit-content">
                <div class="d-flex align-items-center">
                    <div class="font-24 text-dark">
                        <i class="bx bx-bulb"></i>
                    </div>
                    <div class="ms-2">
                        <div class="text-dark">Click on the Collapse Icon to Show the Person's Testimony</div>
                    </div>
                </div>
                <button type="button" class="btn-close font-13" style="padding: 0.75rem 1rem" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <livewire:dashboard.testimonials.index />
        </div>
    </div>

    @can('Testimonial-edit')
    <livewire:dashboard.testimonials.edit />
    @endcan
    @can('Testimonial-delete')
    <livewire:dashboard.testimonials.delete />
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

