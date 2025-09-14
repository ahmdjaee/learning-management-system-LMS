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
          <div class="card-header pt-0 px-0">
            <ul
              class="nav nav-tabs card-header-tabs nav-fill"
              data-bs-toggle="tabs"
              role="tablist"
            >
              <li class="nav-item" role="presentation">
                <a
                  class="nav-link active"
                  data-bs-toggle="tab"
                  href="#tabs-paypal-4"
                  role="tab"
                  aria-selected="true"
                >Paypal</a>
              </li>
              <li class="nav-item" role="presentation">
                <a
                  class="nav-link"
                  data-bs-toggle="tab"
                  href="#tabs-stripe-4"
                  role="tab"
                  aria-selected="false"
                  tabindex="-1"
                >Stripe</a>
              </li>
              <li class="nav-item" role="presentation">
                <a
                  class="nav-link"
                  data-bs-toggle="tab"
                  href="#tabs-razorpay-4"
                  role="tab"
                  aria-selected="false"
                  tabindex="-1"
                >Razorpay</a>
              </li>
            </ul>
          </div>
          <div class="card-body px-0">
            <div class="tab-content">
              <div
                class="tab-pane active show"
                id="tabs-paypal-4"
                role="tabpanel"
              >
                <form action="{{ route('admin.paypal-setting.update') }}" method="post">
                  @csrf
                  <div class=" row ">
                    <div class="col-md-4 mb-3">
                      <label class="form-label">Paypal Mode</label>
                      <select
                        class="form-select"
                        id=""
                        name="paypal_mode"
                        autofocus
                      >
                        <option value="sandbox">Sandbox</option>
                        <option value="live">Live</option>
                      </select>
                      <x-input-error class="mt-2" :messages="$errors->get('paypal_mode')" />
                    </div>
                    <div class="col-md-4 mb-3">
                      <label class="form-label">Currency</label>
                      <select
                        class="form-select tom-select"
                        id=""
                        name="paypal_currency"
                      >
                        @foreach (config('gateaway_currencies.paypal_currencies') as $value)
                          <option value="{{ $value['code'] }}">{{ $value['code'] }}</option>
                        @endforeach
                      </select>
                      <x-input-error class="mt-2" :messages="$errors->get('paypal_currency')" />
                    </div>
                    <div class="col-md-4 mb-3">
                      <label class="form-label">Rate (USD)</label>
                      <input
                        class="form-control"
                        name="paypal_rate"
                        type="text"
                        placeholder="Enter paypal rate"
                      >
                      <x-input-error class="mt-2" :messages="$errors->get('paypal_rate')" />
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label class="form-label">Cliend Id</label>
                      <input
                        class="form-control"
                        name="paypal_client_id"
                        type="text"
                        placeholder="Enter paypal client id"
                      >
                      <x-input-error class="mt-2" :messages="$errors->get('paypal_client_id')" />
                    </div>
                    <div class="col-md-4 mb-3">
                      <label class="form-label">Client Secret</label>
                      <input
                        class="form-control"
                        name="paypal_client_secret"
                        type="text"
                        placeholder="Enter paypal client secret"
                      >
                      <x-input-error class="mt-2" :messages="$errors->get('paypal_client_secret')" />
                    </div>
                    <div class="col-md-4 mb-3">
                      <label class="form-label">App Id</label>
                      <input
                        class="form-control"
                        name="paypal_app_id"
                        type="text"
                        placeholder="Enter paypal app id"
                      >
                      <x-input-error class="mt-2" :messages="$errors->get('paypal_app_id')" />
                    </div>
                  </div>
                  <div class="mb-3">
                    <button class="btn btn-primary" type="submit">
                      <i class="ti ti-device-floppy me-2" style="font-size: 24px;"></i>
                      Save
                    </button>
                  </div>
                </form>
              </div>
              <div
                class="tab-pane"
                id="tabs-stripe-4"
                role="tabpanel"
              >
                <h4>Stripe tab</h4>
                <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam,
                  sem nunc amet, pellentesque id egestas velit sed</div>
              </div>
              <div
                class="tab-pane"
                id="tabs-razorpay-4"
                role="tabpanel"
              >
                <h4>Razorpay tab</h4>
                <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam,
                  sem nunc amet, pellentesque id egestas velit sed</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@push('header-scripts')
  <link href="{{ asset('admin/assets/dist/css/tabler-vendors.min.css?1692870487') }}"
    rel="stylesheet" />
@endpush

@push('bottom-scripts')
  <script
    src="{{ asset('admin/assets/dist/libs/tom-select/dist/js/tom-select.base.min.js?1692870487') }}"
  ></script>
@endpush
