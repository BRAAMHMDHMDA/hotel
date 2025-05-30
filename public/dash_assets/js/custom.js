// {{-- Hide Create Modal After Submit --}}
document.addEventListener("createModalToggle", event => {
    $('#create-modal').modal('toggle');
});
// {{-- Hide Edit Modal After Submit --}}
document.addEventListener("editModalToggle", event => {
    $('#edit-modal').modal('toggle');
});
// {{-- Hide Delete Modal After Submit --}}
document.addEventListener("deleteModalToggle", event => {
    $('#delete-modal').modal('toggle');
});
// {{-- Hide Delete Modal After Submit --}}
document.addEventListener("showModal", event => {
    $('#show-modal').modal('show');
});

document.addEventListener("hideModal", event => {
    $('#show-modal').modal('hide');
});

document.addEventListener("notify_success", event => {
    Lobibox.notify('success', {
        pauseDelayOnHover: true,
        size: 'mini',
        rounded: true,
        icon: 'bx bx-check-circle',
        delayIndicator: false,
        continueDelayOnInactiveTab: false,
        position: 'top right',
        msg: event.detail[0],
    });
});
document.addEventListener("notify_error", event => {
    Lobibox.notify('error', {
        pauseDelayOnHover: true,
        size: 'mini',
        rounded: true,
        delayIndicator: false,
        icon: 'bx bx-x-circle',
        continueDelayOnInactiveTab: false,
        position: 'top right',
        msg: event.detail[0],
    });
});
$(document).ready(function () {
    // Listen for the 'show-delete-confirmation' event
    window.addEventListener('show-delete-confirmation', function (event) {
        let confirm_modal = $('#bulk-delete-modal');
        confirm_modal.modal('toggle');
        $('#confirm_bulk_delete').click(function () {
            Livewire.dispatch('submitBulkDelete');
            confirm_modal.modal('toggle');
        })
    });
});

