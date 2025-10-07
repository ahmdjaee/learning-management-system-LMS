@extends('frontend.layouts.master')

@push('meta')
  <meta property="og:title" content="{{ $course->title }}">
  <meta property="og:description" content="{{ $course->seo_description }}">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ asset($course->thumbnail) }}">
  <meta property="og:type" content="Course">
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
                  id="pills-home-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-home"
                  type="button"
                  role="tab"
                  aria-controls="pills-home"
                  aria-selected="true"
                >Overview</button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-profile-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-profile"
                  type="button"
                  role="tab"
                  aria-controls="pills-profile"
                  aria-selected="false"
                >Curriculum</button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-contact-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-contact"
                  type="button"
                  role="tab"
                  aria-controls="pills-contact"
                  aria-selected="false"
                >Instructor</button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-disabled-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-disabled"
                  type="button"
                  role="tab"
                  aria-controls="pills-disabled"
                  aria-selected="false"
                >FAQs</button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-disabled-tab2"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-disabled2"
                  type="button"
                  role="tab"
                  aria-controls="pills-disabled2"
                  aria-selected="false"
                >Review</button>
              </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
              <div
                class="tab-pane fade show active"
                id="pills-home"
                role="tabpanel"
                aria-labelledby="pills-home-tab"
                tabindex="0"
              >
                <div class="wsus__courses_overview box_area">
                  <h3>Course Description</h3>
                  <p>{!! $course->description !!}</p>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="pills-profile"
                role="tabpanel"
                aria-labelledby="pills-profile-tab"
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
                id="pills-contact"
                role="tabpanel"
                aria-labelledby="pills-contact-tab"
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
                id="pills-disabled"
                role="tabpanel"
                aria-labelledby="pills-disabled-tab"
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
                id="pills-disabled2"
                role="tabpanel"
                aria-labelledby="pills-disabled-tab2"
                tabindex="0"
              >
                <div class="wsus__courses_review box_area">
                  <h3>Customer Reviews</h3>
                  <div class="row align-items-center mb_50">
                    <div class="col-xl-4 col-md-6">
                      <div class="total_review">
                        <h2>4.7</h2>
                        <p>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
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
                            <span class="fill" data-percentage="85"></span>
                          </div>
                          <span class="qnty">87</span>
                        </div>
                        <div class="review_bar_single">
                          <p>4 <i class="fas fa-star"></i></p>
                          <div class="barfiller" id="bar2">
                            <div class="tipWrap">
                              <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="70"></span>
                          </div>
                          <span class="qnty">69</span>
                        </div>
                        <div class="review_bar_single">
                          <p>3 <i class="fas fa-star"></i></p>
                          <div class="barfiller" id="bar3">
                            <div class="tipWrap">
                              <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="50"></span>
                          </div>
                          <span class="qnty">44</span>
                        </div>
                        <div class="review_bar_single">
                          <p>2 <i class="fas fa-star"></i></p>
                          <div class="barfiller" id="bar4">
                            <div class="tipWrap">
                              <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="30"></span>
                          </div>
                          <span class="qnty">29</span>
                        </div>
                        <div class="review_bar_single">
                          <p>1 <i class="fas fa-star"></i></p>
                          <div class="barfiller" id="bar5">
                            <div class="tipWrap">
                              <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="10"></span>
                          </div>
                          <span class="qnty">12</span>
                        </div>

                      </div>
                    </div>
                  </div>
                  <h3>Reviews</h3>
                  <div class="wsus__course_single_reviews">
                    <div class="wsus__single_review_img">
                      <img
                        class="img-fluid"
                        src="images/testimonial_user_1.png"
                        alt="user"
                      >
                    </div>
                    <div class="wsus__single_review_text">
                      <h4>Dominic L. Ement</h4>
                      <h6> March 23,2024 at 8:37 pm
                        <span>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                        </span>
                      </h6>
                      <p>Donec vel mauris at lectus iaculis elementum vel vel
                        lacus. Sed finibus velit vitae risus imperdiet placerat. Ut posuere eros
                        ut molestie rhoncus. Duis eget ex elementum, ultricies dolor sed,
                        hendrerit diam. Donec ut blandit nunc, et tempus lorem.</p>
                    </div>
                  </div>
                  <div class="wsus__course_single_reviews">
                    <div class="wsus__single_review_img">
                      <img
                        class="img-fluid"
                        src="images/testimonial_user_2.png"
                        alt="user"
                      >
                    </div>
                    <div class="wsus__single_review_text">
                      <h4>Smith jhon</h4>
                      <h6> March 23,2024 at 8:37 pm
                        <span>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                        </span>
                      </h6>
                      <p>Donec vel mauris at lectus iaculis elementum vel vel
                        lacus. Sed finibus velit vitae risus imperdiet placerat. Ut posuere eros
                        ut molestie rhoncus. Duis eget ex elementum, ultricies dolor sed,
                        hendrerit diam. Donec ut blandit nunc, et tempus lorem.</p>
                    </div>
                  </div>
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
                          <button class="common_btn mt-3" type="submit">Post Review</button>
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
  </script>
@endpush
