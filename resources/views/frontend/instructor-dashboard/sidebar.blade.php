<div class="col-xl-3 col-md-4 wow fadeInLeft">
  <div class="wsus__dashboard_sidebar">
    <div class="wsus__dashboard_sidebar_top">
      <div class="dashboard_banner">
        <img
          class="img-fluid"
          src="{{ asset('frontend/assets/images/single_topic_sidebar_banner.jpg') }}"
          alt="img"
        >
      </div>
      <div class="img">
        <img
          class="img-fluid w-100"
          src="{{ asset(auth()->user()->image) }}"
          alt="profile"
        >
      </div>
      <h4>{{ auth()->user()->name }}</h4>
      <p>{{ auth()->user()->role }}</p>
    </div>
    <ul class="wsus__dashboard_sidebar_menu">
      <li>
        <a class="active" href="{{ route('instructor.dashboard') }}">
          <div class="img">
            <img
              class="img-fluid w-100"
              src="{{ asset('frontend/assets/images/dash_icon_8.png') }}"
              alt="icon"
            >
          </div>
          Dashboard
        </a>
      </li>
      <li>
        <a href="{{ route('instructor.profile.index') }}">
          <div class="img">
            <img
              class="img-fluid w-100"
              src="{{ asset('frontend/assets/images/dash_icon_1.png') }}"
              alt="icon"
            >
          </div>
          Profile
        </a>
      </li>

      <li>
        <a href="#"
          onclick="event.preventDefault();
                                            $('#logout').submit();"
        >
          <div class="img">
            <img
              class="img-fluid w-100"
              src="{{ asset('frontend/assets/images/dash_icon_16.png') }}"
              alt="icon"
            >
          </div>
          Sign Out
          <form
            id="logout"
            method="POST"
            action="{{ route('logout') }}"
          >
            @csrf
          </form>
        </a>
      </li>
    </ul>
  </div>
</div>
