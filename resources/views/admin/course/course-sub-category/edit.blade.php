@extends('admin.layouts.master')

@push('top-section')
  <link href="{{ asset('admin/assets/dist/libs/dropzone/dist/dropzone.css?1692870487') }}"
    rel="stylesheet"
  />
@endpush

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Update Course Sub Category</h3>
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
            action="{{ route('admin.course-sub-categories.update', [
              'course_category' => $category->id,
              'course_sub_category'=> $subCategory->id
            ]) }}"
            enctype="multipart/form-data"
            method="post"
          >
            @csrf
            @method('PUT')

            <div class="row">
              <div class="col-md-12">
                <x-input-file-block name="image" :value="asset($subCategory->image)" />
              </div>
              <div class="col-md-12">
                <x-input-icon-block
                  name="icon"
                  required
                  label="Icon"
                  :value="$subCategory->icon"
                />
              </div>
              <div class="col-md-12">
                <x-input-block
                  name="name"
                  placeholder="Enter category name"
                  label="Name"
                  required
                  :value="$subCategory->name"
                />
              </div>
              <div class="col-md-3">
                <x-input-toggle-block
                  name="show_at_trending"
                  formCheckLabel=""
                  label="Show At Trending"
                  :checked="$subCategory->show_at_trending"
                />
              </div>
              <div class="col-md-3">
                <x-input-toggle-block
                  name="status"
                  formCheckLabel="Active / Inactive"
                  label="Status"
                  :checked="$subCategory->status"
                />
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary" type="submit">
                <i class="ti ti-device-floppy me-2" style="font-size: 24px;"></i>
                Update
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('bottom-script')
  <script src="{{ asset('admin/assets/dist/libs/dropzone/dist/dropzone-min.js?1692870487') }}" defer>
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      new Dropzone("#dropzone-default")
    })
  </script>
@endpush
