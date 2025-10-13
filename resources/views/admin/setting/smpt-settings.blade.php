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
          <div class="col-md-6">
            <div class="form-label">Mail Mailer</div>
            <input
              class="form-control"
              name="mail_mailer"
              type="text"
              value="{{ config('settings.mail_mailer') }}"
            >
            <x-input-error class="mt-2" :messages="$errors->get('mail_mailer')" />
          </div>
          <div class="col-md-6">
            <div class="form-label">Mail Host</div>
            <input
              class="form-control"
              name="mail_host"
              type="text"
              value="{{ config('settings.mail_host') }}"
            >
            <x-input-error class="mt-2" :messages="$errors->get('mail_host')" />
          </div>
          <div class="col-md-6">
            <div class="form-label">Mail Port</div>
            <input
              class="form-control"
              name="mail_port"
              type="text"
              value="{{ config('settings.mail_port') }}"
            >
            <x-input-error class="mt-2" :messages="$errors->get('mail_port')" />
          </div>
          <div class="col-md-6">
            <div class="form-label">Mail Username</div>
            <input
              class="form-control"
              name="mail_username"
              type="text"
              value="{{ config('settings.mail_username') }}"
            >
            <x-input-error class="mt-2" :messages="$errors->get('mail_username')" />
          </div>
          <div class="col-md-6">
            <div class="form-label">Mail Password</div>
            <input
              class="form-control"
              name="mail_password"
              type="text"
              value="{{ config('settings.mail_password') }}"
            >
            <x-input-error class="mt-2" :messages="$errors->get('mail_password')" />
          </div>
          <div class="col-md-6">
            <div class="form-label">Mail Encryption</div>
            <input
              class="form-control"
              name="mail_encryption"
              type="text"
              value="{{ config('settings.mail_encryption') }}"
            >
            <x-input-error class="mt-2" :messages="$errors->get('mail_encryption')" />
          </div>
          <div class="col-md-6">
            <div class="form-label">Mail Queue</div>
            <select name="mail_queue" id="" class="form-select">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('mail_queue')" />
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
