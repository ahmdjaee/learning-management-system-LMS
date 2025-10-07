@extends('admin.setting.layout')

@section('setting-content')
  <div class="col-12 col-md-9 d-flex flex-column">
    <form action="{{ route('admin.smtp-settings.update') }}" method="post">
      @csrf
      <div class="card-body">
        <h2 class="mb-4">SMPT Settings</h2>
        <div class="row g-3">
          <div class="col-md-6">
            <div class="form-label">Sender Email</div>
            <input
              class="form-control"
              name="sender_email"
              type="text"
              value="{{ config('settings.sender_email') }}"
            >
            <x-input-error class="mt-2" :messages="$errors->get('sender_email')" />
          </div>
          <div class="col-md-6">
            <div class="form-label">Receiver Email</div>
            <input
              class="form-control"
              name="receiver_email"
              type="text"
              value="{{ config('settings.receiver_email') }}"
            >
            <x-input-error class="mt-2" :messages="$errors->get('receiver_email')" />
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
