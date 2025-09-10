<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"
  />
  <meta name="base_url" content="{{ url('/') }}">
  <meta name="csrf_token" content="{{ csrf_token() }}">
  @stack('meta')

  <title>EduCore - Online Courses & Education HTML Template</title>
  <link
    type="image/png"
    href="images/favicon.png"
    rel="icon"
  >
  <link href="{{ asset('frontend/assets/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/animated_barfiller.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/slick.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/venobox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/scroll_button.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/nice-select.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/pointer.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/jquery.calendar.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/range_slider.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/startRating.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/video_player.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/jquery.simple-bar-graph.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/select2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/sticky_menu.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/animate.css') }}" rel="stylesheet">

  <link href="{{ asset('frontend/assets/css/spacing.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/jquery-ui.min.css') }}" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css" rel="stylesheet">

  @vite(['resources/css/frontend.css', 'resources/js/frontend/frontend.js']);

  <!--dynamic js-->
  @stack('header_scripts')
</head>

<body class="home_3">

  <!--============ PRELOADER START ===========-->
  <div id="preloader">
    <div class="preloader_icon">
      <img
        class="img-fluid"
        src="{{ asset('frontend/assets/images/preloader.png') }}"
        alt="Preloader"
      >
    </div>
  </div>
  <!--============ PRELOADER END ===========-->

  @include('frontend.layouts.header')

  @yield('content')

  <!--===========================
        FOOTER 3 START
    ============================-->
  @include('frontend.layouts.footer')
  <!--===========================
        FOOTER 3 END
    ============================-->

  <!--================================
        SCROLL BUTTON START
    =================================-->
  <div class="progress-wrap">
    <svg
      class="progress-circle svg-content"
      width="100%"
      height="100%"
      viewBox="-1 -1 102 102"
    >
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
  <!--================================
        SCROLL BUTTON END
    =================================-->

  <!-- Modal -->
  <div
    class="modal fade "
    id="dynamicModal"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
    tabindex="-1"
    data-bs-backdrop="static"
  >
    <div class="modal-dialog modal-lg modal-dialog-centered dynamic-modal-content" >

    </div>
  </div>

  <!--jquery library js-->

  <script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
  <!--bootstrap js-->
  <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
  <!--font-awesome js-->
  <script src="{{ asset('frontend/assets/js/Font-Awesome.js') }}"></script>
  <!--marquee js-->
  <script src="{{ asset('frontend/assets/js/jquery.marquee.min.js') }}"></script>
  <!--slick js-->
  <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
  <!--countup js-->
  <script src="{{ asset('frontend/assets/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/jquery.countup.min.js') }}"></script>
  <!--venobox js-->
  <script src="{{ asset('frontend/assets/js/venobox.min.js') }}"></script>
  <!--nice-select js-->
  <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
  <!--Scroll Button js-->
  <script src="{{ asset('frontend/assets/js/scroll_button.js') }}"></script>
  <!--pointer js-->
  {{-- <script src="{{ asset('frontend/assets/js/pointer.js') }}"></script> --}}
  <!--range slider js-->
  <script src="{{ asset('frontend/assets/js/range_slider.js') }}"></script>
  <!--barfiller js-->
  <script src="{{ asset('frontend/assets/js/animated_barfiller.js') }}"></script>
  <!--calendar js-->
  <script src="{{ asset('frontend/assets/js/jquery.calendar.js') }}"></script>
  <!--starRating js-->
  <script src="{{ asset('frontend/assets/js/starRating.js') }}"></script>
  <!--Bar Graph js-->
  <script src="{{ asset('frontend/assets/js/jquery.simple-bar-graph.min.js') }}"></script>
  <!--select2 js-->
  <script src="{{ asset('frontend/assets/js/select2.min.js') }}"></script>
  <!--Video player js-->
  <script src="{{ asset('frontend/assets/js/video_player.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/video_player_youtube.js') }}"></script>
  <!--wow js-->
  <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>

  <!--Jquery UI-->
  <script src="{{ asset('frontend/assets/js/jquery-ui.min.js') }}"></script>

  <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!--main/custom js-->
  <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

  <!--dynamic js-->
  @stack('scripts')

  <script>
    $(function() {
      $('.select_2').select2();
    });
    const notyf = new Notyf({
      duration: 3000
    });
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        notyf.error("{{ $error }}");
      @endforeach
    @endif
  </script>
</body>

</html>
