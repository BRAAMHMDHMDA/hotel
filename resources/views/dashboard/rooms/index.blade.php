<x-dashboard.dashboard-layout title="Rooms">

    <x-dashboard.breadcrumb mainTitle="Rooms Management">
        @can('room-create')
            <div class="ms-auto">
                <button class="btn btn-primary radius-30" data-bs-toggle="modal" data-bs-target="#create-modal">
                    <i class="bx bxs-plus-square"></i>
                    <span>Add New Room</span>
                </button>
                <livewire:dashboard.rooms.create />
            </div>
        @endcan
    </x-dashboard.breadcrumb>

    <div class="card">
        <div class="card-body">
            <livewire:dashboard.rooms.index />
        </div>
    </div>
    @can('room-edit')
    <livewire:dashboard.rooms.edit />
    @endcan

    @can('room-delete')
        <livewire:dashboard.rooms.delete />
    @endcan
</x-dashboard.dashboard-layout>

