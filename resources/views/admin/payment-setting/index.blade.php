@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Payment Settings</h3>
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
              class="nav nav-tabs card-header-tabs nav-fill payment-tab"
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
                        <option value="sandbox" @selected(config('gateway_settings.paypal_mode') == 'sandbox')>Sandbox</option>
                        <option value="live" @selected(config('gateway_settings.paypal_mode') == 'live')>Live</option>
                      </select>
                      <x-input-error class="mt-2" :messages="$errors->get('paypal_mode')" />
                    </div>
                    <div class="col-md-4 mb-3">
                      <label class="form-label">Currency</label>
                      <select
                        class="tom-select"
                        id=""
                        name="paypal_currency"
                      >
                        @foreach (config('gateaway_currencies.paypal_currencies') as $value)
                          <option value="{{ $value['code'] }}" @selected(config('gateway_settings.paypal_currency') == $value['code'])>
                            {{ $value['code'] }}</option>
                        @endforeach
                      </select>
                      <x-input-error class="mt-2" :messages="$errors->get('paypal_currency')" />
                    </div>
                    <div class="col-md-4 mb-3">
                      <label class="form-label">Rate (USD)</label>
                      <input
                        class="form-control"
                        name="paypal_rate"
                        type="number"
                        value="{{ config('gateway_settings.paypal_rate') }}"
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
                        value="{{ config('gateway_settings.paypal_client_id') }}"
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
                        value="{{ config('gateway_settings.paypal_client_secret') }}"
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
                        value="{{ config('gateway_settings.paypal_app_id') }}"
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
                <form action="{{ route('admin.stripe-setting.update') }}" method="post">
                  @csrf
                  <div class=" row ">
                    <div class="col-md-4 mb-3">
                      <label class="form-label">Stripe Status</label>
                      <select
                        class="form-select"
                        id=""
                        name="stripe_status"
                        autofocus
                      >
                        <option value="active" @selected(config('gateway_settings.stripe_status') == 'active')>Active</option>
                        <option value="inactive" @selected(config('gateway_settings.stripe_status') == 'inactive')>Inactive</option>
                      </select>
                      <x-input-error class="mt-2" :messages="$errors->get('stripe_status')" />
                    </div>
                    <div class="col-md-4 mb-3">
                      <label class="form-label">Currency</label>
                      <select
                        class="tom-select"
                        id=""
                        name="stripe_currency"
                      >
                        @foreach (config('gateaway_currencies.stripe_currencies') as $value)
                          <option value="{{ $value }}" @selected(config('gateway_settings.stripe_currency') == $value)>
                            {{ $value }}
                          </option>
                        @endforeach
                      </select>
                      <x-input-error class="mt-2" :messages="$errors->get('stripe_currency')" />
                    </div>
                    <div class="col-md-4 mb-3">
                      <label class="form-label">Rate (USD)</label>
                      <input
                        class="form-control"
                        name="stripe_rate"
                        type="number"
                        value="{{ config('gateway_settings.stripe_rate') }}"
                        placeholder="Enter stripe rate"
                      >
                      <x-input-error class="mt-2" :messages="$errors->get('stripe_rate')" />
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label class="form-label">Publishable key</label>
                      <input
                        class="form-control"
                        name="stripe_publishable_key"
                        type="text"
                        value="{{ config('gateway_settings.stripe_publishable_key') }}"
                        placeholder="Enter stripe publishable key"
                      >
                      <x-input-error class="mt-2" :messages="$errors->get('stripe_publishable_key')" />
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="form-label">Client Secret</label>
                      <input
                        class="form-control"
                        name="stripe_secret"
                        type="text"
                        value="{{ config('gateway_settings.stripe_secret') }}"
                        placeholder="Enter stripe secret"
                      >
                      <x-input-error class="mt-2" :messages="$errors->get('stripe_secret')" />
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
                id="tabs-razorpay-4"
                role="tabpanel"
              >
                  <form action="{{ route('admin.razorpay-setting.update') }}" method="post">
                  @csrf
                  <div class=" row ">
                    <div class="col-md-4 mb-3">
                      <label class="form-label">Razorpay Status</label>
                      <select
                        class="form-select"
                        id=""
                        name="razorpay_status"
                        autofocus
                      >
                        <option value="active" @selected(config('gateway_settings.razorpay_status') == 'active')>Active</option>
                        <option value="inactive" @selected(config('gateway_settings.razorpay_status') == 'inactive')>Inactive</option>
                      </select>
                      <x-input-error class="mt-2" :messages="$errors->get('razorpay_status')" />
                    </div>
                    <div class="col-md-4 mb-3">
                      <label class="form-label">Currency</label>
                      <select
                        class="tom-select"
                        id=""
                        name="razorpay_currency"
                      >
                        @foreach (config('gateaway_currencies.razorpay_currencies') as $value)
                          <option value="{{ $value }}" @selected(config('gateway_settings.razorpay_currency') == $value)>
                            {{ $value }}
                          </option>
                        @endforeach
                      </select>
                      <x-input-error class="mt-2" :messages="$errors->get('razorpay_currency')" />
                    </div>
                    <div class="col-md-4 mb-3">
                      <label class="form-label">Rate (USD)</label>
                      <input
                        class="form-control"
                        name="razorpay_rate"
                        type="number"
                        value="{{ config('gateway_settings.razorpay_rate') }}"
                        placeholder="Enter razorpay rate"
                      >
                      <x-input-error class="mt-2" :messages="$errors->get('razorpay_rate')" />
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label class="form-label">Key</label>
                      <input
                        class="form-control"
                        name="razorpay_key"
                        type="text"
                        value="{{ config('gateway_settings.razorpay_key') }}"
                        placeholder="Enter razorpay key"
                      >
                      <x-input-error class="mt-2" :messages="$errors->get('razorpay_key')" />
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="form-label">Client Secret</label>
                      <input
                        class="form-control"
                        name="razorpay_secret"
                        type="text"
                        value="{{ config('gateway_settings.razorpay_secret') }}"
                        placeholder="Enter razorpay secret"
                      >
                      <x-input-error class="mt-2" :messages="$errors->get('razorpay_secret')" />
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('bottom-scripts')
  <script type="module">
    $('.nav-link').click(function() {

      var activetab = $(this).attr('href');

      localStorage.setItem('activetab', activetab);
    });

    $(function() { //short hand for $(document).ready()
      var activetab = localStorage.getItem('activetab');

      var link = document.querySelector(`.payment-tab a[href="${activetab}"]`);
      link && link.click();
    });
  </script>
@endpush
