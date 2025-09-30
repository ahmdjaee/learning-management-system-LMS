@php
  $category_1 = \App\Models\CourseCategory::where('id', $latestCourses->category_1)->first();
  $category_2 = \App\Models\CourseCategory::where('id', $latestCourses->category_2)->first();
  $category_3 = \App\Models\CourseCategory::where('id', $latestCourses->category_3)->first();
  $category_4 = \App\Models\CourseCategory::where('id', $latestCourses->category_4)->first();
  $category_5 = \App\Models\CourseCategory::where('id', $latestCourses->category_5)->first();

@endphp

<section class="wsus__courses_3 pt_120 xs_pt_100 mt_120 xs_mt_90 pb_120 xs_pb_100">
  <div class="container">

    <div class="row">
      <div class="col-xl-6 m-auto wow fadeInUp">
        <div class="wsus__section_heading mb_45">
          <h5>Featured Courses</h5>
          <h2>Latest Bundle Courses.</h2>
        </div>
      </div>
    </div>

    <div class="row wow fadeInUp">
      <div class="col-xxl-6 col-xl-8 m-auto">
        <div class="wsus__filter_area mb_15">
          <ul
            class="nav nav-pills justify-content-center"
            id="pills-tab"
            role="tablist"
          >
            @if ($category_1)
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="pills-{{ $category_1->id }}-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-{{ $category_1->id }}"
                  type="button"
                  role="tab"
                  aria-controls="pills-{{ $category_1->id }}"
                  aria-selected="true"
                >{{ $category_1->name }}</button>
              </li>
            @endif
            @if ($category_2)
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-{{ $category_2->id }}-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-{{ $category_2->id }}"
                  type="button"
                  role="tab"
                  aria-controls="pills-{{ $category_2->id }}"
                  aria-selected="false"
                >{{ $category_2->name }}</button>
              </li>
            @endif
            @if ($category_3)
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-{{ $category_3->id }}-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-{{ $category_3->id }}"
                  type="button"
                  role="tab"
                  aria-controls="pills-{{ $category_3->id }}"
                  aria-selected="false"
                >{{ $category_3->name }}</button>
              </li>
            @endif
            @if ($category_4)
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-{{ $category_4->id }}-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-{{ $category_4->id }}"
                  type="button"
                  role="tab"
                  aria-controls="pills-{{ $category_4->id }}"
                  aria-selected="false"
                >{{ $category_4->name }}</button>
              </li>
            @endif
            @if ($category_5)
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-{{ $category_5->id }}-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-{{ $category_5->id }}"
                  type="button"
                  role="tab"
                  aria-controls="pills-{{ $category_5->id }}"
                  aria-selected="false"
                >{{ $category_5->name }}</button>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </div>

    <div class="tab-content" id="pills-tabContent">
      @if ($category_1)
        <div
          class="tab-pane fade show active"
          id="pills-{{ $category_1->id }}"
          role="tabpanel"
          aria-labelledby="pills-{{ $category_1->id }}-tab"
          tabindex="0"
        >
          <div class="row">
            @foreach ($category_1->courses()->latest()->take(8)->get() as $course)
              <div class="col-xl-3 col-md-6 col-lg-4">
                <div class="wsus__single_courses_3">
                  <div class="wsus__single_courses_3_img">
                    <img
                      class="img-fluid"
                      src="{{ asset($course->thumbnail) }}"
                      alt="Courses"
                    >
                    <ul>
                      <li>
                        <a href="#">
                          <img
                            class="img-fluid"
                            src="{{ asset('frontend/assets/images/love_icon_black.png') }}"
                            alt="Love"
                          >
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img
                            class="img-fluid"
                            src="{{ asset('frontend/assets/images/compare_icon_black.png') }}"
                            alt="Compare"
                          >
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img
                            class="img-fluid"
                            src="{{ asset('frontend/assets/images/cart_icon_black_2.png') }}"
                            alt="Cart"
                          >
                        </a>
                      </li>
                    </ul>
                    <span class="time"><i class="far fa-clock"></i> 15 Hours</span>
                  </div>
                  <div class="wsus__single_courses_text_3">
                    <div class="rating_area">
                      <!-- <a class="category" href="#">Design</a> -->
                      <p class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>(4.8 Rating)</span>
                      </p>
                    </div>

                    <a class="title"
                      href="{{ route('courses.show', $course->slug) }}">{{ $course->title }}</a>
                    <ul>
                      <li>24 Lessons</li>
                      <li>38 Student</li>
                    </ul>
                    <a class="author" href="#">
                      <div class="img">
                        <img
                          class="img-fluid"
                          src="{{ asset($course->instructor->image) }}"
                          alt="Author"
                        >
                      </div>
                      <h4>{{ $course->instructor->name }}</h4>
                    </a>
                  </div>
                  <div class="wsus__single_courses_3_footer">
                    <a
                      class="common_btn add-to-cart"
                      data-course-id="{{ $course->id }}"
                      href="#"
                    >Add To Cart <i class="far fa-arrow-right"></i></a>
                    <p>
                      @if ($course->price == 0)
                        FREE
                      @elseif ($course->discount > 0)
                        <del>${{ $course->price }}</del>
                        ${{ $course->discount }}
                      @else
                        ${{ $course->price }}
                      @endif
                    </p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <div class="row mt_60 wow fadeInUp">
            <div class="col-12 text-center">
              <a class="common_btn" href="#">Browse More Courses <i
                  class="far fa-angle-right"
                ></i></a>
            </div>
          </div>
        </div>
      @endif
      @if ($category_2)
        <div
          class="tab-pane fade"
          id="pills-{{ $category_2->id }}"
          role="tabpanel"
          aria-labelledby="pills-{{ $category_2->id }}-tab"
          tabindex="0"
        >
          <div class="row">
            @foreach ($category_2->courses()->latest()->take(8)->get() as $course)
              <div class="col-xl-3 col-md-6 col-lg-4">
                <div class="wsus__single_courses_3">
                  <div class="wsus__single_courses_3_img">
                    <img
                      class="img-fluid"
                      src="{{ asset($course->thumbnail) }}"
                      alt="Courses"
                    >
                    <ul>
                      <li>
                        <a href="#">
                          <img
                            class="img-fluid"
                            src="{{ asset('frontend/assets/images/love_icon_black.png') }}"
                            alt="Love"
                          >
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img
                            class="img-fluid"
                            src="{{ asset('frontend/assets/images/compare_icon_black.png') }}"
                            alt="Compare"
                          >
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img
                            class="img-fluid"
                            src="{{ asset('frontend/assets/images/cart_icon_black_2.png') }}"
                            alt="Cart"
                          >
                        </a>
                      </li>
                    </ul>
                    <span class="time"><i class="far fa-clock"></i> 15 Hours</span>
                  </div>
                  <div class="wsus__single_courses_text_3">
                    <div class="rating_area">
                      <!-- <a class="category" href="#">Design</a> -->
                      <p class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>(4.8 Rating)</span>
                      </p>
                    </div>

                    <a class="title"
                      href="{{ route('courses.show', $course->slug) }}">{{ $course->title }}</a>
                    <ul>
                      <li>24 Lessons</li>
                      <li>38 Student</li>
                    </ul>
                    <a class="author" href="#">
                      <div class="img">
                        <img
                          class="img-fluid"
                          src="{{ asset($course->instructor->image) }}"
                          alt="Author"
                        >
                      </div>
                      <h4>{{ $course->instructor->name }}</h4>
                    </a>
                  </div>
                  <div class="wsus__single_courses_3_footer">
                    <a
                      class="common_btn add-to-cart"
                      data-course-id="{{ $course->id }}"
                      href="#"
                    >Add To Cart <i class="far fa-arrow-right"></i></a>
                    <p>
                      @if ($course->price == 0)
                        FREE
                      @elseif ($course->discount > 0)
                        <del>${{ $course->price }}</del>
                        ${{ $course->discount }}
                      @else
                        ${{ $course->price }}
                      @endif
                    </p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <div class="row mt_60 wow fadeInUp">
            <div class="col-12 text-center">
              <a class="common_btn" href="#">Browse More Courses <i
                  class="far fa-angle-right"
                ></i></a>
            </div>
          </div>
        </div>
      @endif
      @if ($category_3)
        <div
          class="tab-pane fade"
          id="pills-{{ $category_3->id }}"
          role="tabpanel"
          aria-labelledby="pills-{{ $category_3->id }}-tab"
          tabindex="0"
        >
          <div class="row">
            @foreach ($category_3->courses()->latest()->take(8)->get() as $course)
              <div class="col-xl-3 col-md-6 col-lg-4">
                <div class="wsus__single_courses_3">
                  <div class="wsus__single_courses_3_img">
                    <img
                      class="img-fluid"
                      src="{{ asset($course->thumbnail) }}"
                      alt="Courses"
                    >
                    <ul>
                      <li>
                        <a href="#">
                          <img
                            class="img-fluid"
                            src="{{ asset('frontend/assets/images/love_icon_black.png') }}"
                            alt="Love"
                          >
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img
                            class="img-fluid"
                            src="{{ asset('frontend/assets/images/compare_icon_black.png') }}"
                            alt="Compare"
                          >
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img
                            class="img-fluid"
                            src="{{ asset('frontend/assets/images/cart_icon_black_2.png') }}"
                            alt="Cart"
                          >
                        </a>
                      </li>
                    </ul>
                    <span class="time"><i class="far fa-clock"></i> 15 Hours</span>
                  </div>
                  <div class="wsus__single_courses_text_3">
                    <div class="rating_area">
                      <!-- <a class="category" href="#">Design</a> -->
                      <p class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>(4.8 Rating)</span>
                      </p>
                    </div>

                    <a class="title"
                      href="{{ route('courses.show', $course->slug) }}">{{ $course->title }}</a>
                    <ul>
                      <li>24 Lessons</li>
                      <li>38 Student</li>
                    </ul>
                    <a class="author" href="#">
                      <div class="img">
                        <img
                          class="img-fluid"
                          src="{{ asset($course->instructor->image) }}"
                          alt="Author"
                        >
                      </div>
                      <h4>{{ $course->instructor->name }}</h4>
                    </a>
                  </div>
                  <div class="wsus__single_courses_3_footer">
                    <a
                      class="common_btn add-to-cart"
                      data-course-id="{{ $course->id }}"
                      href="#"
                    >Add To Cart <i class="far fa-arrow-right"></i></a>
                    <p>
                      @if ($course->price == 0)
                        FREE
                      @elseif ($course->discount > 0)
                        <del>${{ $course->price }}</del>
                        ${{ $course->discount }}
                      @else
                        ${{ $course->price }}
                      @endif
                    </p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <div class="row mt_60 wow fadeInUp">
            <div class="col-12 text-center">
              <a class="common_btn" href="#">Browse More Courses <i
                  class="far fa-angle-right"
                ></i></a>
            </div>
          </div>
        </div>
      @endif
      @if ($category_4)
        <div
          class="tab-pane fade"
          id="pills-{{ $category_4->id }}"
          role="tabpanel"
          aria-labelledby="pills-{{ $category_4->id }}-tab"
          tabindex="0"
        >
          <div class="row">
            @foreach ($category_4->courses()->latest()->take(8)->get() as $course)
              <div class="col-xl-3 col-md-6 col-lg-4">
                <div class="wsus__single_courses_3">
                  <div class="wsus__single_courses_3_img">
                    <img
                      class="img-fluid"
                      src="{{ asset($course->thumbnail) }}"
                      alt="Courses"
                    >
                    <ul>
                      <li>
                        <a href="#">
                          <img
                            class="img-fluid"
                            src="{{ asset('frontend/assets/images/love_icon_black.png') }}"
                            alt="Love"
                          >
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img
                            class="img-fluid"
                            src="{{ asset('frontend/assets/images/compare_icon_black.png') }}"
                            alt="Compare"
                          >
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img
                            class="img-fluid"
                            src="{{ asset('frontend/assets/images/cart_icon_black_2.png') }}"
                            alt="Cart"
                          >
                        </a>
                      </li>
                    </ul>
                    <span class="time"><i class="far fa-clock"></i> 15 Hours</span>
                  </div>
                  <div class="wsus__single_courses_text_3">
                    <div class="rating_area">
                      <!-- <a class="category" href="#">Design</a> -->
                      <p class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>(4.8 Rating)</span>
                      </p>
                    </div>

                    <a class="title"
                      href="{{ route('courses.show', $course->slug) }}">{{ $course->title }}</a>
                    <ul>
                      <li>24 Lessons</li>
                      <li>38 Student</li>
                    </ul>
                    <a class="author" href="#">
                      <div class="img">
                        <img
                          class="img-fluid"
                          src="{{ asset($course->instructor->image) }}"
                          alt="Author"
                        >
                      </div>
                      <h4>{{ $course->instructor->name }}</h4>
                    </a>
                  </div>
                  <div class="wsus__single_courses_3_footer">
                    <a
                      class="common_btn add-to-cart"
                      data-course-id="{{ $course->id }}"
                      href="#"
                    >Add To Cart <i class="far fa-arrow-right"></i></a>
                    <p>
                      @if ($course->price == 0)
                        FREE
                      @elseif ($course->discount > 0)
                        <del>${{ $course->price }}</del>
                        ${{ $course->discount }}
                      @else
                        ${{ $course->price }}
                      @endif
                    </p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <div class="row mt_60 wow fadeInUp">
            <div class="col-12 text-center">
              <a class="common_btn" href="#">Browse More Courses <i
                  class="far fa-angle-right"
                ></i></a>
            </div>
          </div>
        </div>
      @endif
      @if ($category_5)
        <div
          class="tab-pane fade"
          id="pills-{{ $category_5->id }}"
          role="tabpanel"
          aria-labelledby="pills-{{ $category_5->id }}-tab"
          tabindex="0"
        >
          <div class="row">
            @foreach ($category_5->courses()->latest()->take(8)->get() as $course)
              <div class="col-xl-3 col-md-6 col-lg-4">
                <div class="wsus__single_courses_3">
                  <div class="wsus__single_courses_3_img">
                    <img
                      class="img-fluid"
                      src="{{ asset($course->thumbnail) }}"
                      alt="Courses"
                    >
                    <ul>
                      <li>
                        <a href="#">
                          <img
                            class="img-fluid"
                            src="{{ asset('frontend/assets/images/love_icon_black.png') }}"
                            alt="Love"
                          >
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img
                            class="img-fluid"
                            src="{{ asset('frontend/assets/images/compare_icon_black.png') }}"
                            alt="Compare"
                          >
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img
                            class="img-fluid"
                            src="{{ asset('frontend/assets/images/cart_icon_black_2.png') }}"
                            alt="Cart"
                          >
                        </a>
                      </li>
                    </ul>
                    <span class="time"><i class="far fa-clock"></i> 15 Hours</span>
                  </div>
                  <div class="wsus__single_courses_text_3">
                    <div class="rating_area">
                      <!-- <a class="category" href="#">Design</a> -->
                      <p class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>(4.8 Rating)</span>
                      </p>
                    </div>

                    <a class="title"
                      href="{{ route('courses.show', $course->slug) }}">{{ $course->title }}</a>
                    <ul>
                      <li>24 Lessons</li>
                      <li>38 Student</li>
                    </ul>
                    <a class="author" href="#">
                      <div class="img">
                        <img
                          class="img-fluid"
                          src="{{ asset($course->instructor->image) }}"
                          alt="Author"
                        >
                      </div>
                      <h4>{{ $course->instructor->name }}</h4>
                    </a>
                  </div>
                  <div class="wsus__single_courses_3_footer">
                    <a
                      class="common_btn add-to-cart"
                      data-course-id="{{ $course->id }}"
                      href="#"
                    >Add To Cart <i class="far fa-arrow-right"></i></a>
                    <p>
                      @if ($course->price == 0)
                        FREE
                      @elseif ($course->discount > 0)
                        <del>${{ $course->price }}</del>
                        ${{ $course->discount }}
                      @else
                        ${{ $course->price }}
                      @endif
                    </p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <div class="row mt_60 wow fadeInUp">
            <div class="col-12 text-center">
              <a class="common_btn" href="#">Browse More Courses <i
                  class="far fa-angle-right"
                ></i></a>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
</section>
