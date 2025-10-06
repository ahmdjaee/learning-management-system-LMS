@extends('frontend.layouts.master')

@section('content')
  {{-- ===========================
        BREADCRUMB START
    ============================ --}}
  <section class="wsus__breadcrumb" style="background: url(images/breadcrumb_bg.jpg);">
    <div class="wsus__breadcrumb_overlay">
      <div class="container">
        <div class="row">
          <div class="col-12 wow fadeInUp">
            <div class="wsus__breadcrumb_text">
              <h1>About Us</h1>
              <ul>
                <li><a href="#">Home</a></li>
                <li>About Us</li>
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
        ABOUT 3 START
    ============================ --}}
  <section class="wsus__about_3 mt_120 xs_mt_100 ">
    <div class="container">
      <div class="row justify-content-between align-items-center">
        <div class="col-lg-6 wow fadeInLeft">
          <div class="wsus__about_3_img">

            <img
              class="about_3_large img-fluid w-100"
              src="{{ $about->image }}"
              alt="About us"
            >

            <div class="text">
              <h4> <span>{{ $about->learner_count }}</span>{{ ' ' . $about->learner_count_text }}</h4>
              <img
                class="img-fluid"
                src="{{ $about->learner_image }}"
                alt="Photo"
              >
            </div>

            @if ($about->round_text)
              <div class="circle_box">
                <svg viewBox="0 0 100 100">
                  <defs>
                    <path id="circle" d="
                          M 50, 50
                          m -37, 0
                          a 37,37 0 1,1 74,0
                          a 37,37 0 1,1 -74,0"></path>
                  </defs>
                  <text>
                    <textPath xlink:href="#circle">
                      {{ $about->round_text }}
                    </textPath>
                  </text>
                </svg>
              </div>
            @endif
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight">
          <div class="wsus__about_3_text">
            <div class="wsus__section_heading heading_left mb_15">
              <h5>Learn More About Us</h5>
              <h2>{{ $about->title }}</h2>
            </div>
            <p>{!! $about->description !!}</p>
            @if ($about->button_text)
              <a class="common_btn" href="{{ $about->button_url }}">{{ $about->button_text }}</a>
            @endif
            @if ($about->video_url)
              <div class="about_video">
                <img
                  class="img-fluid w-100"
                  src="{{ asset($about->video_image) }}"
                  alt="Video"
                >
                {{-- <span>live</span> --}}
                <a
                  class="play_btn venobox"
                  data-autoplay="true"
                  data-vbtype="video"
                  href="{{ $about->video_url }}"
                >
                  <img
                    class="img-fluid"
                    src="{{ asset('frontend/assets/images/play_icon.png') }}"
                    alt="Play"
                  >
                </a>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- ===========================
        ABOUT 3 END
    ============================ --}}

  {{-- ===========================
        COUNTER START
    ============================ --}}
  <section class="wsus__about_counter wsus__counter mt_120 xs_mt_100">
    <div class="container">
      <div class="wsus__counter_bg"
        style="background: url({{ asset('frontend/assets/images/counter_bg.jpg') }});"
      >
        <div class="row">
          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="wsus__single_counter">
              <h2><span class="counter">{{ $counter->counter_1 }}</span>+</h2>
              <p>{{ $counter->title_1 }}</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="wsus__single_counter">
              <h2><span class="counter">{{ $counter->counter_2 }}</span>+</h2>
              <p>{{ $counter->title_2 }}</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="wsus__single_counter">
              <h2><span class="counter">{{ $counter->counter_3 }}</span>+</h2>
              <p>{{ $counter->title_3 }}</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="wsus__single_counter">
              <h2><span class="counter">{{ $counter->counter_4 }}</span>+</h2>
              <p>{{ $counter->title_4 }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- ===========================
        COUNTER END
    ============================ --}}

  {{-- ===========================
        TESTIMONIAL START
    ============================ --}}
  <section class="wsus__testimonial pt_120 xs_pt_80">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 m-auto wow fadeInUp">
          <div class="wsus__section_heading mb_40">
            <h5>Testimonial</h5>
            <h2>Comments From Our Learners</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row testimonial_slider">
      @foreach ($testimonials as $testimonial)
        <div class="col-xl-4 wow fadeInUp">
          <div class="wsus__single_testimonial">
            <p class="rating">
              @for ($i = 0; $i < $testimonial->rating; $i++)
                <i class="fas fa-star"></i>
              @endfor
            </p>
            <p class="description">
              {{ $testimonial->review }}
            </p>
            {{-- <div class="testimonial_logo">
            <img
              class="img-fluid"
              src="{{ asset($testimonial->user_image) }}"
              alt="Testimonial"
            >
          </div> --}}
            <div class="wsus__testimonial_footer">
              <div class="img">
                <img
                  class="img-fluid"
                  src="{{ asset($testimonial->user_image) }}"
                  alt="user"
                >
              </div>
              <h3>
                {{ $testimonial->user_name }}
                <span>{{ $testimonial->user_title }}</span>
              </h3>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </section>

  {{-- ===========================
        TESTIMONIAL END
    ============================ --}}

  {{-- ===========================
        BLOG 4 START
    ============================ --}}
  <section class="blog_4 mt_110 xs_mt_90 pt_120 xs_pt_100 pb_120 xs_pb_100">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 wow fadeInLeft">
          <div class="wsus__section_heading heading_left mb_50">
            <h5>Latest blogs</h5>
            <h2>Our Latest News Feed.</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row blog_4_slider">
      <div class="col-xl-4 wow fadeInUp">
        <div class="wsus__single_blog_4">
          <a class="wsus__single_blog_4_img" href="#">
            <img
              class="img-fluid"
              src="images/blog_4_img_1.jpg"
              alt="Blog"
            >
            <span class="date">March 23, 2024</span>
          </a>
          <div class="wsus__single_blog_4_text">
            <ul>
              <li>
                <span><img
                    class="img-fluid"
                    src="images/user_icon_black.png"
                    alt="User"
                  ></span>
                By Richard Tea
              </li>
              <li>
                <span><img
                    class="img-fluid"
                    src="images/comment_icon_black.png"
                    alt="Comment"
                  ></span>
                3 Comments
              </li>
            </ul>
            <a class="title" href="#">Exploring Learning Landscapes in Academic.</a>
            <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
            <a class="common_btn" href="#">Read More <i class="far fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-xl-4 wow fadeInUp">
        <div class="wsus__single_blog_4">
          <a class="wsus__single_blog_4_img" href="#">
            <img
              class="img-fluid"
              src="images/blog_4_img_2.jpg"
              alt="Blog"
            >
            <span class="date">April 28, 2024</span>
          </a>
          <div class="wsus__single_blog_4_text">
            <ul>
              <li>
                <span><img
                    class="img-fluid"
                    src="images/user_icon_black.png"
                    alt="User"
                  ></span>
                By Doug Lyphe
              </li>
              <li>
                <span><img
                    class="img-fluid"
                    src="images/comment_icon_black.png"
                    alt="Comment"
                  ></span>
                21 Comments
              </li>
            </ul>
            <a class="title" href="#">Uncovering Learning Opportunities in Academia.</a>
            <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
            <a class="common_btn" href="#">Read More <i class="far fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-xl-4 wow fadeInUp">
        <div class="wsus__single_blog_4">
          <a class="wsus__single_blog_4_img" href="#">
            <img
              class="img-fluid"
              src="images/blog_4_img_3.jpg"
              alt="Blog"
            >
            <span class="date">Jan 12, 2024</span>
          </a>
          <div class="wsus__single_blog_4_text">
            <ul>
              <li>
                <span><img
                    class="img-fluid"
                    src="images/user_icon_black.png"
                    alt="User"
                  ></span>
                By Eleanor Fant
              </li>
              <li>
                <span><img
                    class="img-fluid"
                    src="images/comment_icon_black.png"
                    alt="Comment"
                  ></span>
                48 Comments
              </li>
            </ul>
            <a class="title" href="#">Internationally Distinguished Skillful Educators.</a>
            <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
            <a class="common_btn" href="#">Read More <i class="far fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-xl-4 wow fadeInUp">
        <div class="wsus__single_blog_4">
          <a class="wsus__single_blog_4_img" href="#">
            <img
              class="img-fluid"
              src="images/blog_4_img_4.jpg"
              alt="Blog"
            >
            <span class="date">April 28, 2024</span>
          </a>
          <div class="wsus__single_blog_4_text">
            <ul>
              <li>
                <span><img
                    class="img-fluid"
                    src="images/user_icon_black.png"
                    alt="User"
                  ></span>
                By Doug Lyphe
              </li>
              <li>
                <span><img
                    class="img-fluid"
                    src="images/comment_icon_black.png"
                    alt="Comment"
                  ></span>
                21 Comments
              </li>
            </ul>
            <a class="title" href="#">Uncovering Learning Opportunities in Academia.</a>
            <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
            <a class="common_btn" href="#">Read More <i class="far fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- ===========================
        BLOG 4 END
    ============================ --}}
@endsection
