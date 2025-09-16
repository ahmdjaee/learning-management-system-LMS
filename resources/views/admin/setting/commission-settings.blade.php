@extends('admin.setting.layout')

@section('setting-content')
  <div class="col-12 col-md-9 d-flex flex-column">
    <form action="{{ route('admin.commission-settings.update') }}" method="post">
      @csrf
      <div class="card-body">
        <h2 class="mb-4">Commission Settings</h2>
        <div class="row g-3">
          <div class="col-12">
            <div class="form-label">Instructor commission per rate sale (%)</div>
            <input
              class="form-control"
              name="commission_rate"
              type="text"
              value="{{ config('settings.commission_rate') }}"
            >
            <x-input-error class="mt-2" :messages="$errors->get('commission_rate')" />
          </div>
        </div>
      </div>
      <div class="card-footer bg-transparent mt-auto">
        <div class="btn-list justify-content-end">
          <button class="btn" type="reset">
            Reset
          </button>
          <button class="btn btn-primary" type="submit">
            Submit
          </button>
        </div>
      </div>
    </form>
  </div>
@endsection
