<x-dashboard.dashboard-layout title="Gallery">

    <x-dashboard.breadcrumb mainTitle="Gallery Management">
        @can('gallery-create')
            <div class="ms-auto">
                <button class="btn btn-primary radius-30" data-bs-toggle="modal" data-bs-target="#create-modal">
                    <i class="bx bxs-plus-square"></i>
                    <span>Add New</span>
                </button>
                <livewire:dashboard.gallery.create />
            </div>
        @endcan
    </x-dashboard.breadcrumb>


    <div class="card">
        <div class="card-body">
            <livewire:dashboard.gallery.index />
        </div>
    </div>

    @can('gallery-delete')
        <livewire:dashboard.gallery.delete />
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

    @push('scripts')
        <script>
            document.addEventListener('copyUrl', event => {
                const imageUrl = event.detail.url; // Get the image URL from the event detail
                navigator.clipboard.writeText(imageUrl)
                    .then(() => Lobibox.notify('success', {
                        pauseDelayOnHover: true,
                        size: 'mini',
                        rounded: true,
                        icon: 'bx bx-check-circle',
                        delayIndicator: false,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        msg: `Image URL Copied to Clipboard Successfully!`,
                    }))
                    .catch(err => alert("Failed to copy Image URL"));
            });
        </script>
    @endpush

</x-dashboard.dashboard-layout>


