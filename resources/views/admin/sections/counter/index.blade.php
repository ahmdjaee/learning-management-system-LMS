@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Counter</h3>
        </div>
        <div class="card-body">
          <form
            action="{{ route('admin.counter-section.store') }}"
            method="post"
            enctype="multipart/form-data"
          >
            @csrf
            <div class="row mb-3">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Counter 1</label>
                  <input
                    class="form-control"
                    name="counter_1"
                    type="number"
                    value="{{ old('counter_1') ?? $counter?->counter_1 }}"
                    placeholder="Enter counter 1"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('counter_1')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Title 1</label>
                  <input
                    class="form-control"
                    name="title_1"
                    type="text"
                    value="{{ old('title_1') ?? $counter?->title_1 }}"
                    placeholder="Enter title 1"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('title_1')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Counter 2</label>
                  <input
                    class="form-control"
                    name="counter_2"
                    type="number"
                    value="{{ old('counter_2') ?? $counter?->counter_2 }}"
                    placeholder="Enter counter 2"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('counter_2')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Title 2</label>
                  <input
                    class="form-control"
                    name="title_2"
                    type="text"
                    value="{{ old('title_2') ?? $counter?->title_2 }}"
                    placeholder="Enter title 2"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('title_2')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Counter 3</label>
                  <input
                    class="form-control"
                    name="counter_3"
                    type="number"
                    value="{{ old('counter_3') ?? $counter?->counter_3 }}"
                    placeholder="Enter counter 3"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('counter_3')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Title 3</label>
                  <input
                    class="form-control"
                    name="title_3"
                    type="text"
                    value="{{ old('title_3') ?? $counter?->title_3 }}"
                    placeholder="Enter title 3"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('title_3')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Counter 4</label>
                  <input
                    class="form-control"
                    name="counter_4"
                    type="number"
                    value="{{ old('counter_4') ?? $counter?->counter_4 }}"
                    placeholder="Enter counter 4"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('counter_4')" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Title 4</label>
                  <input
                    class="form-control"
                    name="title_4"
                    type="text"
                    value="{{ old('title_4') ?? $counter?->title_4 }}"
                    placeholder="Enter title 4"
                    autofocus
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('title_4')" />
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
