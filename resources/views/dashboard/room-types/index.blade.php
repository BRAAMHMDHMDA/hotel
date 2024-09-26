<x-dashboard.dashboard-layout title="Room Types">

    <x-dashboard.breadcrumb mainTitle="Room Types">
            <div class="ms-auto">
                <button class="btn btn-primary radius-30" data-bs-toggle="modal" data-bs-target="#create-modal">
                    <i class="bx bxs-plus-square"></i>
                    <span>Add New</span>
                </button>
                <livewire:dashboard.room-types.create />
            </div>
    </x-dashboard.breadcrumb>

    <div class="card">
        <div class="card-body">
            <livewire:dashboard.room-types.index />
        </div>
    </div>
    <livewire:dashboard.room-types.edit />
    <livewire:dashboard.room-types.delete />

</x-dashboard.dashboard-layout>

