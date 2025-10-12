@extends('frontend.layouts.master')

@section('content')
  {{-- <!--===========================
        BREADCRUMB START
    ============================--> --}}
  <section class="wsus__breadcrumb" style="background: url({{ asset(config('settings.site_breadcrumb')) }});">
    <div class="wsus__breadcrumb_overlay">
      <div class="container">
        <div class="row">
          <div class="col-12 wow fadeInUp">
            <div class="wsus__breadcrumb_text">
              <h1>Request Payout</h1>
              <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Request Payout</li>
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
        @include('frontend.instructor-dashboard.sidebar')
        <div class="col-xl-9 col-md-8 wow fadeInRight">

          <div class="row">
            <div class="col-xl-4 col-sm-6 wow fadeInUp">
              <div class="wsus__dash_earning">
                <h6>REVENUE</h6>
                <h3>{{ $currencyIcon }} {{ $currentBalance }}</h3>
                {{-- <p>Earning this month</p> --}}
              </div>
            </div>
            <div class="col-xl-4 col-sm-6 wow fadeInUp">
              <div class="wsus__dash_earning">
                <h6>PENDING PAYOUT</h6>
                <h3>{{ $currencyIcon }} {{ $pendingBalance }}</h3>
                {{-- <p>Progress this month</p> --}}
              </div>
            </div>
            <div class="col-xl-4 col-sm-6 wow fadeInUp">
              <div class="wsus__dash_earning">
                <h6>TOTAL PAYOUT</h6>
                <h3>{{ $currencyIcon }} {{ $totalPayout }}</h3>
                {{-- <p>Rating this month</p> --}}
              </div>
            </div>
          </div>

          <form
            class="wsus__dashboard_contant"
            action="{{ route('instructor.withdrawals.request-payout.store') }}"
            method="post"
            enctype="multipart/form-data"
          >
            @csrf
            <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
              <div class="wsus__dashboard_heading">
                <h5>Request Payout</h5>
                {{-- <p>Manage your personal information here.</p> --}}
              </div>
            </div>

            <div class="wsus__dashboard_profile_update">
              <table class="table">
                <tbody>
                  <tr>
                    <th>Gateway</th>
                    <td>{{ auth()->user()->gatewayInfo->gateway }}</td>
                  </tr>
                  <tr>
                    <th>Information</th>
                    <td>{{ auth()->user()->gatewayInfo->information }}</td>
                  </tr>
                </tbody>
              </table>
              <div class="row">
                <div class="col-xl-12">
                  <div class="wsus__dashboard_profile_update_info">
                    <label>Request amount</label>
                    <input
                      name="amount"
                      type="number"
                      placeholder="Enter amount"
                    >
                    <x-input-error class="mt-2" :messages="$errors->get('amount')" />
                  </div>
                </div>
                <div class="col-xl-12">
                  <div class="wsus__dashboard_profile_update_btn">
                    <button class="common_btn" type="submit">Request Payout</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  {{-- <!--===========================
          DASHBOARD OVERVIEW END
      ============================--> --}}
@endsection
