@extends('admin.setting.layout')

@section('setting-content')
  <div class="col-12 col-md-9 d-flex flex-column">
    <form action="{{ route('admin.general-settings.update') }}" method="post">
      @csrf
      <div class="card-body">
        <h2 class="mb-4">My Account</h2>
        <h3 class="card-title mt-4">Business Profile</h3>
        <div class="row g-3">
          <div class="col-md-6">
            <div class="form-label">Site name</div>
            <input
              class="form-control"
              name="site_name"
              type="text"
              value="{{ config('settings.site_name') }}"
            >
            <x-input-error class="mt-2" :messages="$errors->get('site_name')" />
          </div>
          <div class="col-md-6">
            <div class="form-label">Phone</div>
            <input
              class="form-control"
              name="phone"
              type="tel"
              value="{{ config('settings.phone') }}"

            >
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
          </div>
          <div class="col-md-6">
            <div class="form-label">Email</div>
            <input
              class="form-control"
              name="email"
              type="email"
              value="{{ config('settings.email') }}"

            >
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
          </div>
          <div class="col-md-6">
            <div class="form-label">Location</div>
            <input
              class="form-control"
              name="location"
              type="text"
              value="{{ config('settings.location') }}"

            >
            <x-input-error class="mt-2" :messages="$errors->get('site_name')" />
          </div>
          <div class="col-md-6">
            <div class="form-label">Site default currency</div>
            <select
              class="tom-select"
              id=""
              name="default_currency"
            >
              @foreach (config('gateaway_currencies.all_currencies') as $value)
                <option @selected(config('settings.default_currency') ==  $value) value="{{ $value }}">{{ $value }}</option>
              @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('default_currency')" />
          </div>
          <div class="col-md-6">
            <div class="form-label">Currency icon</div>
            <input
              class="form-control"
              name="currency_icon"
              type="text"
              value="{{ config('settings.currency_icon') }}"
            >
            <x-input-error class="mt-2" :messages="$errors->get('currency_icon')" />
          </div>
        </div>
      </div>
      <div class="card-footer bg-transparent mt-auto">
        <div class="btn-list justify-content-end">
          <a class="btn" href="#">
            Cancel
          </a>
          <button class="btn btn-primary" type="submit">
            Submit
          </button>
        </div>
      </div>
    </form>
  </div>
@endsection
