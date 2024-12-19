<x-dashboard.dashboard-layout title="Room Types">

    <x-dashboard.breadcrumb mainTitle="Room Types">
        @can('room_type-create')
            <div class="ms-auto">
                <a class="btn btn-primary radius-30" wire:navigate href="{{ route('dashboard.room-type.create') }}">
                    <i class="bx bxs-plus-square"></i>
                    <span>Add New</span>
                </a>
            </div>
        @endcan
    </x-dashboard.breadcrumb>

    <div class="card">
        <div class="card-body">
            <livewire:dashboard.room-types.index />
        </div>
    </div>

</x-dashboard.dashboard-layout>

