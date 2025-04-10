<div>

    <x-dashboard.breadcrumb mainTitle="Home Page" />

    <div class="">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Bookings</p>
                                <h4 class="my-1 text-info">
                                    {{ $totalBookings }}
                                </h4>
                                <p class="mb-0 font-13">{{ $bookingsChange >= 0 ? '+' : '' }}{{ $bookingsChange }}% from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bx-calendar'></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Pending Bookings</p>
                                <h4 class="my-1 text-warning">
                                    {{ $totalPendingBookings }}
                                </h4>
                                <p class="mb-0 font-13">{{ $pendingBookingsChange >= 0 ? '+' : '' }}{{ $pendingBookingsChange }}% from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-kyoto text-white ms-auto"><i class='bx bx-calendar-exclamation'></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Completed Bookings</p>
                                <h4 class="my-1 text-success">
                                    {{ $totalCompletedBookings }}
                                </h4>
                                <p class="mb-0 font-13">{{ $completedBookingsChange >= 0 ? '+' : '' }}{{ $completedBookingsChange }}% from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                <i class='bx bx-calendar-check'></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Cancelled Bookings</p>
                                <h4 class="my-1 text-danger">
                                    {{ $totalCancelledBookings }}
                                </h4>
                                <p class="mb-0 font-13">{{ $cancelledBookingsChange >= 0 ? '+' : '' }}{{ $cancelledBookingsChange }}% from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto">
                                <i class='bx bx-calendar-x'></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
            <div class="col">
                    <div class="card radius-10 border-start border-0 border-4 border-success-subtle">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Revenue</p>
                                    <h4 class="my-1 text-success-emphasis">${{ $totalRevenue }}</h4>
                                    <p class="mb-0 font-13">{{ $revenueChange >= 0 ? '+' : '' }}{{ $revenueChange }}$ from last week</p>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-lush text-white ms-auto"><i class='bx bxs-wallet'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Customers</p>
                                <h4 class="my-1 text-danger">{{ $totalCustomers }}</h4>
                                <p class="mb-0 font-13">{{ $customersChange >= 0 ? '+' : '' }}{{ $customersChange }}% from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-group'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Contacts</p>
                                <h4 class="my-1 text-primary">{{ $totalContacts }}</h4>
                                <p class="mb-0 font-13">{{ $contactsChange >= 0 ? '+' : '' }}{{ $contactsChange }}% from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-deepblue text-white ms-auto"><i class='bx bxs-message'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->
        <div class="row">
            <div class="col-12 col-lg-8 ">
                <div class="card radius-10">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="my-2">Recent Bookings</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Code</th>
                                        <th>Room</th>
                                        <th>Customer</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Booking Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($recentBookings as $booking)
                                    <tr>
                                        <td>
                                            <a href="{{route('dashboard.booking.edit', $booking->id)}}" wire:navigate>
                                                <span class="badge rounded bg-dark"> {{$booking->code}} </span>
                                            </a>
                                        </td>
                                        <td>
                                            {{$booking->roomType->name}} <sup>({{$booking->number_of_rooms}})</sup>
                                        </td>
                                        <td>{{$booking->user->first_name.' '.$booking->user->last_name}}</td>
                                        <td>{{$booking->total_price}}$</td>
                                        <td>
                                            @switch($booking->status)
                                                @case('pending')
                                                    <div class="badge rounded-pill bg-warning">Pending</div>
                                                    @break
                                                @case('confirmed')
                                                    <div class="badge rounded-pill bg-info">Confirmed</div>
                                                    @break
                                                @case('completed')
                                                    <div class="badge rounded-pill bg-success">Completed</div>
                                                    @break
                                                @case('cancelled')
                                                    <div class="badge rounded-pill bg-danger">Cancelled</div>
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>{{$booking->created_at->format('d/m H:m')}}</td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-4 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Trending Rooms</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container-2">
                            <canvas id="chart2"></canvas>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        @php $colors = ['primary', 'danger', 'warning', 'success']; @endphp
                        @forelse($trendingRooms as $key => $room)
                            <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                                {{$room->name}}
                                <span class="badge bg-{{$colors[$key]}} rounded-pill">{{$room->booking_count}} Bookings</span>
                            </li>
                        @empty
                            <li class="list-group-item">No trending rooms available.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div><!--end row-->

    </div>

</div>

@push('scripts')
    <script src="{{ asset('dash_assets/plugins/chartjs/js/chart.js') }}"></script>

    <script type="text/javascript">
        let myChart = null;

        function initializeChart() {
            if (myChart instanceof Chart) {
                    myChart.destroy();
            }

            const ctx = document.getElementById('chart2');
            if (!ctx) {
                console.error('Chart canvas not found');
                return;
            }
            const context = ctx.getContext('2d');

            // Define Bootstrap-compatible colors
            const chartColors = {
                primary: '#0d6efd',    // Bootstrap primary blue
                danger: '#dc3545',     // Bootstrap danger red
                warning: '#ffc107',    // Bootstrap warning yellow
                success: '#15ca20'     // Bootstrap success green
            };

            // Get PHP colors array
            const phpColors = @json($colors);

            // Map PHP colors to chart colors
            const backgroundColors = phpColors.map(color => chartColors[color]);

            // Get data from PHP
            const roomTypes = {!! json_encode($trendingRooms->pluck('name')->toArray()) !!};
            const bookingCounts = {!! json_encode($trendingRooms->pluck('booking_count')->toArray()) !!};

            myChart = new Chart(context, {
                type: 'doughnut',
                data: {
                    labels: [...roomTypes],
                    datasets: [{
                        backgroundColor: [...backgroundColors],
                        hoverBackgroundColor: [...backgroundColors],
                        data: [...bookingCounts],
                        borderWidth: [1, 1, 1, 1]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cutout: 82,
                    plugins: {
                        legend: {
                            display: false,
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `${context.label}: ${context.raw} bookings`;
                                }
                            }
                        }
                    }
                }
            });
        }

        // Initial load
        document.addEventListener('DOMContentLoaded', function() {
            initializeChart();
        });

        // Listen for Livewire navigation events
        document.addEventListener('livewire:navigated', function() {
            initializeChart();
        });
    </script>
@endpush
