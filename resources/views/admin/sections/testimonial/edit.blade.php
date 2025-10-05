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
            action="{{ route('admin.testimonials-section.update', $testimonial->id) }}"
            method="post"
            enctype="multipart/form-data"
          >
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label class="form-label">Rating</label>
              <select
                class="form-select"
                id=""
                name="rating"
              >
                <option value="5" @selected($testimonial->rating == 5)>5</option>
                <option value="4" @selected($testimonial->rating == 4)>4</option>
                <option value="3" @selected($testimonial->rating == 3)>3</option>
                <option value="2" @selected($testimonial->rating == 2)>2</option>
                <option value="1" @selected($testimonial->rating == 1)>1</option>
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
              >{{ old('review') ?? $testimonial->review }}</textarea>
              <x-input-error class="mt-2" :messages="$errors->get('review')" />
            </div>
            <div class="mb-3">
              <input
                name="old_image"
                type="hidden"
                value="{{ $testimonial->user_image }}"
              >
              <x-input-file-block
                name="user_image"
                value="{{ old('user_image') ?? $testimonial->user_image }}"
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
                value="{{ old('user_name') ?? $testimonial->user_name }}"
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
                value="{{ old('user_title') ?? $testimonial->user_title }}"
              >
              <x-input-error class="mt-2" :messages="$errors->get('user_title')" />
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
