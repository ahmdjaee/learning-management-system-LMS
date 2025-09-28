<section class="wsus__banner_3"
  style="background: url({{ asset('frontend/assets/images/banner_3_bg.png') }});"
>
  <div class="row justify-content-between">
    <div class="col-xl-6 col-lg-6 wow fadeInUp">
      <div class="wsus__banner_3_text">
        @if ($hero->label)
          <h5>{{ $hero->label }}</h5>
        @endif
        <h1>{{ $hero->title }}</h1>
        <p class="description">{{ $hero->sub_title }}</p>
        <div class="wsus__banner_2_btn_area mt_60">
          @if ($hero->button_text)
            <a class="common_btn" href="{{ $hero->button_url }}">{{ $hero->button_text }}<i
                class="far fa-arrow-right" aria-hidden="true"
              ></i>
            </a>
          @endif
          @if ($hero->video_button_text)
            <div class="play_btn_area">
              <a
                class="play_btn venobox vbox-item"
                data-autoplay="true"
                data-vbtype="video"
                href="{{ $hero->video_button_url }}"
              >
                <img
                  class="img-fluid"
                  src="{{ asset('frontend/assets/images/play_icon.png') }}"
                  alt="Play"
                >
              </a>
              <h4>{{ $hero->video_button_text }}</h4>
            </div>
          @endif
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-lg-6 wow fadeInRight">
      <div class="wsus__banner_3_img">
        <div class="img">
          <img
            class="img-fluid"
            src="{{ asset($hero->image) }}"
            alt="Banner"
          >

          <div class="text">
            <h4>{{ $hero->banner_item_title }}</h4>
            <p>{{ $hero->banner_item_sub_title }}</p>
          </div>

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
                  {{ $hero->round_text }}
                </textPath>
              </text>
            </svg>
          </div>

        </div>
      </div>
    </div>
  </div>
  <ul class="wsus__banner_features d-flex flex-wrap">
    <li class="green wow fadeInRight">
      <div class="icon">
        <img
          class="img-fluid"
          src="{{ asset($feature->image_1) }}"
          alt="Features"
        >
      </div>
      <div class="text">
        <h4>{{ $feature->title_1 }}</h4>
        <p>{{$feature->sub_title_1}}</p>
      </div>
    </li>
    <li class="pink wow fadeInRight">
      <div class="icon">
        <img
          class="img-fluid"
          src="{{ asset($feature->image_2) }}"
          alt="Features"
        >
      </div>
      <div class="text">
        <h4>{{ $feature->title_2 }}</h4>
        <p>{{$feature->sub_title_2}}</p>
      </div>
    </li>
    <li class="sky wow fadeInRight">
       <div class="icon">
        <img
          class="img-fluid"
          src="{{ asset($feature->image_3) }}"
          alt="Features"
        >
      </div>
      <div class="text">
        <h4>{{ $feature->title_3 }}</h4>
        <p>{{$feature->sub_title_3}}</p>
      </div>
    </li>
  </ul>
</section>
