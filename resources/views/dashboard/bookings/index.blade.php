<x-dashboard.dashboard-layout title="Bookings">

    <x-dashboard.breadcrumb mainTitle="Bookings Management" />
{{--            <div class="ms-auto">--}}
{{--                <button class="btn btn-primary radius-30" data-bs-toggle="modal" data-bs-target="#create-modal">--}}
{{--                    <i class="bx bxs-plus-square"></i>--}}
{{--                    <span>Add New Room</span>--}}
{{--                </button>--}}
{{--                <livewire:dashboard.rooms.create />--}}
{{--            </div>--}}
{{--    </x-dashboard.breadcrumb>--}}

    <div class="card">
        <div class="card-body">
            <livewire:dashboard.rooms.index />
        </div>
    </div>
{{--    <livewire:dashboard.rooms.edit />--}}
{{--    <livewire:dashboard.rooms.delete />--}}

</x-dashboard.dashboard-layout>

