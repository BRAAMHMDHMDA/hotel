<x-dashboard.dashboard-layout title="Bookings">

    <x-dashboard.breadcrumb mainTitle="Bookings Management">
        @can('booking-create')
            <div class="ms-auto">
                <a class="btn btn-primary radius-30" wire:navigate href="{{ route('dashboard.booking.create') }}">
                    <i class="bx bxs-plus-square"></i>
                    <span>Add New Booking</span>
                </a>
            </div>
        @endcan
    </x-dashboard.breadcrumb>

    <div class="card">
        <div class="card-body">
            <div class="alert alert-warning border-0 bg-warning  alert-dismissible fade show py-0 " style="width: 35%">
                <div class="d-flex align-items-center">
                    <div class="font-24 text-dark">
                        <i class="bx bx-bulb"></i>
                    </div>
                    <div class="ms-2">
                        <div class="text-dark">Click on Code Booking to View Details or Edit</div>
                    </div>
                </div>
                <button type="button" class="btn-close font-13" style="padding: 0.75rem 1rem" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <livewire:dashboard.bookings.index />
        </div>
    </div>

</x-dashboard.dashboard-layout>

{{--@script--}}
{{--    <script>--}}
{{--        Livewire.on('redirect', () => {--}}
{{--            window.location.href = "{{ route('dashboard.bookings.index') }}";--}}
{{--        })--}}
{{--    </script>--}}
{{--@endscript--}}

