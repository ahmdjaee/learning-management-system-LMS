@extends('frontend.layouts.master')

@section('content')
  <!--===========================
                                                BREADCRUMB START
                                            ============================-->
  <section class="wsus__breadcrumb" style="background: url(images/breadcrumb_bg.jpg);">
    <div class="wsus__breadcrumb_overlay">
      <div class="container">
        <div class="row">
          <div class="col-12 wow fadeInUp">
            <div class="wsus__breadcrumb_text">
              <h1>Profile</h1>
              <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Profile</li>
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
        <div class="col-xl-9 col-md-8 wow fadeInRight">
          <div class="wsus__dashboard_contant">
            <div class="wsus__dashboard_contant_top">
              <div class="wsus__dashboard_heading relative">
                <h5>Orders</h5>
                <p>This is a list of the courses you have ordered.</p>
              </div>
            </div>

            <form class="wsus__dash_course_searchbox" action="#">
              <div class="input">
                <input type="text" placeholder="Search our Courses">
                <button><i class="far fa-search"></i></button>
              </div>
              <div class="selector">
                <select class="select_js">
                  <option value="">Choose</option>
                  <option value="">Choose 1</option>
                  <option value="">Choose 2</option>
                </select>
              </div>
            </form>

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
                        @forelse ($orderItems as $item)
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
