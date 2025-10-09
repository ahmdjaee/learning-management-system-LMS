@extends('frontend.layouts.master')

@push('meta')
  <meta property="og:title" content="{{ $course->title }}">
  <meta property="og:description" content="{{ $course->seo_description }}">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ asset($course->thumbnail) }}">
  <meta property="og:type" content="Course">
@endpush

@push('header_scripts')
  <style>
    .pagination {
      display: flex;
      justify-content: center;
      gap: 6px;
    }

    .pagination .page-item .page-link {
      border: none;
      color: #555;
      background: #f8f9fa;
      border-radius: 50%;
      padding: 8px 14px;
      font-weight: 500;
      transition: all 0.25s ease;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .pagination .page-item .page-link:hover {
      background: #007bff;
      color: #fff;
      transform: translateY(-1px);
      box-shadow: 0 2px 6px rgba(0, 123, 255, 0.4);
    }

    .pagination .page-item.active .page-link {
      background: #007bff;
      color: white;
      font-weight: 600;
      box-shadow: 0 2px 6px rgba(0, 123, 255, 0.3);
    }

    .pagination .page-item.disabled .page-link {
      background: #e9ecef;
      color: #aaa;
      cursor: not-allowed;
      box-shadow: none;
    }

    /* Optional: ubah simbol previous/next jadi lebih halus */
    .pagination .page-link[aria-label="« Previous"],
    .pagination .page-link[aria-label="Next »"] {
      font-weight: bold;
    }
  </style>
@endpush

@section('content')
  <!--===========================
                                    BREADCRUMB START
                                ============================-->
  <section class="wsus__breadcrumb course_details_breadcrumb"
    style="background: url({{ asset('frontend/assets/images/breadcrumb_bg.jpg') }});"
  >
    <div class="wsus__breadcrumb_overlay">
      <div class="container">
        <div class="row">
          <div class="col-12 wow fadeInUp">
            <div class="wsus__breadcrumb_text">
              <p class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <span>(4 Reviews)</span>
              </p>
              <h1>{{ $course->title }}</h1>
              <ul class="list">
                <li>
                  <span><img
                      class="img-fluid"
                      src="{{ asset($course->instructor->image) }}"
                      alt="user"
                    ></span>
                  By {{ $course->instructor->name }}
                </li>
                <li>
                  <span><img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/globe_icon_blue.png') }}"
                      alt="Globe"
                    ></span>
                  {{ $course->category->name }}
                </li>
                <li>
                  <span><img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/calendar_blue.png') }}"
                      alt="Calendar"
                    ></span>
                  Last updated {{ date('d/M/Y', strtotime($course->updated_at)) }}
                </li>
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
                                    COURSES DETAILS START
                                ============================-->
  <section class="wsus__courses_details pb_120 xs_pb_100">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 wow fadeInLeft">
          <div class="wsus__courses_details_area mt_40">

            <ul
              class="nav nav-pills mb_40"
              id="pills-tab"
              role="tablist"
            >
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="pills-overview-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-overview"
                  type="button"
                  role="tab"
                  aria-controls="pills-overview"
                  aria-selected="true"
                >Overview</button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-curriculum-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-curriculum"
                  type="button"
                  role="tab"
                  aria-controls="pills-curriculum"
                  aria-selected="false"
                >Curriculum</button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-instructor-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-instructor"
                  type="button"
                  role="tab"
                  aria-controls="pills-instructor"
                  aria-selected="false"
                >Instructor</button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-review-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-review"
                  type="button"
                  role="tab"
                  aria-controls="pills-review"
                  aria-selected="false"
                >FAQs</button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-review-tab2"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-review2"
                  type="button"
                  role="tab"
                  aria-controls="pills-review2"
                  aria-selected="false"
                >Review</button>
              </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
              <div
                class="tab-pane fade show active"
                id="pills-overview"
                role="tabpanel"
                aria-labelledby="pills-overview-tab"
                tabindex="0"
              >
                <div class="wsus__courses_overview box_area">
                  <h3>Course Description</h3>
                  <p>{!! $course->description !!}</p>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="pills-curriculum"
                role="tabpanel"
                aria-labelledby="pills-curriculum-tab"
                tabindex="0"
              >
                <div class="wsus__courses_curriculum box_area">
                  <h3>Course Curriculum</h3>
                  <div class="accordion" id="accordionExample">
                    @foreach ($course->chapters as $chapter)
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button
                            class="accordion-button collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapse-{{ $chapter->id }}"
                            type="button"
                            aria-expanded="false"
                            aria-controls="collapse-{{ $chapter->id }}"
                          >
                            {{ $chapter->title }}
                          </button>
                        </h2>
                        <div
                          class="accordion-collapse collapse "
                          id="collapse-{{ $chapter->id }}"
                          data-bs-parent="#accordionExample"
                        >
                          <div class="accordion-body">
                            <ul>
                              @foreach ($chapter->lessons as $lesson)
                                <li class="{{ $lesson->is_preview ? 'active' : '' }}">
                                  <p>{{ $lesson->title }}</p>
                                  @if ($lesson->is_preview == 1)
                                    <a
                                      class="right_text venobox vbox-item"
                                      data-autoplay="true"
                                      data-vbtype="video"
                                      href="{{ $lesson->file_path }}"
                                    >Preview</a>
                                  @else
                                    <span
                                      class="right_text">{{ convertMinutesToHours((int) $lesson->duration) }}</span>
                                  @endif
                                </li>
                              @endforeach
                            </ul>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="pills-instructor"
                role="tabpanel"
                aria-labelledby="pills-instructor-tab"
                tabindex="0"
              >
                <div class="wsus__courses_instructor box_area">
                  <h3>Instructor Details</h3>
                  <div class="row align-items-center">
                    <div class="col-lg-4 col-md-6">
                      <div class="wsus__courses_instructor_img">
                        <img
                          class="img-fluid"
                          src="{{ asset($course->instructor->image) }}"
                          alt="Instructor"
                        >
                      </div>
                    </div>
                    <div class="col-lg-8 col-md-6">
                      <div class="wsus__courses_instructor_text">
                        <h4>{{ $course->instructor->name }}</h4>
                        <p class="designation">{{ $course->instructor->headline }}</p>
                        <ul class="list">
                          <li><i class="fas fa-star"></i> <b>74,537 Reviews</b></li>
                          <li><strong>4.7 Rating</strong></li>
                          <li>
                            <span><img
                                class="img-fluid"
                                src="{{ asset('frontend/assets/images/book_icon.png') }}"
                                alt="book"
                              ></span>
                            {{ $course->instructor->courses()->count() }} Courses
                          </li>
                          <li>
                            <span><img
                                class="img-fluid"
                                src="{{ asset('frontend/assets/images/user_icon_gray.png') }}"
                                alt="user"
                              ></span>
                            32 Students
                          </li>
                        </ul>
                        <ul class="badge d-flex flex-wrap">
                          <li
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            data-bs-title="Exclusive Author"
                          >
                            <img
                              class="img-fluid"
                              src="{{ asset('frontend/assets/images/badge_1.png') }}"
                              alt="Badge"
                            >
                          </li>
                          <li
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            data-bs-title="Top Earning"
                          ><img
                              class="img-fluid"
                              src="{{ asset('frontend/assets/images/badge_2.png') }}"
                              alt="Badge"
                            ></li>
                          <li
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            data-bs-title="Trending"
                          ><img
                              class="img-fluid"
                              src="{{ asset('frontend/assets/images/badge_3.png') }}"
                              alt="Badge"
                            ></li>
                          <li
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            data-bs-title="2 Years of Membership"
                          ><img
                              class="img-fluid"
                              src="{{ asset('frontend/assets/images/badge_4.png') }}"
                              alt="Badge"
                            ></li>
                          <li
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            data-bs-title="Collector Lavel 1"
                          >
                            <img
                              class="img-fluid"
                              src="{{ asset('frontend/assets/images/badge_5.png') }}"
                              alt="Badge"
                            >
                          </li>
                        </ul>
                        <p class="description">
                          {{ $course?->instructor->bio }}
                        </p>
                        <ul class="link d-flex flex-wrap">
                          @if ($course->instructor->x)
                            <li><a href="{{ $course->instructor->x }}"><i
                                  class="fab fa-twitter"></i></a></li>
                          @endif

                          @if ($course->instructor->facebook)
                            <li><a href="{{ $course->instructor->facebook }}"><i
                                  class="fab fa-facebook-f"
                                ></i></a></li>
                          @endif

                          @if ($course->instructor->linkedin)
                            <li><a href="{{ $course->instructor->linkedin }}"><i
                                  class="fab fa-linkedin-in"
                                ></i></a></li>
                          @endif

                          @if ($course->instructor->website)
                            <li><a href="{{ $course->instructor->website }}"><i
                                  class="fab fa-firefox-browser"
                                ></i></a></li>
                          @endif

                          @if ($course->instructor->github)
                            <li><a href="{{ $course->instructor->github }}"><i
                                  class="fab fa-github"
                                ></i></a></li>
                          @endif
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="pills-review"
                role="tabpanel"
                aria-labelledby="pills-review-tab"
                tabindex="0"
              >
                <div class="wsus__course_faq box_area">
                  <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button
                          class="accordion-button"
                          data-bs-toggle="collapse"
                          data-bs-target="#flush-collapseOne"
                          type="button"
                          aria-expanded="false"
                          aria-controls="flush-collapseOne"
                        >
                          How long it take to create a video course?
                        </button>
                      </h2>
                      <div
                        class="accordion-collapse collapse show"
                        id="flush-collapseOne"
                        data-bs-parent="#accordionFlushExample"
                      >
                        <div class="accordion-body">
                          Sed mi leo, accumsan vel ante at, viverra placerat nulla. Donec
                          pharetra rutrum
                          ullamcorpe Ut eget convallis mi. Sed cursus aliquam eitu Nula sed
                          allium lectus
                          fermentum enim Nam maximus pretium consectetu lacinia finibus ipsum,
                          eget
                          fermentum nulla Pellentesque id facilisis magna dictum.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#flush-collapseTwo"
                          type="button"
                          aria-expanded="false"
                          aria-controls="flush-collapseTwo"
                        >
                          What kind of support does EduCore provide?
                        </button>
                      </h2>
                      <div
                        class="accordion-collapse collapse"
                        id="flush-collapseTwo"
                        data-bs-parent="#accordionFlushExample"
                      >
                        <div class="accordion-body">
                          Sed mi leo, accumsan vel ante at, viverra placerat nulla. Donec
                          pharetra rutrum
                          ullamcorpe Ut eget convallis mi. Sed cursus aliquam eitu Nula sed
                          allium lectus
                          fermentum enim Nam maximus pretium consectetu lacinia finibus ipsum,
                          eget
                          fermentum nulla Pellentesque id facilisis magna dictum.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#flush-collapseThree"
                          type="button"
                          aria-expanded="false"
                          aria-controls="flush-collapseThree"
                        >
                          How long do I get support & updates?
                        </button>
                      </h2>
                      <div
                        class="accordion-collapse collapse"
                        id="flush-collapseThree"
                        data-bs-parent="#accordionFlushExample"
                      >
                        <div class="accordion-body">Placeholder content for this accordion,
                          Sed mi leo, accumsan vel ante at, viverra placerat nulla. Donec
                          pharetra rutrum
                          ullamcorpe Ut eget convallis mi. Sed cursus aliquam eitu Nula sed
                          allium lectus
                          fermentum enim Nam maximus pretium consectetu lacinia finibus ipsum,
                          eget
                          fermentum nulla Pellentesque id facilisis magna dictum.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#flush-collapseThree3"
                          type="button"
                          aria-expanded="false"
                          aria-controls="flush-collapseThree"
                        >
                          How can I contact a school directly?
                        </button>
                      </h2>
                      <div
                        class="accordion-collapse collapse"
                        id="flush-collapseThree3"
                        data-bs-parent="#accordionFlushExample"
                      >
                        <div class="accordion-body">
                          Sed mi leo, accumsan vel ante at, viverra placerat nulla. Donec
                          pharetra rutrum
                          ullamcorpe Ut eget convallis mi. Sed cursus aliquam eitu Nula sed
                          allium lectus
                          fermentum enim Nam maximus pretium consectetu lacinia finibus ipsum,
                          eget
                          fermentum nulla Pellentesque id facilisis magna dictum.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div
                class="tab-pane fade"
                id="pills-review2"
                role="tabpanel"
                aria-labelledby="pills-review-tab2"
                tabindex="0"
              >
                <div class="wsus__courses_review box_area">
                  <h3>Customer Reviews</h3>
                  <div class="row align-items-center mb_50">
                    <div class="col-xl-4 col-md-6">
                      <div class="total_review">
                        <h2>{{ number_format($course->reviews()->avg('rating'), 1) ?? 0 }}</h2>
                        <p>
                          @for ($i = 0; $i < number_format($course->reviews()->avg('rating'), 1) ?? 0; $i++)
                            <i class="fas fa-star"></i>
                          @endfor
                        </p>
                        <h4>3 Ratings</h4>
                      </div>
                    </div>
                    <div class="col-xl-8 col-md-6">
                      <div class="review_bar">
                        <div class="review_bar_single">
                          <p>5 <i class="fas fa-star"></i></p>
                          <div class="barfiller" id="bar1">
                            <div class="tipWrap">
                              <span class="tip"></span>
                            </div>
                            <span class="fill"
                              data-percentage="{{ $course->reviews()->count() != 0 ? number_format($course->reviews()->where('rating', 5)->count() / $course->reviews()->count()) * 100 : 0 }}"
                            ></span>
                          </div>
                          <span
                            class="qnty">{{ $course->reviews()->where('rating', 5)->count() }}</span>
                        </div>
                        <div class="review_bar_single">
                          <p>4 <i class="fas fa-star"></i></p>
                          <div class="barfiller" id="bar2">
                            <div class="tipWrap">
                              <span class="tip"></span>
                            </div>
                            <span class="fill"
                              data-percentage="{{ $course->reviews()->count() != 0 ? number_format($course->reviews()->where('rating', 4)->count() / $course->reviews()->count()) * 100 : 0 }}"
                            ></span>
                          </div>
                          <span
                            class="qnty">{{ $course->reviews()->where('rating', 4)->count() }}</span>
                        </div>
                        <div class="review_bar_single">
                          <p>3 <i class="fas fa-star"></i></p>
                          <div class="barfiller" id="bar3">
                            <div class="tipWrap">
                              <span class="tip"></span>
                            </div>
                            <span class="fill"
                              data-percentage="{{ $course->reviews()->count() != 0 ? number_format($course->reviews()->where('rating', 3)->count() / $course->reviews()->count()) * 100 : 0 }}"
                            ></span>
                          </div>
                          <span
                            class="qnty">{{ $course->reviews()->where('rating', 3)->count() }}</span>
                        </div>
                        <div class="review_bar_single">
                          <p>2 <i class="fas fa-star"></i></p>
                          <div class="barfiller" id="bar4">
                            <div class="tipWrap">
                              <span class="tip"></span>
                            </div>
                            <span class="fill"
                              data-percentage="{{ $course->reviews()->count() != 0 ? number_format($course->reviews()->where('rating', 2)->count() / $course->reviews()->count()) * 100 : 0 }}"
                            ></span>
                          </div>
                          <span
                            class="qnty">{{ $course->reviews()->where('rating', 2)->count() }}</span>
                        </div>
                        <div class="review_bar_single">
                          <p>1 <i class="fas fa-star"></i></p>
                          <div class="barfiller" id="bar5">
                            <div class="tipWrap">
                              <span class="tip"></span>
                            </div>
                            <span class="fill"
                              data-percentage="{{ $course->reviews()->count() != 0 ? number_format($course->reviews()->where('rating', 1)->count() / $course->reviews()->count()) * 100 : 0 }}"
                            ></span>
                          </div>
                          <span
                            class="qnty">{{ $course->reviews()->where('rating', 1)->count() }}</span>
                        </div>

                      </div>
                    </div>
                  </div>
                  <h3>Reviews</h3>
                  @foreach ($reviews as $review)
                    <div class="wsus__course_single_reviews">
                      <div class="wsus__single_review_img">
                        <img
                          class="img-fluid"
                          src="{{ asset($review->user->image) }}"
                          alt="user"
                        >
                      </div>
                      <div class="wsus__single_review_text">
                        <h4>{{ $review->user->name }}</h4>
                        <h6> {{ date('d m y', strtotime($review->created_at)) }}
                          <span>
                            @for ($i = 0; $i < $review->rating; $i++)
                              <i class="fas fa-star"></i>
                            @endfor
                          </span>
                        </h6>
                        <p>{{ $review->review }}</p>
                      </div>
                    </div>
                  @endforeach
                  <br>
                  {{ $reviews->links() }}
                </div>
                @auth
                  <div class="wsus__courses_review_input box_area mt_40">
                    <h3>Write a Review</h3>
                    <p class="short_text">Your email address will not be published. Required fields are
                      marked *</p>
                    <div class="select_rating d-flex flex-wrap">Your Rating:
                      <ul id="starRating" data-stars="5"></ul>
                    </div>

                    <form method="post" action="{{ route('review.store') }}">
                      @csrf
                      <input
                        name="rating"
                        type="hidden"
                        value=""
                      >
                      <input
                        name="course_id"
                        type="hidden"
                        value="{{ $course->id }}"
                      >
                      <div class="row">
                        <div class="col-xl-12">
                          <textarea
                            name="review"
                            rows="7"
                            placeholder="Write your review here.."
                          ></textarea>
                        </div>
                        <div class="col-12">
                          <button class="common_btn mt-3" type="submit">Submit Review</button>
                        </div>
                      </div>
                    </form>
                  </div>
                @else
                  <div class="alert alert-info text-center mt-3" role="alert">
                    Please <a href="/login"><b>Login</b></a> First To Write A Review
                  </div>

                @endauth
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-8 wow fadeInRight">
          <div class="wsus__courses_sidebar">
            <div class="wsus__courses_sidebar_video">
              <img
                class="img-fluid"
                src="{{ asset($course->thumbnail) }}"
                alt="Video"
              >
              @if ($course->demo_video_source)
                <a
                  class="play_btn venobox vbox-item"
                  data-autoplay="true"
                  data-vbtype="video"
                  href="{{ $course->demo_video_source }}"
                >
                  <img
                    class="img-fluid"
                    src="{{ asset('frontend/assets/images/play_icon_white.png') }}"
                    alt="Play"
                  >
                </a>
              @endif
            </div>
            <h3 class="wsus__courses_sidebar_price">
              @if ($course->price == 0)
                FREE
              @elseif ($course->discount > 0)
                <del>${{ $course->price }}</del>
                ${{ $course->discount }}
              @else
                ${{ $course->price }}
              @endif
            </h3>
            <div class="wsus__courses_sidebar_list_info">
              <ul>
                <li>
                  <p>
                    <span><img
                        class="img-fluid"
                        src="{{ asset('frontend/assets/images/clock_icon_black.png') }}"
                        alt="clock"
                      ></span>
                    Course Duration
                  </p>
                  {{ convertMinutesToHours($course->duration) }}
                </li>
                <li>
                  <p>
                    <span><img
                        class="img-fluid"
                        src="{{ asset('frontend/assets/images/network_icon_black.png') }}"
                        alt="network"
                      ></span>
                    Skill Level
                  </p>
                  {{ $course->level->name }}
                </li>
                <li>
                  <p>
                    <span><img
                        class="img-fluid"
                        src="{{ asset('frontend/assets/images/user_icon_black_2.png') }}"
                        alt="User"
                      ></span>
                    Student Enrolled
                  </p>
                  47
                </li>
                <li>
                  <p>
                    <span><img
                        class="img-fluid"
                        src="{{ asset('frontend/assets/images/language_icon_black.png') }}"
                        alt="Language"
                      ></span>
                    Language
                  </p>
                  {{ $course->language->name }}
                </li>
              </ul>
              <a class="common_btn" href="#">Enroll The Course <i
                  class="far fa-arrow-right"></i></a>
            </div>
            <div class="wsus__courses_sidebar_share_btn d-flex flex-wrap justify-content-between">
              <a class="common_btn" href="#"><i class="far fa-heart"></i> Add to Wishlist</a>
            </div>
            <div class="wsus__courses_sidebar_share_area">
              <span>Share:</span>
              <ul>
                <li class="ez-facebook"><a href="#"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="ez-linkedin"><a href="#"><i class="fab fa-linkedin-in"></i></a>
                </li>
                <li class="ez-x"><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="ez-pinterest"><a href="#"><i class="fab fa-pinterest"></i></a>
                </li>
              </ul>
            </div>
            <div class="wsus__courses_sidebar_info">
              <h3>This Course Includes</h3>
              <ul>
                <li>
                  <span><img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/video_icon_black.png') }}"
                      alt="video"
                    ></span>
                  {{ convertMinutesToHours($course->duration) }} Video Lectures
                </li>
                @if ($course->certificate)
                  <li>
                    <span><img
                        class="img-fluid"
                        src="{{ asset('frontend/assets/images/certificate_icon_black.png') }}"
                        alt="Certificate"
                      ></span>
                    Certificate of Completion
                  </li>
                @endif
                <li>
                  <span><img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/life_time_icon.png') }}"
                      alt="Certificate"
                    ></span>
                  Course Lifetime Access
                </li>
              </ul>

            </div>
            <div class="wsus__courses_sidebar_instructor">
              <div class="image_area d-flex flex-wrap align-items-center">
                <div class="img">
                  <img
                    class="img-fluid"
                    src="{{ asset($course->instructor->image) }}"
                    alt="Instructor"
                  >
                </div>
                <div class="text">
                  <h3>{{ $course->instructor->name }}</h3>
                  <p><span>Instructor</span> Level 2</p>
                </div>
              </div>
              <ul class="d-flex flex-wrap">
                <li
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  data-bs-title="Exclusive Author"
                >
                  <img
                    class="img-fluid"
                    src="{{ asset('frontend/assets/images/badge_1.png') }}"
                    alt="Badge"
                  >
                </li>
                <li
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  data-bs-title="Top Earning"
                ><img
                    class="img-fluid"
                    src="{{ asset('frontend/assets/images/badge_2.png') }}"
                    alt="Badge"
                  ></li>
                <li
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  data-bs-title="Trending"
                ><img
                    class="img-fluid"
                    src="{{ asset('frontend/assets/images/badge_3.png') }}"
                    alt="Badge"
                  ></li>
                <li
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  data-bs-title="2 Years of Membership"
                ><img
                    class="img-fluid"
                    src="{{ asset('frontend/assets/images/badge_4.png') }}"
                    alt="Badge"
                  ></li>
                <li
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  data-bs-title="Collector Lavel 1"
                >
                  <img
                    class="img-fluid"
                    src="{{ asset('frontend/assets/images/badge_5.png') }}"
                    alt="Badge"
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--===========================
                                    COURSES DETAILS END
                                ============================-->
@endsection

@push('scripts')
  <script src="https://cdn.jsdelivr.net/gh/shakilahmed0369/ez-share/dist/ez-share.min.js"></script>
  <script>
    $(function() {

      $('#starRating li').on('click', function() {
        var starRating = $('#starRating').find('.active').length;

        $("input[name=rating]").val(starRating);
      });
    });

    function initHistoryTabs(tabSelector, paginationSelector = ".pagination") {
      const tabContainer = document.querySelector(tabSelector);
      if (!tabContainer) return;

      const tabs = tabContainer.querySelectorAll('[data-bs-toggle="pill"]');

      // ======= Fungsi: Aktifkan tab tertentu =======
      function activateTabById(tabId, push = false) {
        const tabButton = tabContainer.querySelector(`[data-bs-target="${tabId}"]`);
        if (!tabButton) return;

        const tab = new bootstrap.Tab(tabButton);
        tab.show();

        // Update URL
        const url = new URL(window.location);
        url.searchParams.set("tab", tabId.replace("#", ""));

        if (push) {
          history.pushState({
            tab: tabId
          }, "", url);
        } else {
          // replace agar tidak bikin history baru
          history.replaceState({
            tab: tabId
          }, "", url);
        }

        updatePaginationLinks(paginationSelector, tabId.replace("#", ""));
      }

      // ======= Fungsi: Update pagination link Laravel =======
      function updatePaginationLinks(paginationSelector, tabParam) {
        const paginationLinks = document.querySelectorAll(`${paginationSelector} a.page-link`);
        paginationLinks.forEach(link => {
          try {
            const url = new URL(link.href);
            url.searchParams.set("tab", tabParam);
            link.href = url.toString();
          } catch (err) {
            console.warn("Invalid pagination link:", link.href);
          }
        });
      }

      // ======= Saat tab diklik =======
      tabs.forEach(tabBtn => {
        tabBtn.addEventListener("shown.bs.tab", e => {
          const target = e.target.getAttribute("data-bs-target");
          activateTabById(target, true);
        });
      });

      // ======= Saat tombol Back/Forward browser =======
      window.addEventListener("popstate", e => {
        const tabId =
          e.state?.tab ||
          `#${new URL(window.location).searchParams.get("tab")}`;
        if (tabId) activateTabById(tabId);
      });

      // ======= Saat halaman pertama kali dimuat =======
      const urlParams = new URL(window.location).searchParams;
      const tabParam = urlParams.get("tab");
      const initialTab = tabParam ?
        `#${tabParam}` :
        tabs[0]?.getAttribute("data-bs-target"); // default tab pertama

      if (initialTab) {
        // Aktifkan tab pertama dan ubah URL-nya (replace, bukan push)
        activateTabById(initialTab, false);

        // Langsung replaceState agar URL berubah tapi history lama dihapus
        const url = new URL(window.location);
        url.searchParams.set("tab", initialTab.replace("#", ""));
        history.replaceState({
          tab: initialTab
        }, "", url);

        updatePaginationLinks(paginationSelector, initialTab.replace("#", ""));
      }
    }

    // 🚀 Inisialisasi
    document.addEventListener("DOMContentLoaded", () => {
      initHistoryTabs("#pills-tab", ".pagination");
    });
  </script>
@endpush
