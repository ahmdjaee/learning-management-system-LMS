@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Reviews</h3>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-vcenter card-table">
              <thead>
                <tr>
                  <th>Course</th>
                  <th>User</th>
                  <th>Rating</th>
                  <th>Review</th>
                  <th>Status</th>
                  <th class="text-end">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($reviews as $review)
                  <tr>
                    <td>
                      <div>{{ $review->course->title }}</div>
                      <small class="text-muted">{{ $review->course->instructor->email }}</small>
                    </td>
                    <td>
                      <div>{{ $review->user->name }}</div>
                      <small class="text-muted">{{ $review->user->email }}</small>
                    </td>
                    <td class="text-nowrap">
                      @for ($i = 0; $i < $review->rating; $i++)
                        <i class="ti ti-star-filled text-warning "></i>
                      @endfor
                    </td>
                    <td style="width: 35%">
                      {{ $review->review }}
                    </td>
                    <td>
                      @if ($review->status == 1)
                        <span class="badge bg-green text-green-fg">Approved</span>
                      @elseif ($review->status == 0)
                        <span class="badge bg-yellow text-yellow-fg">Pending</span>
                      @endif
                    </td>
                    <td class="justify-content-end d-flex">
                      <form style="width: 130px" action="{{ route('admin.course-reviews.update', $review->id) }}"
                        method="post"
                      >
                        @csrf
                        @method('put')
                        <select
                          class="form-select me-3"
                          name="status"
                          
                          onchange="this.form.submit()"
                        >
                          <option value="1" @selected($review->status == 1)>Approve</option>
                          <option value="0" @selected($review->status == 0)>Pending</option>
                        </select>
                      </form>
                      <a
                        class="btn btn-light text-danger delete-item"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        href="{{ route('admin.course-reviews.destroy', $review->id) }}"
                        title="Delete"
                      >
                        <i class="ti ti-trash-x"></i>
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
          {{ $reviews->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
