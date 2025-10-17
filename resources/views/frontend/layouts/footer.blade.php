@php
  $footer = \App\Models\Footer::first();
  $socialLinks = \App\Models\SocialLink::where('status', 1)->get();
  $usefulLinks = \App\Models\UsefulLink::where('status', 1)->get();
  $moreLinks = \App\Models\MoreLink::where('status', 1)->get();
@endphp

<footer class="footer_3"
  style="background: url({{ asset('frontend/assets/images/footer_3_bg.jpg') }});"
>
  <div class="footer_3_overlay pt_120 xs_pt_100">
    <div class="wsus__footer_bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 wow fadeInUp">
            <div class="wsus__footer_3_logo_area">
              <a class="logo" href="/">
                <img
                  class="img-fluid"
                  src="{{ asset(config('settings.site_logo')) }}"
                  alt="EduCore"
                >
              </a>
              <p>{{ $footer?->description }}</p>
              <h2>Follow Us On</h2>
              <ul class="d-flex flex-wrap">
                @foreach ($socialLinks as $social)
                  <li><a href="{{ $social->url }}" target="_blank"><img
                        src="{{ $social->icon }}"
                        srcset=""
                        alt=""
                        style="width: 16px !important; height: 16px !important;"
                      ></a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-sm-6 col-md-3 wow fadeInUp">
            <div class="wsus__footer_link">
              <h2>Useful Links</h2>
              <ul>
                @foreach ($usefulLinks as $link)
                  <li><a href="{{ $link->url }}">{{ $link->title }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-sm-6 col-md-3 wow fadeInUp">
            <div class="wsus__footer_link">
              <h2>More Links</h2>
              <ul>

                @foreach ($moreLinks as $link)
                  <li><a href="{{ $link->url }}">{{ $link->title }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp">
            <div class="wsus__footer_3_subscribe">
              <h3>Connect with us</h3>
              <ul>
                <li>
                  <div class="icon">
                    <img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/mail_icon_white.png') }}"
                      alt="Email"
                    >
                  </div>
                  <div class="text">
                    <h4>Email us:</h4>
                    <a href="mailto:{{ $footer?->email }}">{{ $footer?->email }}</a>
                  </div>
                </li>
                <li>
                  <div class="icon">
                    <img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/call_icon_white.png') }}"
                      alt="Call"
                    >
                  </div>
                  <div class="text">
                    <h4>Call us:</h4>
                    <a href="callto:{{ $footer?->phone }}">{{ $footer?->phone }}</a>
                  </div>
                </li>
                <li>
                  <div class="icon">
                    <img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/location_icon_white.png') }}"
                      alt="Call"
                    >
                  </div>
                  <div class="text">
                    <h4>Office:</h4>
                    <p>{{ $footer?->address }}</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="wsus__footer_copyright_area mt_140 xs_mt_100">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="wsus__footer_copyright_text">
              <p>{{ $footer?->copyright }}</p>
              <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Term of Service</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
