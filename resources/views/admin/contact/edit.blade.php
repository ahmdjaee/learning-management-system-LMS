@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create Contact Cards</h3>
          <div class="card-actions">
            <div class="card-actions">
              <a class="btn btn-primary btn-3" href="{{ route('admin.contact.index') }}">
                <i class="ti ti-arrow-left me-2" style="font-size: 24px"></i>
                Back
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form
            action="{{ route('admin.contact.update', $contactCard->id) }}"
            method="post"
            enctype="multipart/form-data"
          >
            @csrf
            @method('PUT')
            <div class="mb-3">
              <x-input-file-block
                name="icon"
                value="{{ old('icon') ?? $contactCard->icon }}"
                label="icon Icon"
              />

              <input
                name="old_icon"
                type="hidden"
                value="{{ $contactCard->icon }}"
              >
            </div>
            <div class="mb-3">
              <label class="form-label">Title</label>
              <input
                class="form-control"
                name="title"
                type="text"
                value="{{ old('title') ?? $contactCard->title }}"
                placeholder="Enter title"
                autofocus
              >
              <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>
            <div class="mb-3">
              <label class="form-label">Line 1</label>
              <input
                class="form-control"
                name="line_1"
                type="text"
                value="{{ old('line_1') ?? $contactCard->line_1 }}"
                placeholder="Enter line 1"
                autofocus
              >
              <x-input-error class="mt-2" :messages="$errors->get('line_1')" />
            </div>
            <div class="mb-3">
              <label class="form-label">Line 2</label>
              <input
                class="form-control"
                name="line_2"
                type="text"
                value="{{ old('line_2') ?? $contactCard->line_2 }}"
                placeholder="Enter line 2"
                autofocus
              >
              <x-input-error class="mt-2" :messages="$errors->get('line_2')" />
            </div>
            <div class="mb-3">
              <label class="form-label">Status</label>
              <select
                class="form-select"
                id=""
                name="status"
              >
                <option value="1" @selected($contactCard->status == 1)>Active</option>
                <option value="0" @selected($contactCard->status == 0)>Inactive</option>
              </select>
              <x-input-error class="mt-2" :messages="$errors->get('status')" />
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
