@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Payment Settings</h3>
          <div class="card-actions">
            <div class="card-actions">
              <a class="btn btn-primary btn-3" href="{{ route('admin.course-levels.index') }}">
                <i class="ti ti-arrow-left me-2" style="font-size: 24px"></i>
                Back
              </a>
            </div>
          </div>
        </div>
        <div class="row g-0">
          @include('admin.setting.sidebar')
          @yield('setting-content')
        </div>
      </div>
    </div>
  </div>
@endsection