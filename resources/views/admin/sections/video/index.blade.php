@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Video</h3>
        </div>
        <div class="card-body">
          <form
            action="{{ route('admin.video-section.store') }}"
            method="post"
            enctype="multipart/form-data"
          >
            @csrf
            <div class="row">
              <div class="col-12">
                <x-input-file-block
                  name="background"
                  value="{{ old('background') ?? $video?->background }}"
                  label="Background"
                />
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Video url</label>
                  <input
                    class="form-control"
                    name="video_url"
                    type="text"
                    value="{{ old('video_url') ?? $video?->video_url }}"
                    placeholder="Enter video url"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('video_url')" />
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Description</label>
                  <textarea
                    class="form-control"
                    name="description"
                    type="text"
                    rows="5"
                    placeholder="Enter description"
                  >{{ old('description') ?? $video?->description }}</textarea>
                  <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Button Text</label>
                  <input
                    class="form-control"
                    name="button_text"
                    type="text"
                    value="{{ old('button_text') ?? $video?->button_text }}"
                    placeholder="Enter button text"
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
                    value="{{ old('button_url') ?? $video?->button_url }}"
                    placeholder="Enter button url"
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('button_url')" />
                </div>
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
