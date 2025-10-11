@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create Brand Section</h3>
          <div class="card-actions">
            <a class="btn btn-primary btn-3" href="{{ route('admin.social-links.index') }}">
              <i class="ti ti-arrow-left me-2" style="font-size: 24px"></i>
              Back
            </a>
          </div>
        </div>
        <div class="card-body">
          <form
            action="{{ route('admin.social-links.store') }}"
            method="post"
            enctype="multipart/form-data"
          >
            @csrf
            <div class="mb-3">
              <x-input-file-block
                name="icon"
                value="{{ old('icon') }}"
                label="Hero Icon"
              />
            </div>
            <div class="mb-3">
              <label class="form-label">Url</label>
              <input
                class="form-control"
                name="url"
                type="url"
                value="{{ old('url') }}"
                placeholder="Enter url"
                autofocus
              >
              <x-input-error class="mt-2" :messages="$errors->get('url')" />
            </div>
            <div class="mb-3">
              <x-input-toggle-block
                name="status"
                formCheckLabel="Active / Inactive"
                label="Status"
                value="1"
                checked
              />
            </div>
            <div class="mb-3">
              <button class="btn btn-primary" type="submit">
                <i class="ti ti-device-floppy me-2" style="font-size: 24px;"></i>
                Create
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
