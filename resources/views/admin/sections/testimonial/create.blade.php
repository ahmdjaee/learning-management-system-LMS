@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create Testimonials Section</h3>
          <div class="card-actions">
            <a class="btn btn-primary btn-3" href="{{ route('admin.testimonials-section.index') }}">
              <i class="ti ti-arrow-left me-2" style="font-size: 24px"></i>
              Back
            </a>
          </div>
        </div>
        <div class="card-body">
          <form
            action="{{ route('admin.testimonials-section.store') }}"
            method="post"
            enctype="multipart/form-data"
          >
            @csrf
            <div class="mb-3">
              <label class="form-label">Rating</label>
              <select
                class="form-select"
                id=""
                name="rating"
              >
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
              </select>
              <x-input-error class="mt-2" :messages="$errors->get('rating')" />

            </div>

            <div class="mb-3">
              <label class="form-label">Review</label>
              <textarea
                class="form-control"
                id=""
                name="review"
                rows="5"
              >{{old('review')}}</textarea>
              <x-input-error class="mt-2" :messages="$errors->get('review')" />
            </div>
            <div class="mb-3">
              <x-input-file-block
                name="user_image"
                value="{{ old('user_image') }}"
                label="User image"
              />
            </div>
            <div class="mb-3">
              <label class="form-label">User Name</label>
              <input
                class="form-control"
                id=""
                name="user_name"
                type="text"
                value="{{old('user_name')}}"
              >
              <x-input-error class="mt-2" :messages="$errors->get('user_name')" />
            </div>
            <div class="mb-3">
              <label class="form-label">User Title</label>
              <input
                class="form-control"
                id=""
                name="user_title"
                type="text"
                value="{{old('user_title')}}"
              >
              <x-input-error class="mt-2" :messages="$errors->get('user_title')" />
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
