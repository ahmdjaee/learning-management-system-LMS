@extends('frontend.layouts.master')

@section('content')
  {{-- ===========================
        BREADCRUMB START
    ============================ --}}
  <section class="wsus__breadcrumb"
    style="background: url({{ asset('frontend/assets/images/breadcrumb_bg.jpg') }});"
  >
    <div class="wsus__breadcrumb_overlay">
      <div class="container">
        <div class="row">
          <div class="col-12 wow fadeInUp">
            <div class="wsus__breadcrumb_text">
              <h1>Our Courses</h1>
              <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Our Courses</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- ===========================
        BREADCRUMB END
    ============================ --}}

  {{-- ===========================
        COURSES PAGE START
    ============================ --}}
  <section class="wsus__courses mt_120 xs_mt_100 pb_120 xs_pb_100">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-8 order-2 order-lg-1 wow fadeInLeft">
          <div class="wsus__sidebar">
            <form action="{{ route('courses.index') }}">
              <div class="wsus__sidebar_search">
                <input
                  name="search"
                  type="text"
                  value="{{ request()->search ?? '' }}"
                  placeholder="Search Course"
                >
                <button type="submit">
                  <img
                    class="img-fluid"
                    src="{{ asset('frontend/assets/images/search_icon.png') }}"
                    alt="Search"
                  >
                </button>
              </div>

              <div class="wsus__sidebar_category">
                <h3>Categories</h3>
                <ul class="categoty_list">
                  @foreach ($categories as $category)
                    <li class="">{{ $category->name }}
                      <div class="wsus__sidebar_sub_category">
                        @foreach ($category->subCategories as $subCategory)
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              id="c-{{ $subCategory->id }}"
                              name="category[]"
                              type="checkbox"
                              value="{{ $subCategory->id }}"
                              @checked(is_array(request()->category)
                                      ? in_array($subCategory->id, request()->category ?? [])
                                      : $subCategory->id == request()->category)
                            >
                            <label class="form-check-label" for="c-{{ $subCategory->id }}">
                              {{ $subCategory->name }}
                            </label>
                          </div>
                        @endforeach
                      </div>
                    </li>
                  @endforeach
                </ul>
              </div>

              <div class="wsus__sidebar_course_lavel">
                <h3>Difficulty Level</h3>
                @foreach ($levels as $level)
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      id="l-{{ $level->id }}"
                      name="level[]"
                      type="checkbox"
                      value="{{ $level->id }}"
                      @checked(in_array($level->id, request()->level ?? []))
                    >
                    <label class="form-check-label" for="l-{{ $level->id }}">
                      {{ $level->name }}
                    </label>
                  </div>
                @endforeach
              </div>

              <div class="wsus__sidebar_course_lavel rating">
                <h3>Rating</h3>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    id="flexCheckDefaultr1"
                    type="checkbox"
                    value=""
                  >
                  <label class="form-check-label" for="flexCheckDefaultr1">
                    <i class="fas fa-star"></i> 5 star
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    id="flexCheckDefaultr2"
                    type="checkbox"
                    value=""
                  >
                  <label class="form-check-label" for="flexCheckDefaultr2">
                    <i class="fas fa-star"></i> 4 star or above
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    id="flexCheckDefaultr3"
                    type="checkbox"
                    value=""
                  >
                  <label class="form-check-label" for="flexCheckDefaultr3">
                    <i class="fas fa-star"></i> 3 star or above
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    id="flexCheckDefaultr4"
                    type="checkbox"
                    value=""
                  >
                  <label class="form-check-label" for="flexCheckDefaultr4">
                    <i class="fas fa-star"></i> 2 star or above
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    id="flexCheckDefaultr5"
                    type="checkbox"
                    value=""
                  >
                  <label class="form-check-label" for="flexCheckDefaultr5">
                    <i class="fas fa-star"></i> 1 star or above
                  </label>
                </div>
              </div>

              <div class="wsus__sidebar_course_lavel duration">
                <h3>Language</h3>
                @foreach ($languages as $language)
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      id="lg-{{ $language->id }}"
                      name="language[]"
                      type="checkbox"
                      value="{{ $language->id }}"
                      @checked(in_array($language->id, request()->language ?? []))
                    >
                    <label class="form-check-label" for="lg-{{ $language->id }}">
                      {{ $language->name }}
                    </label>
                  </div>
                @endforeach
              </div>

              <div class="wsus__sidebar_rating">
                <h3>Price Range</h3>
                <div class="range_slider"></div>
              </div>

              <button class="common_btn w-100 mt-3" type="submit">Search</button>
            </form>
          </div>
        </div>
        <div class="col-xl-9 col-lg-8 order-lg-1">
          <div class="wsus__page_courses_header wow fadeInUp">
            {{-- @dd($courses) --}}
            <p>Showing <span>1-{{ $courses->count() }}</span> Of
              <span>{{ $courses->total() }}</span> Results
            </p>
            <form>
              <p>Sort-by:</p>
              <select
                class="select_js"
                name="order"
                onchange="this.form.submit()"
              >
                <option value="desc" @selected(request()->order == 'desc')>Recently added</option>
                <option value="asc" @selected(request()->order == 'asc')>Earliest added</option>
              </select>
            </form>
          </div>
          <div class="row">
            @forelse ($courses as $course)
              <div class="col-xl-4 col-md-6 wow fadeInUp">
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
            @empty
              No course found
            @endforelse
          </div>

          {{-- Pagination --}}
          <div class="wsus__pagination mt_50 wow fadeInUp">

            {{ $courses->withQueryString()->links() }}

          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- ===========================
        COURSES PAGE END
    ============================ --}}
@endsection
