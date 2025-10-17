@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">About</h3>
        </div>
        <div class="card-body">
          <form
            action="{{ route('admin.about-section.store') }}"
            method="post"
            enctype="multipart/form-data"
          >
            @csrf
            <div class="row mb-3">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Title</label>
                  <input
                    class="form-control"
                    name="title"
                    type="text"
                    value="{{ old('title') ?? $about?->title }}"
                    placeholder="Enter title"
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Round Text</label>
                  <input
                    class="form-control"
                    name="round_text"
                    type="text"
                    value="{{ old('round_text') ?? $about?->round_text }}"
                    placeholder="Enter round text"
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('round_text')" />
                </div>
              </div>

              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Description</label>
                  <textarea
                    class="editor"
                    name="description"
                    rows="3"
                    placeholder="Enter description"
                  >{{ old('description') ?? $about?->description }}</textarea>
                  <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Learner Count</label>
                  <input
                    class="form-control"
                    name="learner_count"
                    type="text"
                    value="{{ old('learner_count') ?? $about?->learner_count }}"
                    placeholder="Enter learner count"
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('learner_count')" />
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Learner Count Text</label>
                  <input
                    class="form-control"
                    name="learner_count_text"
                    type="text"
                    value="{{ old('learner_count_text') ?? $about?->learner_count_text }}"
                    placeholder="Enter learner count text"
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('learner_count_text')" />
                </div>
              </div>

              <div class="col-md-6">
                <x-input-file-block
                  name="image"
                  value="{{ old('image') ?? $about?->image }}"
                  label="About Us Image"
                />
              </div>

              <div class="col-md-6">
                <x-input-file-block
                  name="learner_image"
                  value="{{ old('learner_image') ?? $about?->learner_image }}"
                  label="Learner Image"
                />
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Button Text</label>
                  <input
                    class="form-control"
                    name="button_text"
                    type="text"
                    value="{{ old('button_text') ?? $about?->button_text }}"
                    placeholder="Enter button text"
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('button_text')" />
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Button URL</label>
                  <input
                    class="form-control"
                    name="button_url"
                    type="text"
                    value="{{ old('button_url') ?? $about?->button_url }}"
                    placeholder="Enter button URL"
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('button_url')" />
                </div>
              </div>

              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Video URL</label>
                  <input
                    class="form-control"
                    name="video_url"
                    type="url"
                    value="{{ old('video_url') ?? $about?->video_url }}"
                    placeholder="Enter video URL"
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('video_url')" />
                </div>
              </div>

              <div class="col-12">
                <x-input-file-block
                  name="video_image"
                  value="{{ old('video_image') ?? $about?->video_image }}"
                  label="Video Image"
                />
              </div>
            </div>

            <div class="mt-3">
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
