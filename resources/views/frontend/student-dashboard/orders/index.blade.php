@extends('frontend.layouts.master')

@section('content')
  {{-- <!--===========================
        BREADCRUMB START
    ============================--> --}}
  <section class="wsus__breadcrumb"
    style="background: url({{ asset(config('settings.site_breadcrumb')) }});"
  >
    <div class="wsus__breadcrumb_overlay">
      <div class="container">
        <div class="row">
          <div class="col-12 wow fadeInUp">
            <div class="wsus__breadcrumb_text">
              <h1>Order</h1>
              <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Order</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- <!--===========================
        BREADCRUMB END
    ============================--> --}}

  {{-- <!--===========================
        DASHBOARD OVERVIEW START
    ============================--> --}}
  <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
    <div class="container">
      <div class="row">
        @include('frontend.student-dashboard.sidebar')
        <div class="col-xl-9 col-md-8 wow fadeInRight">
          <div class="wsus__dashboard_contant">
            <div class="wsus__dashboard_contant_top">
              <div class="wsus__dashboard_heading relative">
                <h5>Orders</h5>
                <p>List all your order</p>
              </div>
            </div>

            <div class="wsus__dash_course_table">
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th class="details">
                            NO.
                          </th>
                          <th class="details">
                            INVOICE
                          </th>
                          <th class="details">
                            AMOUNT
                          </th>
                          <th class="status">
                            STATUS
                          </th>
                          <th class="action">
                            ACTION
                          </th>
                        </tr>
                        @forelse ($orders as $order)
                          <tr>
                            <td class="details">
                              {{ $loop->iteration }}
                            </td>
                            <td class="details">
                              {{ $order->invoice_id }}
                            </td>
                            <td class="sale">
                              <p>{{ $order->total_amount }} {{ $order->currency }}</p>
                            </td>
                            <td class="status">
                              @if ($order->status == 'pending')
                                <span class="badge bg-warning">{{ $order->status }}</span>
                              @elseif ($order->status == 'approved')
                                <span class="badge bg-success">{{ $order->status }}</span>
                              @endif
                            </td>
                            <td>
                              <a href="{{ route('student.orders.show', $order->id) }}">
                                <i class="fa fa-eye"></i>
                                view
                              </a>
                            </td>
                          </tr>
                        @empty
                          No Orders Found
                        @endforelse
                      </tbody>
                    </table>
                    <div class="p-3">
                      {{ $orders->links() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- <!--===========================
    DASHBOARD OVERVIEW END
    ============================--> --}}
@endsection
