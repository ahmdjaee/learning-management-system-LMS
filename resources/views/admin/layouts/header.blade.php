<header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
  <div class="container-xl">
    <button
      class="navbar-toggler"
      data-bs-toggle="collapse"
      data-bs-target="#navbar-menu"
      type="button"
      aria-controls="navbar-menu"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav flex-row order-md-last">
      <div class="d-none d-md-flex me-3">
        <a
          class="nav-link px-0 hide-theme-dark"
          data-bs-toggle="tooltip"
          data-bs-placement="bottom"
          href="{{ request()->fullUrlWithQuery(['theme' => 'dark']) }}"
          title="Enable dark mode"
        >
          <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
          <svg
            class="icon"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path
              stroke="none"
              d="M0 0h24v24H0z"
              fill="none"
            />
            <path
              d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
          </svg>
        </a>
        <a
          class="nav-link px-0 hide-theme-light"
          data-bs-toggle="tooltip"
          data-bs-placement="bottom"
          href="{{ request()->fullUrlWithQuery(['theme' => 'light']) }}"
          title="Enable light mode"
        >
          <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
          <svg
            class="icon"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path
              stroke="none"
              d="M0 0h24v24H0z"
              fill="none"
            />
            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
            <path
              d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"
            />
          </svg>
        </a>
      </div>
      <div class="nav-item dropdown">
        <a
          class="nav-link d-flex lh-1 text-reset p-0"
          data-bs-toggle="dropdown"
          href="#"
          aria-label="Open user menu"
        >
          <span class="avatar avatar-sm"
            style="background-image: url({{ asset(auth()->user()->image) }})"
          ></span>
          <div class="d-none d-xl-block ps-2">
            <div>{{ auth()->user()->name }}</div>
            <div class="mt-1 small text-secondary">{{ auth()->user()->email }}</div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <a class="dropdown-item" href="./profile.html">Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="./settings.html">Settings</a>
          <a class="dropdown-item"
            onclick="event.preventDefault();
                        document.getElementById('logout').submit();"
          >Logout</a>
          <!-- Authentication -->
          <form
            id="logout"
            method="POST"
            action="{{ route('admin.logout') }}"
          >
            @csrf
          </form>
        </div>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="navbar-menu">
      <div>
        <form
          action="./"
          method="get"
          autocomplete="off"
          novalidate
        >
          <div class="input-icon">
            <span class="input-icon-addon">
              <!-- Download SVG icon from http://tabler-icons.io/i/search -->
              <svg
                class="icon"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path
                  stroke="none"
                  d="M0 0h24v24H0z"
                  fill="none"
                />
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                <path d="M21 21l-6 -6" />
              </svg>
            </span>
            <input
              class="form-control"
              type="text"
              value=""
              aria-label="Search in website"
              placeholder="Search…"
            >
          </div>
        </form>
      </div>
    </div>
  </div>
</header>
