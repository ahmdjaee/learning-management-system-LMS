@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Withdraw Request</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-vcenter card-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Request Amount</th>
                  <th>Status</th>
                  <th class="text-end">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($withdraws as $withdraw)
                  <tr>
                    <td>{{ $withdraw->instructor->name }}</td>
                    <td>{{ config('settings.currency_icon') }}{{ $withdraw->amount }}</td>
                    <td>
                      @if ($withdraw->status == 'approved')
                        <span class="badge bg-green text-green-fg"> Approved</span>
                      @elseif($withdraw->status == 'pending')
                        <span class="badge bg-yellow text-yellow-fg">Pending</span>
                      @elseif ($withdraw->status == 'rejected')
                        <span class="badge bg-red text-red-fg">Rejected</span>
                      @endif
                    </td>
                    <td class="text-end ">
                      <a
                        class="btn btn-light "
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        href="{{ route('admin.withdraw-request.show', $withdraw->id) }}"
                        title="Show"
                      >
                        <i class="ti ti-eye"></i>
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
          {{ $withdraws->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
