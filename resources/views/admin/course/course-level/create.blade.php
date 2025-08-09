@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create Course Level</h3>
          <div class="card-actions">
            <div class="card-actions">
              <a class="btn btn-primary btn-3" href="{{ route('admin.course-levels.index') }}">
                <i class="ti ti-arrow-left me-2" style="font-size: 24px"></i>
               Back
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.course-levels.store') }}" method="post">
            @csrf
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input
                class="form-control"
                name="name"
                type="text"
                placeholder="Enter level name"
                autofocus
              >
              <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div class="mb-3">
              <button class="btn btn-primary">
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
