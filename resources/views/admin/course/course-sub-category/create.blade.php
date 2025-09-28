@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create Course Sub Category</h3>
          <div class="card-actions">
            <div class="card-actions">
              <a class="btn btn-primary btn-3" href="{{ route('admin.course-sub-categories.index', $category->id) }}">
                <i class="ti ti-arrow-left me-2" style="font-size: 24px"></i>
                Back
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form
            action="{{ route('admin.course-sub-categories.store', $category->id) }}"
            enctype="multipart/form-data"
            method="post"
          >
            @csrf
            <div class="row">
              <div class="col-md-12">
                <x-input-file-block  name="image" accept="image/*" />
              </div>
              <div class="col-md-12">
                <x-input-block
                  name="name"
                  placeholder="Enter category name"
                  label="Name"
                  required
                />
              </div>
              <div class="col-md-3">
                <x-input-toggle-block
                  name="status"
                  formCheckLabel="Active / Inactive"
                  label="Status"
                />
              </div>
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
