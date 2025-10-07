@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Contact Setting</h3>
          <div class="card-actions">
            <div class="card-actions">
              <a class="btn btn-primary btn-3" href="{{ route('admin.contact-setting.index') }}">
                <i class="ti ti-arrow-left me-2" style="font-size: 24px"></i>
                Back
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form
            action="{{ route('admin.contact-setting.store') }}"
            method="post"
            enctype="multipart/form-data"
          >
            @csrf
            <div class="mb-3">
              <input
                name="old_image"
                type="hidden"
                value="{{ $setting?->image }}"
              >
              <x-input-file-block
                name="image"
                value="{{ old('image') ?? $setting?->image }}"
                label="Image"
              />
            </div>
            <div class="mb-3">
              <label class="form-label">Map url</label>
              <input
                class="form-control"
                name="map_url"
                type="url"
                value="{{ old('map_url') ?? $setting?->map_url }}"
                placeholder="Enter map url"
                autofocus
              >
              <x-input-error class="mt-2" :messages="$errors->get('map_url')" />
            </div>
            <div class="mb-3"> <button class="btn" type="reset">
                Reset
              </button>
              <button class="btn btn-primary" type="submit">
                <i class="ti ti-device-floppy me-2" style="font-size: 20px;"></i>
                Save
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
