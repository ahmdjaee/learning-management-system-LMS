@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Top Bar</h3>
        </div>
        <div class="card-body">
          <form
            action="{{ route('admin.top-bar.store') }}"
            method="post"
            enctype="multipart/form-data"
          >
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input
                    class="form-control"
                    name="email"
                    type="email"
                    value="{{ old('email') ?? $topBar?->email }}"
                    placeholder="Enter email"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Phone</label>
                  <input
                    class="form-control"
                    name="phone"
                    type="text"
                    value="{{ old('phone') ?? $topBar?->phone }}"
                    placeholder="Enter phone"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Offer_name</label>
                  <input
                    class="form-control"
                    name="offer_name"
                    type="text"
                    value="{{ old('offer_name') ?? $topBar?->offer_name }}"
                    placeholder="Enter offer name"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('offer_name')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Offer Description</label>
                  <input
                    class="form-control"
                    name="offer_description"
                    type="text"
                    value="{{ old('offer_description') ?? $topBar?->offer_description }}"
                    placeholder="Enter offer description"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Offer Button Text</label>
                  <input
                    class="form-control"
                    name="offer_button_text"
                    type="text"
                    value="{{ old('offer_button_text') ?? $topBar?->offer_button_text }}"
                    placeholder="Enter offer button text"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('offer_button_text')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Offer Button Url</label>
                  <input
                    class="form-control"
                    name="offer_button_url"
                    type="text"
                    value="{{ old('offer_button_url') ?? $topBar?->offer_button_url }}"
                    placeholder="Enter offer button url"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('offer_button_url')" />
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
