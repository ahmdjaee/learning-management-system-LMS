@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Payout Gateways</h3>
          <div class="card-actions">
            <div class="card-actions">
              <a class="btn btn-primary btn-3" href="{{ route('admin.payout-gateway.create') }}">
                <i class="ti ti-plus me-2" style="font-size: 24px;"></i>
                Add new
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-vcenter card-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Status</th>
                  <th class="text-end">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($gateways as $gateway)
                  <tr>
                    <td>{{ $gateway->name }}</td>
                    <td>
                      @if ($gateway->status == 1)
                          <span class="badge bg-green text-green-fg">Active</span>
                      @elseif($gateway->status == 0)
                          <span class="badge bg-red text-red-fg">Inactive</span>
                      @endif
                    </td>
                    <td class="text-end ">
                      {{-- <button class="btn ">Blue badge</button> --}}
                      <a
                        class="btn btn-light "
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        href="{{ route('admin.payout-gateway.edit', $gateway->id) }}"
                        title="Edit"
                      >
                        <i class="ti ti-edit" ></i>
                      </a>
                      <a
                        class="btn btn-light text-danger delete-item"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        href="{{ route('admin.payout-gateway.destroy', $gateway->id) }}"
                        title="Delete"
                      >
                        <i class="ti ti-trash-x" ></i>
                      </a>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="6">
                      <div class="empty">
                        <div class="empty-img">
                          <img
                            src="{{ asset('admin/assets/static/illustrations/undraw_printing_invoices_5r4r.svg') }}"
                            alt=""
                            height="128"
                          >
                        </div>
                        <p class="empty-title">No results found</p>
                        <p class="empty-subtitle text-secondary">
                          Try adjusting your search or filter to find what you're looking for.
                        </p>
                      </div>
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer">
          {{-- {{ $gateways->links() }} --}}
        </div>
      </div>
    </div>
  </div>
@endsection
