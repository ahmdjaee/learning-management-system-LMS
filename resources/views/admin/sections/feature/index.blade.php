@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Feature</h3>
        </div>
        <div class="card-body">
          <form
            action="{{ route('admin.feature.store') }}"
            method="post"
            enctype="multipart/form-data"
          >
            @csrf
            <div class="row mb-3 border-bottom border-dark-subtle">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Title 1</label>
                  <input
                    class="form-control"
                    name="title_1"
                    type="text"
                    value="{{ old('title_1') ?? $feature?->title_1 }}"
                    placeholder="Enter title 1"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('title_1')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Sub Title 1</label>
                  <input
                    class="form-control"
                    name="sub_title_1"
                    type="text"
                    value="{{ old('sub_title_1') ?? $feature?->sub_title_1 }}"
                    placeholder="Enter sub title 1"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('sub_title_1')" />
                </div>
              </div>
              <div class="col-12">
                <x-input-file-block
                  name="image_1"
                  value="{{ old('image_1') ?? $feature?->image_1 }}"
                  label="Feature Image 1"
                />
              </div>
            </div>
            <div class="row mb-3 border-bottom border-dark-subtle">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Title 2</label>
                  <input
                    class="form-control"
                    name="title_2"
                    type="text"
                    value="{{ old('title_2') ?? $feature?->title_2 }}"
                    placeholder="Enter title 2"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('title_2')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Sub Title 2</label>
                  <input
                    class="form-control"
                    name="sub_title_2"
                    type="text"
                    value="{{ old('sub_title_2') ?? $feature?->sub_title_2 }}"
                    placeholder="Enter sub title 2"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('sub_title_2')" />
                </div>
              </div>
              <div class="col-12">
                <x-input-file-block
                  name="image_2"
                  value="{{ old('image_2') ?? $feature?->image_2 }}"
                  label="Feature Image 2"
                />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Title 3</label>
                  <input
                    class="form-control"
                    name="title_3"
                    type="text"
                    value="{{ old('title_3') ?? $feature?->title_3 }}"
                    placeholder="Enter title 3"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('title_3')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Sub Title 3</label>
                  <input
                    class="form-control"
                    name="sub_title_3"
                    type="text"
                    value="{{ old('sub_title_3') ?? $feature?->sub_title_3 }}"
                    placeholder="Enter sub title 3"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('sub_title_3')" />
                </div>
              </div>
              <div class="col-12">
                <x-input-file-block
                  name="image_3"
                  value="{{ old('image_3') ?? $feature?->image_3 }}"
                  label="Feature Image 3"
                />
              </div>
            </div>
            <div class="mb-3">
              <button class="btn" type="reset">
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
