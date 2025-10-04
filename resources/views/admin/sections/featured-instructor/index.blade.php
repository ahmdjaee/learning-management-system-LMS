@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Instructor</h3>
        </div>
        <div class="card-body">
          <form
            action="{{ route('admin.featured-instructor-section.store') }}"
            method="post"
            enctype="multipart/form-data"
          >
            @csrf
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Title</label>
                  <input
                    class="form-control"
                    name="title"
                    type="text"
                    value="{{ old('title') ?? $featuredInstructor?->title }}"
                    placeholder="Enter title"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Sub Title</label>
                  <input
                    class="form-control"
                    name="sub_title"
                    type="text"
                    value="{{ old('sub_title') ?? $featuredInstructor?->sub_title }}"
                    placeholder="Enter sub title"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('sub_title')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Button Text</label>
                  <input
                    class="form-control"
                    name="button_text"
                    type="text"
                    value="{{ old('button_text') ?? $featuredInstructor?->button_text }}"
                    placeholder="Enter button text"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('button_text')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Button Url</label>
                  <input
                    class="form-control"
                    name="button_url"
                    type="text"
                    value="{{ old('button_url') ?? $featuredInstructor?->button_url }}"
                    placeholder="Enter button url"
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('button_url')" />
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Instructor</label>
                  <select
                    class="tom-select select-instructor"
                    id=""
                    name="instructor_id"
                  >
                    <option value="">Select Instructor</option>
                    @foreach ($instructors as $instructor)
                      <option value="{{ $instructor->id }}" @selected($featuredInstructor?->instructor_id == $instructor?->id)>
                        {{ $instructor?->name }}</option>
                    @endforeach
                  </select>
                  <x-input-error class="mt-2" :messages="$errors->get('instructor_id')" />
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Course</label>
                  <select
                    class="tom-select instructor-courses"
                    id=""
                    name="featured_courses[]"
                    multiple
                  >
                    <option value="">Select Course</option>
                    @foreach ($selectedInstructorCourses as $course)
                      <option value="{{ $course->id }}" @selected(in_array($course->id, $selectedCourses))>
                        {{ $course->title }}</option>
                    @endforeach
                  </select>
                  <x-input-error class="mt-2" :messages="$errors->get('featured_courses')" />
                </div>
              </div>

              <div class="col-12">
                <input
                  name="old_image"
                  type="hidden"
                  value="{{ $featuredInstructor?->image }}"
                >
                <x-input-file-block
                  name="image"
                  value="{{ old('image') ?? $featuredInstructor?->image }}"
                  label="Instructor Image"
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
