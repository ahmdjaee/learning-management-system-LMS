@extends('admin.layouts.master')

@section('content')
  <!--===========================
                BREADCRUMB START
            ============================-->
  <div class="dashboard_add_courses">
    <ul
      class="nav nav-pills mt-3 px-3"
      id="pills-tab"
      role="tablist"
    >
      <li class="nav-item" role="presentation">
        <a class="nav-link course-tab {{ request('step') == 1 || request()->is('admin/courses/create') ? 'active' : '' }}"
          data-step="1"
        >Basic Infos</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link course-tab {{ request('step') == 2 ? 'active' : '' }}" data-step="2">More
          Infos</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link course-tab {{ request('step') == 3 ? 'active' : '' }}"
          data-step="3">Course Contents</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link course-tab {{ request('step') == 4 ? 'active' : '' }}"
          data-step="4">Finish</a>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      @yield('course-content')
    </div>
  </div>
  <!--=============================
                DASHBOARD ADD COURSE END
            ==============================-->
@endsection

@push('header-scripts')
  <link href="{{ asset('admin/assets/dist/css/tabler-vendors.min.css?1692870487') }}"
    rel="stylesheet" />
  @vite(['resources/js/admin/course.js'])
  @vite(['resources/css/course.css'])
@endpush
@push('bottom-scripts')
  <script
    src="{{ asset('admin/assets/dist/libs/tom-select/dist/js/tom-select.base.min.js?1692870487') }}"
  ></script>
@endpush
