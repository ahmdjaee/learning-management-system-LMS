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
              <h1>Invoice</h1>
              <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Invoice</li>
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
              <div class="d-flex align-items-center">
                <a class="text-black me-2" href="{{ route('student.orders.index') }}">
                    <i class="fa fa-arrow-left"></i>
                    <h5 class="d-inline">Invoices</h5>
                </a>
              </div>
            </div>

            <div class="wsus__dash_course_table p-4">
              <div class="row">
                <div class="col-6">
                  <p class="h3">Company</p>
                  <address>
                    {{ config('settings.site_name') }}<br>
                    {{ config('settings.location') }}<br>
                    {{ config('settings.phone') }}<br>
                    {{ config('settings.email') }}
                  </address>
                </div>
                <div class="col-6 text-end">
                  <p class="h3">Client</p>
                  <address>
                    {{ $order->customer->name }}<br>
                    {{ $order->customer->email }}<br>
                  </address>
                </div>
                <div class="col-12 my-5">
                  <h1>Invoice #{{ $order->invoice_id }}</h1>
                </div>
              </div>
              <table class="table table-transparent table-responsive">
                <thead>
                  <tr>
                    <th>Course</th>
                    <th class="text-end" style="width: 1%">Qty</th>
                    {{-- <th class="text-end" style="width: 1%">Unit</th> --}}
                    <th class="text-end" colspan="2">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($order->orderItems as $item)
                    <tr>
                      <td>
                        <p class="strong mb-1">{{ $item->course->title }}</p>
                        <div class="text-secondary">By {{ $item->course->instructor->name }}</div>
                      </td>
                      <td class="text-end">
                        1
                      </td>
                      <td class="text-end" colspan="2">{{ $item->price }}</td>
                      {{-- <td class="text-end">$1.800,00</td> --}}
                    </tr>
                  @endforeach
                  <tr>
                    <td class="strong text-end" colspan="3">Subtotal</td>
                    <td class="text-end">{{ $order->total_amount }}</td>
                  </tr>
                  <tr>
                    <td class="strong text-end" colspan="3">Paid Amount</td>
                    <td class="text-end">{{ $order->paid_amount }} {{ $order->currency }}</td>
                  </tr>
                </tbody>
              </table>
              <p class="text-secondary text-center mt-5">Thank you very much for doing business with
                us.
                We look forward to working with
                you again!</p>
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
