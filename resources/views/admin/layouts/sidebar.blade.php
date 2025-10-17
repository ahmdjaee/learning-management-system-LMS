<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
  <div class="container-fluid">
    <button
      class="navbar-toggler"
      data-bs-toggle="collapse"
      data-bs-target="#sidebar-menu"
      type="button"
      aria-controls="sidebar-menu"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand navbar-brand-autodark">
      <a href="/">
        <img
          class="navbar-brand-image"
          src="{{ asset('admin/assets/static/logo.svg') }}"
          alt="Tabler"
          width="110"
          height="32"
        >
      </a>
    </h1>
    <div class="navbar-nav flex-row d-lg-none">
      <div class="d-none d-lg-flex">
        <a
          class="nav-link px-0 hide-theme-dark"
          data-bs-toggle="tooltip"
          data-bs-placement="bottom"
          href="?theme=dark"
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
          href="?theme=light"
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
            <div>Paweł Kuna</div>
            <div class="mt-1 small text-secondary">UI Designer</div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <a class="dropdown-item" href="">Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('admin.settings.index') }}">Settings</a>
          <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
        </div>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="sidebar-menu">
      <ul class="navbar-nav pt-lg-3">
        <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <i class="ti ti-home"></i>
            </span>
            <span class="nav-link-title">
              Home
            </span>
          </a>
        </li>

        <li
          class="nav-item {{ request()->routeIs('admin.instructor-request.*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('admin.instructor-request.index') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <i class="ti ti-user-check"></i>
            </span>
            <span class="nav-link-title">
              Instructor request
            </span>
          </a>
        </li>

        <li
          class="nav-item dropdown {{ request()->routeIs('admin.courses.*', 'admin.course-languages.*', 'admin.course-levels.*', 'admin.course-categories.*', 'admin.course-reviews.*') ? 'active' : '' }}"
        >
          <a
            class="nav-link dropdown-toggle {{ request()->routeIs('admin.courses.*', 'admin.course-languages.*', 'admin.course-levels.*', 'admin.course-categories.*', 'admin.course-reviews.*') ? 'show' : '' }}"
            data-bs-toggle="dropdown"
            data-bs-auto-close="false"
            href="#navbar-base"
            role="button"
            aria-expanded="{{ request()->routeIs('admin.courses.*', 'admin.course-languages.*', 'admin.course-levels.*', 'admin.course-categories.*', 'admin.course-reviews.*') ? 'true' : 'false' }}"
          >
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <i class="ti ti-book"></i>
            </span>
            <span class="nav-link-title">
              Course Management
            </span>
          </a>
          <div
            class="dropdown-menu {{ request()->routeIs('admin.courses.*', 'admin.course-languages.*', 'admin.course-levels.*', 'admin.course-categories.*', 'admin.course-reviews.*') ? 'show' : '' }}"
          >
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item {{ request()->routeIs('admin.courses.*') ? 'active' : '' }}"
                  href="{{ route('admin.courses.index') }}"
                >
                  Courses
                </a>
                <a class="dropdown-item {{ request()->routeIs('admin.course-languages.*') ? 'active' : '' }}"
                  href="{{ route('admin.course-languages.index') }}"
                >
                  Course Languages
                </a>
                <a class="dropdown-item {{ request()->routeIs('admin.course-levels.*') ? 'active' : '' }}"
                  href="{{ route('admin.course-levels.index') }}"
                >
                  Course Levels
                </a>
                <a class="dropdown-item {{ request()->routeIs('admin.course-categories.*') ? 'active' : '' }}"
                  href="{{ route('admin.course-categories.index') }}"
                >
                  Course Categories
                </a>
                <a class="dropdown-item {{ request()->routeIs('admin.course-reviews.*') ? 'active' : '' }}"
                  href="{{ route('admin.course-reviews.index') }}"
                >
                  Course Reviews
                </a>
              </div>
            </div>
          </div>
        </li>

        <li
          class="nav-item {{ request()->routeIs('admin.certificate-builder.*') ? 'active' : '' }}"
        >
          <a class="nav-link" href="{{ route('admin.certificate-builder.index') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <i class="ti ti-certificate"></i>
            </span>
            <span class="nav-link-title">
              Certificate Builder
            </span>
          </a>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.payment-setting.*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('admin.payment-setting.index') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <i class="ti ti-moneybag-edit"></i>
            </span>
            <span class="nav-link-title">
              Payment Setting
            </span>
          </a>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('admin.orders.index') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <i class="ti ti-transaction-dollar"></i>
            </span>
            <span class="nav-link-title">
              Orders
            </span>
          </a>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.payout-gateway.*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('admin.payout-gateway.index') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <i class="ti ti-galaxy"></i>
            </span>
            <span class="nav-link-title">
              Payout Gateway
            </span>
          </a>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.withdraw-request.*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('admin.withdraw-request.index') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <i class="ti ti-switch-horizontal"></i>
            </span>
            <span class="nav-link-title">
              Withdraw Request
            </span>
          </a>
        </li>

        <li
          class="nav-item dropdown {{ request()->is('admin/sections/*') ? 'active' : '' }}"
        >
          <a
            class="nav-link dropdown-toggle {{ request()->is('admin/sections/*') ? 'show' : '' }}"
            data-bs-toggle="dropdown"
            data-bs-auto-close="false"
            href="#navbar-base"
            role="button"
            aria-expanded="{{ request()->is('admin/sections/*') ? 'true' : 'false' }}"
          >
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <i class="ti ti-section"></i>
            </span>
            <span class="nav-link-title">
              Sections
            </span>
          </a>
          <div
            class="dropdown-menu {{ request()->is('admin/sections/*') ? 'show' : '' }}"
          >
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item {{ request()->routeIs('admin.hero.*') ? 'active' : '' }}"
                  href="{{ route('admin.hero.index') }}"
                >
                  Hero
                </a>
                <a class="dropdown-item {{ request()->routeIs('admin.feature.*') ? 'active' : '' }}"
                  href="{{ route('admin.feature.index') }}"
                >
                  Feature
                </a>
                <a class="dropdown-item {{ request()->routeIs('admin.about-section.*') ? 'active' : '' }}"
                  href="{{ route('admin.about-section.index') }}"
                >
                  About Us
                </a>
                <a class="dropdown-item {{ request()->routeIs('admin.latest-courses.*') ? 'active' : '' }}"
                  href="{{ route('admin.latest-courses.index') }}"
                >
                  Latest Courses
                </a>
                <a class="dropdown-item {{ request()->routeIs('admin.become-instructor-section.*') ? 'active' : '' }}"
                  href="{{ route('admin.become-instructor-section.index') }}"
                >
                  Become Instructor
                </a>
                <a class="dropdown-item {{ request()->routeIs('admin.video-section.*') ? 'active' : '' }}"
                  href="{{ route('admin.video-section.index') }}"
                >
                  Video
                </a>
                <a class="dropdown-item {{ request()->routeIs('admin.brand-section.*') ? 'active' : '' }}"
                  href="{{ route('admin.brand-section.index') }}"
                >
                  Brand
                </a>
                <a class="dropdown-item {{ request()->routeIs('admin.featured-instructor-section.*') ? 'active' : '' }}"
                  href="{{ route('admin.featured-instructor-section.index') }}"
                >
                  Instructor
                </a>
                <a class="dropdown-item {{ request()->routeIs('admin.testimonials-section.*') ? 'active' : '' }}"
                  href="{{ route('admin.testimonials-section.index') }}"
                >
                  Testimonials
                </a>
                <a class="dropdown-item {{ request()->routeIs('admin.counter-section.*') ? 'active' : '' }}"
                  href="{{ route('admin.counter-section.index') }}"
                >
                  Counter
                </a>
              </div>
            </div>
          </div>
        </li>
        
        <li
          class="nav-item dropdown {{ request()->is('admin/contact*') ? 'active' : '' }}"
        >
          <a
            class="nav-link dropdown-toggle {{ request()->is('admin/contact*') ? 'show' : '' }}"
            data-bs-toggle="dropdown"
            data-bs-auto-close="false"
            href="#navbar-base"
            role="button"
            aria-expanded="{{ request()->is('admin/contact*') ? 'true' : 'false' }}"
          >
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <i class="ti ti-phone"></i>
            </span>
            <span class="nav-link-title">
              Contact
            </span>
          </a>
          <div
            class="dropdown-menu {{ request()->is('admin/contact*') ? 'show' : '' }}"
          >
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}"
                  href="{{ route('admin.contact.index') }}"
                >
                  Cards
                </a>
                <a class="dropdown-item {{ request()->routeIs('admin.contact-setting.*') ? 'active' : '' }}"
                  href="{{ route('admin.contact-setting.index') }}"
                >
                  Setting
                </a>
              </div>
            </div>
          </div>
        </li>

        <li
          class="nav-item dropdown {{ request()->is('admin/top-bar*', 'admin/footer*', 'admin/social-links*', 'admin/more-links*', 'admin/useful-links*') ? 'active' : '' }}"
        >
          <a
            class="nav-link dropdown-toggle {{ request()->is('admin/top-bar*', 'admin/footer*', 'admin/social-links*', 'admin/more-links*', 'admin/useful-links*') ? 'show' : '' }}"
            data-bs-toggle="dropdown"
            data-bs-auto-close="false"
            href="#navbar-base"
            role="button"
            aria-expanded="{{ request()->is('admin/top-bar*', 'admin/footer*', 'admin/social-links*', 'admin/more-links*', 'admin/useful-links*') ? 'true' : 'false' }}"
          >
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <i class="ti ti-layout-navbar"></i>
            </span>
            <span class="nav-link-title">
              Header / Footer
            </span>
          </a>
          <div
            class="dropdown-menu {{ request()->is('admin/top-bar*', 'admin/footer*', 'admin/social-links*', 'admin/more-links*', 'admin/useful-links*') ? 'show' : '' }}"
          >
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item {{ request()->routeIs('admin.top-bar.*') ? 'active' : '' }}"
                  href="{{ route('admin.top-bar.index') }}"
                >
                  Top Bar
                </a>
                <a class="dropdown-item {{ request()->routeIs('admin.footer.*') ? 'active' : '' }}"
                  href="{{ route('admin.footer.index') }}"
                >
                  Footer
                </a>
                <a class="dropdown-item {{ request()->routeIs('admin.social-links.*') ? 'active' : '' }}"
                  href="{{ route('admin.social-links.index') }}"
                >
                  Social Links
                </a>
                <a class="dropdown-item {{ request()->routeIs('admin.useful-links.*') ? 'active' : '' }}"
                  href="{{ route('admin.useful-links.index') }}"
                >
                  Useful Links
                </a>
                <a class="dropdown-item {{ request()->routeIs('admin.more-links.*') ? 'active' : '' }}"
                  href="{{ route('admin.more-links.index') }}"
                >
                  More Links
                </a>
              </div>
            </div>
          </div>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('admin.settings.index') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <i class="ti ti-settings"></i>
            </span>
            <span class="nav-link-title">
              Settings
            </span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</aside>
