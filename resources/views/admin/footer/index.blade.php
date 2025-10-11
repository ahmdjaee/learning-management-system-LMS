@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Footer Contents</h3>
        </div>
        <div class="card-body">
          <form
            action="{{ route('admin.footer.store') }}"
            method="post"
            enctype="multipart/form-data"
          >
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Description</label>
                  <input
                    class="form-control"
                    name="description"
                    type="text"
                    value="{{ old('description') ?? $footer?->description }}"
                  placeholder="Enter description"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Copyright</label>
                  <input
                    class="form-control"
                    name="copyright"
                    type="text"
                    value="{{ old('copyright') ?? $footer?->copyright }}"
                    placeholder="Enter copyright"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('copyright')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Phone</label>
                  <input
                    class="form-control"
                    name="phone"
                    type="text"
                    value="{{ old('phone') ?? $footer?->phone }}"
                    placeholder="Enter offer name"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input
                    class="form-control"
                    name="email"
                    type="email"
                    value="{{ old('email') ?? $footer?->email }}"
                    placeholder="Enter email"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Address</label>
                  <input
                    class="form-control"
                    name="address"
                    type="text"
                    value="{{ old('address') ?? $footer?->address }}"
                    placeholder="Enter address"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('address')" />
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
