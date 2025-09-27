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
                <h5>Courses</h5>
                <p>Manage your courses and its update like live, draft and insight.</p>
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
                            COURSES
                          </th>
                          <th class="image">
                            DETAILS
                          </th>
                          <th class="action">
                            ACTION
                          </th>
                        </tr>
                        @forelse ($enrollments as $enrollment)
                          <tr>
                            <td class="image">
                              <div class="image_category">
                                <img
                                  class="img-fluid w-100"
                                  src="{{ asset($enrollment->course->thumbnail) }}"
                                  alt="img"
                                  style="aspect-ratio: 16/9;"
                                >
                              </div>
                            </td>
                            <td class="details">
                              <p class="rating">
                                <i class="fas fa-star" aria-hidden="true"></i>
                                <i class="fas fa-star" aria-hidden="true"></i>
                                <i class="fas fa-star" aria-hidden="true"></i>
                                <i class="fas fa-star-half-alt" aria-hidden="true"></i>
                                <i class="far fa-star" aria-hidden="true"></i>
                                <span>(5.0)</span>
                              </p>
                              <a class="title"
                                href="{{ route('student.enrolled-courses.player.index', $enrollment->course->slug) }}"
                              >
                                {{ $enrollment->course->title }}
                              </a>
                              <div class="text-muted">
                                By {{ $enrollment->course->instructor->name }}
                              </div>
                            </td>
                            <td>
                              <div class="d-flex flex-column gap-2 align-items-center">
                                @php
                                    $watchedHistoryCount = \App\Models\WatchHistory::where(['user_id' => auth()->id(), 'course_id' => $enrollment->course->id, 'is_completed' => 1])->count();
                                    $lessonCount = $enrollment->course->lessons()->count();
                                @endphp
                                @if ($lessonCount == $watchedHistoryCount)
                                <a class="btn btn-sm text-primary"
                                  {{-- style="background-color: rgba(0, 140, 255, 0.067); color: #356DF1; width: fit-content;" --}}
                                  href="{{ route('student.certificate.download', $enrollment->course->id) }}"
                                  target="_blank"
                                >
                                  <i class="fa fa-download"></i>
                                  Certificate
                                </a>    
                                @endif
                                <a class="btn btn-sm btn-primary"
                                  href="{{ route('student.enrolled-courses.player.index', $enrollment->course->slug) }}"
                                  {{-- style="background-color: rgba(0, 140, 255, 0.067); color: #356DF1; width: fit-content;" --}}

                                >
                                  <i class="fa fa-eye"></i>
                                  Watch
                                </a>
                              </div>
                            </td>
                          </tr>
                        @empty
                          No Data Found
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
