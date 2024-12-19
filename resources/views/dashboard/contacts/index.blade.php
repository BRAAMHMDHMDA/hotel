<x-dashboard.dashboard-layout title="Contacts">

    <x-dashboard.breadcrumb mainTitle="Contacts" />


    <div class="card">
        <div class="card-body">
            <livewire:dashboard.contacts.index />
            <x-dashboard.form.modal id="create-modal" title="Contact Details" class="modal-md" >
                <div class="modal-body">
                    {{$contact->message??0}}
                </div>
            </x-dashboard.form.modal>
        </div>
    </div>
    @can('contact-delete')
    <livewire:dashboard.contacts.delete />
    @endcan
    @can('contact-show')
    <livewire:dashboard.contacts.show />
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


