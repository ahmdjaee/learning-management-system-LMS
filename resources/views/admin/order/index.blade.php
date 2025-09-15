@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Orders</h3>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-vcenter card-table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Paid Amount</th>
                  <th>Currency</th>
                  <th>Status</th>
                  <th class="text-end">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($orders as $order)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        <div>{{ $order->customer->name }}</div>
                        <small>{{$order->customer->email}}</small>
                    </td>
                    <td>
                      {{ $order->total_amount }}
                    </td>
                    <td>
                      {{ $order->paid_amount }}
                    </td>
                    <td>
                      {{ $order->currency }}
                    </td>
                    <td>
                      @if ($order->status == 'pending')
                        <span class="badge bg-yellow text-yellow-fg">{{ $order->status }}</span>
                      @elseif ($order->status == 'approved')
                        <span class="badge bg-green text-green-fg">{{ $order->status }}</span>
                      @endif
                    </td>
                    <td class="text-end ">
                      {{-- <button class="btn ">Blue badge</button> --}}
                      <a
                        class="btn btn-light "
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        href="{{ route('admin.orders.show', $order->id) }}"
                        title="Show"
                      >
                        <i class="ti ti-eye" ></i>
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
          {{ $orders->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
