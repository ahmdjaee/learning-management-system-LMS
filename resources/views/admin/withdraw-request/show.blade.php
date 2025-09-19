@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Withdraw Details</h3>
          <div class="card-actions">
            <a class="btn btn-primary btn-3" href="{{ route('admin.withdraw-request.index') }}">
              <i class="ti ti-arrow-left me-2" style="font-size: 24px"></i>
              Back
            </a>
          </div>
        </div>
        <div class="card-body">
          {{-- <form action="{{ route('admin.payout-gateway.update', $payout_gateway) }}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input
                class="form-control"
                name="name"
                type="text"
                value="{{ $payout_gateway->name }}"
                placeholder="Enter level name"
                autofocus
              >
              <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
              <div class="mb-3">
              <label class="form-label">Description</label>
              <textarea name="description" rows="5" class="form-control" placeholder="Enter description">{!! $payout_gateway->description !!}</textarea>
              <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>
            <div class="mb-3">
              <label class="form-label">Status</label>
              <select class="form-select" name="status">
                <option value="1" @selected($payout_gateway->status == 1)>Active</option>
                <option value="0" @selected($payout_gateway->status == 0)>Inactive</option>
              </select>
              <x-input-error class="mt-2" :messages="$errors->get('status')" />
            </div>
            <div class="mb-3">
              <button class="btn btn-primary">
                <i class="ti ti-device-floppy me-2" style="font-size: 24px;"></i>
                Update
              </button>
            </div>
          </form> --}}
          <div class="table-responsive">
            <table class="table table-vcenter card-table">
              <tbody>
                <tr>
                  <th>Instructor</th>
                  <td>
                    <div class="">
                      {{ $withdraw->instructor->name }}
                    </div>
                    <div class="">
                      {{ $withdraw->instructor->email }}
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>Current Wallet Balance</th>
                  <td>
                    {{ config('settings.currency_icon') }}
                    {{ $withdraw->instructor->wallet }}
                  </td>
                </tr>
                <tr>
                  <th>Payout Amount</th>
                  <td>
                    {{ config('settings.currency_icon') }}
                    {{ $withdraw->amount }}
                  </td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td>
                    @if ($withdraw->status == 'approved')
                      <span class="badge bg-green text-green-fg"> Approved</span>
                    @elseif($withdraw->status == 'pending')
                      <span class="badge bg-yellow text-yellow-fg">Pending</span>
                    @elseif ($withdraw->status == 'rejected')
                      <span class="badge bg-red text-red-fg">Rejected</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <th>Action</th>
                  <td>
                    <div class="alert alert-danger">
                      After change status, you can't revert status
                    </div>
                    <form
                      class="card"
                      action="{{ route('admin.withdraw-request.update', $withdraw->id) }}"
                      method="post"
                    >
                      @csrf
                      <div class="card-body">
                        <div class="mb-3">
                          <label for="status">Status</label>
                          <select
                            class="form-select"
                            id="status"
                            name="status"
                            {{ $withdraw->status != 'pending' ? 'disabled' : '' }}
                          >
                            <option value="pending" @selected($withdraw->status == 'pending')>Pending</option>
                            <option value="approved" @selected($withdraw->status == 'approved')>Approved</option>
                            <option value="rejected" @selected($withdraw->status == 'rejected')>Rejected</option>
                          </select>
                          <x-input-error class="mt-2" :messages="$errors->get('status')" />
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>

                      </div>
                    </form>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
