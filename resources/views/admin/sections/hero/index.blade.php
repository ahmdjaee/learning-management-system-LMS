@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Hero</h3>
          <div class="card-actions">
            <a class="btn btn-primary btn-3" href="{{ route('admin.hero.index') }}">
              <i class="ti ti-arrow-left me-2" style="font-size: 24px"></i>
              Back
            </a>
          </div>
        </div>
        <div class="card-body">
          <form
            action="{{ route('admin.hero.store') }}"
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
                    value="{{ old('title') ?? $hero->title }}"
                    placeholder="Enter title"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Sub Title</label>
                  <input
                    class="form-control"
                    name="sub_title"
                    type="text"
                    value="{{ old('sub_title') ?? $hero->sub_title }}"
                    placeholder="Enter sub title"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('sub_title')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Label</label>
                  <input
                    class="form-control"
                    name="label"
                    type="text"
                    value="{{ old('label') ?? $hero->label }}"
                    placeholder="Enter label"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('label')" />
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Button Text</label>
                  <input
                    class="form-control"
                    name="button_text"
                    type="text"
                    value="{{ old('button_text') ?? $hero->button_text }}"
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
                    type="url"
                    value="{{ old('button_url') ?? $hero->button_url }}"
                    placeholder="Enter button url"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('button_url')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Video button text</label>
                  <input
                    class="form-control"
                    name="video_button_text"
                    type="text"
                    value="{{ old('video_button_text') ?? $hero->video_button_text }}"
                    placeholder="Enter video button text"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('video_button_text')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Video button url</label>
                  <input
                    class="form-control"
                    name="video_button_url"
                    type="url"
                    value="{{ old('video_button_url') ?? $hero->video_button_url }}"
                    placeholder="Enter video button url"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('video_button_url')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Banner item title</label>
                  <input
                    class="form-control"
                    name="banner_item_title"
                    type="text"
                    value="{{ old('banner_item_title') ?? $hero->banner_item_title }}"
                    placeholder="Enter banner item title"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('banner_item_title')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Banner sub title</label>
                  <input
                    class="form-control"
                    name="banner_item_sub_title"
                    type="text"
                    value="{{ old('banner_item_sub_title') ?? $hero->banner_item_sub_title }}"
                    placeholder="Enter banner sub title"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('banner_item_sub_title')" />
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Round text</label>
                  <input
                    class="form-control"
                    name="round_text"
                    type="text"
                    value="{{ old('round_text') ?? $hero->round_text }}"
                    placeholder="Enter round text"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('round_text')" />
                </div>
              </div>
              <div class="col-12">
                <x-input-file-block
                  name="image"
                  value="{{ old('image') ?? $hero->image }}"
                  label="Hero Image"
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
