@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Card title</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-vcenter card-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Document</th>
                  <th>Action</th>
                  <th class="w-1"></th>
                </tr>
              </thead>
              <tbody>
                @forelse ($instructorsRequest as $instructor)
                  <tr>
                    <td>{{ $instructor->name }}</td>
                    <td>
                      {{ $instructor->email }}
                    </td>
                    <td>
                      @if ($instructor->approve_status == 'pending')
                        <span class="badge bg-yellow text-yellow-fg">Pending</span>
                      @elseif ($instructor->approve_status == 'rejected')
                        <span class="badge bg-red text-red-fg">Rejected</span>
                      @endif
                    </td>
                    <td>
                      <a class="text-muted" href="{{ route('admin.instructor-doc-download', $instructor->id) }}">
                        <i class="ti ti-download"></i>
                      </a>
                    </td>
                    <td>
                      <form
                        class="status-{{ $instructor->id }}"
                        action="{{ route('admin.instructor-request.update', $instructor) }}"
                        method="post"
                      >
                        @csrf
                        @method('PUT')
                        <select
                          class="form-select"
                          id=""
                          name="status"
                          onchange="$('.status-{{ $instructor->id }}').submit();"
                        >
                          <option value="pending" @selected($instructor->approve_status == 'pending')>Pending</option>
                          <option value="approved" @selected($instructor->approve_status == 'approved')>Approve</option>
                          <option value="rejected" @selected($instructor->approve_status == 'rejected')>Reject</option>
                        </select>
                      </form>
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
      </div>
    </div>
  </div>
@endsection
