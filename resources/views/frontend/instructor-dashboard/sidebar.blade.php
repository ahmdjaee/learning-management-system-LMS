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
      @php
        $links = [
            [
                'route' => 'instructor.dashboard',
                'label' => 'Dashboard',
            ],

            [
                'route' => 'instructor.profile.index',
                'label' => 'Profile',
            ],
            [
                'route' => 'instructor.courses.index',
                'label' => 'Courses',
            ],
            [
                'route' => 'instructor.orders.index',
                'label' => 'Orders',
            ],
            [
                'route' => 'instructor.withdrawals.index',
                'label' => 'Withdrawals',
            ],
        ];
      @endphp

      @foreach ($links as $key => $link)
        <li>
          <a class="{{ request()->routeIs($link['route']) ? 'active' : '' }}"
            href="{{ route($link['route']) }}"
          >
            <div class="img">
              <img
                class="img-fluid w-100"
                src="{{ asset('frontend/assets/images/dash_icon_' . $key . '.png') }}"
                alt="icon"
              >
            </div>
            {{ $link['label'] }}
          </a>
        </li>
      @endforeach

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
