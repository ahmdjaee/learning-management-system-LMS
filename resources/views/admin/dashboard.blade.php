@extends('admin.layouts.master')

@section('content')
  <!-- Page header -->
  <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            Overview
          </div>
          <h2 class="page-title">
            Dashboard
          </h2>
        </div>
      </div>
    </div>
  </div>
  <!-- Page body -->
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-12">
          <div class="row row-cards">
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span
                        class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                        <i class="ti ti-calendar-dollar"></i>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        <b>{{ config('settings.currency_icon') }}{{ $todayOrders }}</b>
                      </div>
                      <div class="text-secondary">
                        Today Orders
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span
                        class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                        <i class="ti ti-calendar-dollar"></i>

                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        <b>{{ config('settings.currency_icon') }}{{ $thisWeekOrders }}</b>
                      </div>
                      <div class="text-secondary">
                        This Week Orders
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span
                        class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                        <i class="ti ti-calendar-dollar"></i>

                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        <b>{{ config('settings.currency_icon') }}{{ $thisMonthOrders }}</b>
                      </div>
                      <div class="text-secondary">
                        This Month Orders
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span
                        class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                        <i class="ti ti-calendar-dollar"></i>

                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        <b>{{ config('settings.currency_icon') }}{{ $thisYearOrders }}</b>
                      </div>
                      <div class="text-secondary">
                        This Year Orders
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {{-- Section 2 --}}
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span
                        class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                        <i class="ti ti-chart-bar"></i>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        <b>{{ $totalOrders }}</b>
                      </div>
                      <div class="text-secondary">
                        Total Orders
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span
                        class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                        <i class="ti ti-book"></i>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        <b>{{ $pendingCourses }}</b>
                      </div>
                      <div class="text-secondary">
                        Pending Courses
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span
                        class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                        <i class="ti ti-book-off"></i>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        <b>{{ $rejectedCourses }}</b>
                      </div>
                      <div class="text-secondary">
                        Rejected Courses
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span
                        class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                        <i class="ti ti-book"></i>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        <b> {{ $approvedCourses }}</b>
                      </div>
                      <div class="text-secondary">
                        Approved Courses
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="card mt-3">
        <div>
          <canvas id="orderChart"></canvas>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-md-5 ">
          <div class="card h-100">
            <div class="card-header">
              <h3 class="card-title">Recent Courses</h3>
            </div>
            <div class="card-table table-responsive">
              <table class="table table-vcenter">
                <thead>
                  <tr>
                    <th>Course</th>
                    <th>Status</th>
                  </tr>
                </thead>
                @foreach ($recentCourses as $course)
                  <tr>
                    <td>
                      {{ Str::limit($course->title, 50) }}
                      <a
                        class="ms-1"
                        href="{{ route('admin.courses.edit', ['id' => $course->id, 'step' => 1]) }}"
                        aria-label="Open website"
                      ><!-- Download SVG icon from http://tabler-icons.io/i/link -->
                        <svg
                          class="icon"
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          stroke-width="2"
                          stroke="currentColor"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        >
                          <path
                            stroke="none"
                            d="M0 0h24v24H0z"
                            fill="none"
                          />
                          <path d="M9 15l6 -6" />
                          <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" />
                          <path
                            d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463"
                          />
                        </svg>
                      </a>
                    </td>
                    <td>
                      @if ($course->is_approved == 'pending')
                        <span class="badge bg-yellow text-yellow-fg">Pending</span>
                      @elseif ($course->is_approved == 'approved')
                        <span class="badge bg-green text-green-fg">Approved</span>
                      @else
                        <span class="badge bg-red text-red-fg">Pending</span>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-7 ">
          <div class="card h-100" >
            <div class="card-header">
              <h3 class="card-title">Recent Orders</h3>
            </div>
            <div class="card-table table-responsive">
              <table class="table table-vcenter">
                <thead>
                  <tr>
                    <th>Invoice</th>
                    <th>Buyer</th>
                    <th>Amount</th>
                    <th>Status</th>
                  </tr>
                </thead>
                @foreach ($recentOrders as $order)
                  <tr>
                    <td>
                      #{{ $order->invoice_id }}
                      <a
                        class="ms-1"
                        href="{{ route('admin.orders.show', $order->id) }}"
                        aria-label="Open course"
                      ><!-- Download SVG icon from http://tabler-icons.io/i/link -->
                        <svg
                          class="icon"
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          stroke-width="2"
                          stroke="currentColor"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        >
                          <path
                            stroke="none"
                            d="M0 0h24v24H0z"
                            fill="none"
                          />
                          <path d="M9 15l6 -6" />
                          <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" />
                          <path
                            d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463"
                          />
                        </svg>
                      </a>
                    </td>
                     <td>
                        <div>{{ Str::limit($order->customer->name, 50) }}</div>
                        <small>{{Str::limit($order->customer->email, 50)}}</small>
                    </td>
                    <td>
                      {{ $order->total_amount }} {{ $order->currency }}
                    </td>
                     <td>
                      @if ($order->status == 'pending')
                        <span class="badge bg-yellow text-yellow-fg">{{ $order->status }}</span>
                      @elseif ($order->status == 'approved')
                        <span class="badge bg-green text-green-fg">{{ $order->status }}</span>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('bottom-scripts')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    const ctx = document.getElementById('orderChart').getContext('2d');;

    const orderChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
          'Dec'
        ],
        datasets: [{
            label: 'Order Amount ({{ config('settings.currency_icon') }})',
            data: @json($monthlyOrderSums),
            borderWidth: 1,
            yAxisID: 'y'
          },
          {
            label: 'Order Count',
            data: @json($monthlyOrderCounts),
            type: 'line',
            yAxisID: 'y1'
          },
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        aspectRatio: 0.8,
        scales: {
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Order Amount ({{ config('settings.currency_icon') }})'
            },
            position: 'left',
          },
          y1: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Order Count'
            },
            position: 'right',
            grid: {
              drawOnChartArea: false, // only want the grid lines for one axis to show up
            },
          },
        }
      }
    });
  </script>
@endpush
