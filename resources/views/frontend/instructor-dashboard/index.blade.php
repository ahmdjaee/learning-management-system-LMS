@extends('frontend.layouts.master')

@section('content')
  <!--===========================
              BREADCRUMB START
          ============================-->
  <section class="wsus__breadcrumb"
    style="background: url({{ asset(config('settings.site_breadcrumb')) }});"
  >
    <div class="wsus__breadcrumb_overlay">
      <div class="container">
        <div class="row">
          <div class="col-12 wow fadeInUp">
            <div class="wsus__breadcrumb_text">
              <h1>Instructor Dashboard</h1>
              <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Instructor Dashboard</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--===========================
              BREADCRUMB END
          ============================-->

  <!--===========================
              DASHBOARD OVERVIEW START
          ============================-->
  <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
    <div class="container">
      <div class="row">
        @include('frontend.instructor-dashboard.sidebar')
        <div class="col-xl-9 col-md-8">

          @if (auth()->user()->approve_status == 'pending')
            <svg style="display: none;" xmlns="http://www.w3.org/2000/svg">
              <symbol
                id="info-fill"
                fill="currentColor"
                viewBox="0 0 16 16"
              >
                <path
                  d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"
                />
              </symbol>
            </svg>

            <div class="alert alert-primary d-flex align-items-center" role="alert">
              <svg
                class="bi flex-shrink-0 me-2"
                role="img"
                aria-label="Info:"
                width="24"
                height="24"
              >
                <use xlink:href="#info-fill" />
              </svg>
              <div>
                Hi {{ auth()->user()->name }}, your Instructor request is currently pending. We will
                send a mail on your email when it will be approved.
              </div>
            </div>
          @endif
          {{-- @if (user()?->role != 'instructor')
            <div class="text-end"><a class="common_btn"
                href="{{ route('student.become-instructor') }}"
              >Become a Instructor</a></div>
          @endif --}}
          <div class="row">
            <div class="col-xl-4 col-sm-6 wow fadeInUp">
              <div class="wsus__dash_earning">
                <h6>PENDING COURSES</h6>
                <h3>{{ $pendingCourses }}</h3>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6 wow fadeInUp">
              <div class="wsus__dash_earning">
                <h6>APPROVED COURSES</h6>
                <h3>{{ $approvedCourses }}</h3>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6 wow fadeInUp">
              <div class="wsus__dash_earning">
                <h6>REJECTED COURSES</h6>
                <h3>{{ $rejectedCourses }}</h3>
              </div>
            </div>
          </div>

          <div class="wsus__dashboard_contant">
              <div class="wsus__dashboard_contant_top">
              <div class="wsus__dashboard_heading relative">
                <h5>Recent Orders</h5>
              </div>
            </div>
            <div class="wsus__dash_course_table">
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th class="image">
                            COURSE NAME
                          </th>
                          <th class="details">
                            PURCHASED BY
                          </th>
                          <th class="sale">
                            PRICE
                          </th>
                          <th class="status">
                            COMMISSION RATE
                          </th>
                          <th class="status">
                            EARNING
                          </th>
                        </tr>
                        @forelse ($recentOrders as $item)
                          <tr>
                            <td class="details">
                              <a class="title" href="#">
                                {{ $item->course->title }}
                              </a>
                            </td>
                            <td class="details">
                              {{ $item->order->customer->name }}
                            </td>
                            <td class="sale">
                              <p>{{ $item->price }}</p>
                            </td>
                            <td class="details">
                              {{ $item->commission_rate ?? 0 }} %
                            </td>
                            <td class="sale text-uppercase">
                              {{ calcCommission($item->price, $item->commission_rate) }}
                              {{ $item->order->currency }}
                            </td>
                          </tr>
                        @empty
                          No Orders Found
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--===========================
              DASHBOARD OVERVIEW END
          ============================-->
@endsection
