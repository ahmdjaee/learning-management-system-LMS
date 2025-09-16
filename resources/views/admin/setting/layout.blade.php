@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Settings</h3>
        </div>
        <div class="row g-0">
          @include('admin.setting.sidebar')
          @yield('setting-content')
        </div>
      </div>
    </div>
  </div>
@endsection