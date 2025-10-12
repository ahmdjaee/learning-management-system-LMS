@extends('admin.setting.layout')

@section('setting-content')
  <div class="col-12 col-md-9 d-flex flex-column">
    <form action="{{ route('admin.logo-settings.update') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <h2 class="mb-4">Logo & Favicon Settings</h2>
        <div class="row g-3">
          <div class="col-12">
            <x-input-file-block
              name="site_logo"
              value="{{ config('settings.site_logo') }}"
              label="Site logo"
            />
          </div>
          <div class="col-12">
            <x-input-file-block
              name="site_footer_logo"
              value="{{ config('settings.site_footer_logo') }}"
              label="Site footer logo"
            />
          </div>
          <div class="col-12">
            <x-input-file-block
              name="site_favicon"
              value="{{ config('settings.site_favicon') }}"
              label="Site favicon"
            />
          </div>
          <div class="col-12">
            <x-input-file-block
              name="site_breadcrumb"
              value="{{ config('settings.site_breadcrumb') }}"
              label="Site breadcrumb"
            />
          </div>
        </div>
      </div>
      <div class="card-footer bg-transparent mt-auto">
        <div class="btn-list justify-content-end">
          <button class="btn" type="reset">
            Reset
          </button>
          <button class="btn btn-primary" type="submit">
            Submit
          </button>
        </div>
      </div>
    </form>
  </div>
@endsection
