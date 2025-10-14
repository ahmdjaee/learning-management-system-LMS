@php
  $topBar = \App\Models\TopBar::first();
  $categories = \App\Models\CourseCategory::whereNull('parent_id')->where('status', 1)->get();
@endphp

{{-- ===========================
        HEADER START
    ============================ --}}
<header class="header_3">
  <div class="row">
    <div class="col-xxl-4 col-lg-7 col-md-8 d-none d-md-block">
      <ul class="wsus__header_left d-flex flex-wrap">
        <li><a href="mailto:{{ $topBar->email }}"><i
              class="fab fa-envelope"></i>{{ $topBar->email }}</a></li>
        <li><a href="callto:{{ $topBar->phone }}"><i
              class="fas fa-phone-alt"></i>{{ $topBar->phone }}</a></li>
      </ul>
    </div>
    <div class="col-xxl-5 col-lg-7 d-none d-xxl-block">
      <div class="wsus__header_center">
        <p> <span>{{ $topBar->offer_name }}</span>{{ $topBar->offer_description }} <a
            href="{{ $topBar->offer_button_url }}"
          >{{ $topBar->offer_button_text }}</a></p>
      </div>
    </div>
    {{-- <div class="col-xxl-3 col-lg-5 col-md-4">
      <ul class="wsus__header_right d-flex flex-wrap">
        <li>
          <select class="select_js">
            <option value="">English </option>
            <option value="">Japanese</option>
            <option value="">Korean</option>
            <option value="">Chinese</option>
            <option value="">Urdu</option>
          </select>
        </li>
        <li>
          <select class="select_js">
            <option value="">$USD</option>
            <option value="">₹INR</option>
            <option value="">¥CNY</option>
            <option value="">€EUR</option>
            <option value="">฿THB</option>
          </select>
        </li>
      </ul>
    </div> --}}
  </div>
</header>
{{-- ===========================
        HEADER END
    ============================ --}}

{{-- ===========================
        MAIN MENU 3 START
    ============================ --}}
<nav class="navbar navbar-expand-lg main_menu main_menu_3">
  <a class="navbar-brand" href="{{ url('/') }}">
    <img
      class="img-fluid"
      src="{{ asset(config('settings.site_logo')) }}"
      alt="EduCore"
    >
  </a>
  <button
    class="navbar-toggler"
    data-bs-toggle="collapse"
    data-bs-target="#navbarSupportedContent"
    type="button"
    aria-controls="navbarSupportedContent"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="menu_category">
      <div class="icon">
        <img
          class="img-fluid"
          src="{{ asset('frontend/assets/images/grid_icon.png') }}"
          alt="Category"
        >
      </div>
      Category
      <ul>
        @foreach ($categories as $category)
          <li>
            <a href="javascript:;">
              <span>
                <img
                  class="img-fluid"
                  src="{{ asset($category->image) }}"
                  alt="Category"
                >
              </span>
              {{ $category->name }}
            </a>
            @if ($category->subCategories->count() > 0)
              <ul class="category_sub_menu">
                @foreach ($category->subCategories as $subCategory)
                  <li><a
                      href="{{ route('courses.index', ['category' => $subCategory->id]) }}">{{ $subCategory->name }}</a>
                  </li>
                @endforeach
              </ul>
            @endif
          </li>
        @endforeach
      </ul>
    </div>
    <ul class="navbar-nav m-auto">
      <li class="nav-item">
        <a class="nav-link active" href="/">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('courses.index') }}">Courses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('about') }}">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('contact.index') }}">Blogs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('contact.index') }}">Contact Us</a>
      </li>
    </ul>

    <div class="right_menu">
      <div class="menu_search_btn">
        <img
          class="img-fluid"
          src="{{ asset('frontend/assets/images/search_icon.png') }}"
          alt="Search"
        >
      </div>
      <ul>
        <li>
          <a class="menu_signin" href="{{ route('cart.index') }}">
            <span>
              <img
                class="img-fluid"
                src="{{ asset('frontend/assets/images/cart_icon_black.png') }}"
                alt="user"
              >
            </span>
            <b class="cart-count">{{ cartCount() }}</b>
          </a>
        </li>
        <li>
          <a class="common_btn" href="{{ route('login') }}">Sign In</a>
        </li>
      </ul>
    </div>

  </div>
</nav>
<div class="wsus__menu_3_search_area">
  <form action="{{ route('courses.index') }}">
    <input
      name="search"
      type="text"
      placeholder="Search School, Online....."
    >
    <button class="common_btn" type="submit">Search</button>
    <span class="close_search"><i class="far fa-times"></i></span>
  </form>
</div>
{{-- ===========================
        MAIN MENU 3 END
    ============================ --}}

{{-- ============================
        STICKY MENU START
    ============================= --}}
<div class="mobile_menu_area">
  <div class="mobile_menu_area_top">
    <a class="mobile_menu_logo" href="{{ url('/') }}">
      <img src="{{ asset(config('settings.site_logo')) }}" alt="EduCore">
    </a>
    <div
      class="mobile_menu_icon d-block d-lg-none"
      data-bs-toggle="offcanvas"
      data-bs-target="#offcanvasWithBothOptions"
      aria-controls="offcanvasWithBothOptions"
    >
      <span class="mobile_menu_icon"><i class="far fa-stream menu_icon_bar"></i></span>
    </div>
  </div>

  <div
    class="offcanvas offcanvas-start"
    id="offcanvasWithBothOptions"
    data-bs-scroll="true"
    tabindex="-1"
  >
    <button
      class="btn-close"
      data-bs-dismiss="offcanvas"
      type="button"
      aria-label="Close"
    ><i class="fal fa-times"></i></button>
    <div class="offcanvas-body">

      <ul class="mobile_menu_header d-flex flex-wrap">
        <li><a href="{{ route('cart.index') }}"><i class="far fa-shopping-basket"></i>
            <span>{{ cartCount() }}</span></a>
        </li>
        <li><a href="dashboard.html"><i class="far fa-user"></i></a></li>
      </ul>

      <form class="mobile_menu_search" action="{{ route('courses.index') }}">
        <input type="text" placeholder="Search" name="search">
        <button type="submit"><i class="far fa-search"></i></button>
      </form>

      <div class="mobile_menu_item_area">
        <nav>
          <div
            class="nav nav-tabs"
            id="nav-tab"
            role="tablist"
          >
            <button
              class="nav-link active"
              id="nav-home-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-home"
              type="button"
              role="tab"
              aria-controls="nav-home"
              aria-selected="true"
            >menu</button>
            <button
              class="nav-link"
              id="nav-profile-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-profile"
              type="button"
              role="tab"
              aria-controls="nav-profile"
              aria-selected="false"
            >Categories</button>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div
            class="tab-pane fade show active"
            id="nav-home"
            role="tabpanel"
            aria-labelledby="nav-home-tab"
            tabindex="0"
          >
            <ul class="main_mobile_menu">
              <li class="nav-item">
                <a class="nav-link active" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('courses.index') }}">Courses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('contact.index') }}">Blogs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('contact.index') }}">Contact Us</a>
              </li>
            </ul>
          </div>
          <div
            class="tab-pane fade"
            id="nav-profile"
            role="tabpanel"
            aria-labelledby="nav-profile-tab"
            tabindex="0"
          >
            <ul class="main_mobile_menu">
              @foreach ($categories as $category)
                <li class="mobile_dropdown">
                  <a href="javascript:;">
                    <span>
                      <img
                        class="img-fluid"
                        src="{{ asset($category->image) }}"
                        alt="Category"
                      >
                    </span>
                    {{ $category->name }}
                  </a>
                  @if ($category->subCategories->count() > 0)
                  <ul class="inner_menu">
                    @foreach ($category->subCategories as $subCategory)
                      <li><a
                          href="{{ route('courses.index', ['category' => $subCategory->id]) }}">{{ $subCategory->name }}</a>
                      </li>
                    @endforeach
                  </ul>
                  @endif
                </li>
              @endforeach

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- ============================
        STICKY MENU END
    ============================= --}}
