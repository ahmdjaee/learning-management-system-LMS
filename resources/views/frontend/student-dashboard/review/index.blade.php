@extends('frontend.layouts.master')

@section('content')
  {{-- <!--===========================
        BREADCRUMB START
    ============================--> --}}
  <section class="wsus__breadcrumb" style="background: url(images/breadcrumb_bg.jpg);">
    <div class="wsus__breadcrumb_overlay">
      <div class="container">
        <div class="row">
          <div class="col-12 wow fadeInUp">
            <div class="wsus__breadcrumb_text">
              <h1>Review</h1>
              <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Review</li>
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
                <h5>Reviews</h5>
                <p>List all your review</p>
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
                            COURSES NAME
                          </th>
                          <th class="image">
                            RATING
                          </th>
                          <th class="image">
                            REVIEW
                          </th>
                          <th class="image">
                            STATUS
                          </th>
                          <th class="action">
                            ACTION
                          </th>
                        </tr>
                        @forelse ($reviews as $review)
                          <tr>
                            <td class="details">
                              {{ $review->course->title }}
                            </td>
                            <td class="details">
                              {{ $review->rating }}
                            </td>
                            <td class="details">
                              {{ $review->review }}
                            </td>
                            <td class="details">
                              @if ($review->status == 1)
                                <span class="badge bg-success">Approved</span>
                              @else
                                <span class="badge bg-warning">Pending</span>
                              @endif
                            </td> 
                             <td class="action">
                              <a class="del delete-item" href="{{ route('student.reviews.destroy', $review->id) }}"><i class="fas fa-trash-alt"></i></a>
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="10" class="text-center ">
                              <img src="{{ asset('default-files/empty-cart.png') }}" style="width: 100px !important; " alt="">
                              <div>No Data Found</div>
                            </td>
                          </tr>
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
  {{-- <!--===========================
    DASHBOARD OVERVIEW END
    ============================--> --}}
@endsection
