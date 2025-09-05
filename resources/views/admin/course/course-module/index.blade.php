@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Course Course</h3>
          <div class="card-actions">
            <div class="card-actions">
              <a class="btn btn-primary btn-3" {{-- href="{{ route('admin.course-courses.create') }}" --}}>
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
                  <th>Title</th>
                  <th>Price</th>
                  <th>Instructor</th>
                  <th>Status</th>
                  <th>Approve</th>
                  <th class="text-end">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($courses as $course)
                  <tr>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->price }}</td>
                    <td>{{ $course->instructor->name }}</td>
                    <td>
                      @if ($course->is_approved == 'pending')
                        <span class="badge bg-yellow text-yellow-fg">Pending</span>
                      @elseif ($course->is_approved == 'approved')
                        <span class="badge bg-green text-green-fg">Approved</span>
                      @else
                        <span class="badge bg-red text-red-fg">Pending</span>
                      @endif
                    </td>
                    <td>
                      <select
                        class="form-select update-approval-status"
                        name="status"
                        data-id="{{ $course->id }}"
                      >
                        <option value="pending" @selected($course->is_approved == 'pending')>Pending</option>
                        <option value="approved" @selected($course->is_approved == 'approved')>Approve</option>
                        <option value="rejected" @selected($course->is_approved == 'rejected')>Reject</option>
                      </select>
                    </td>
                    <td class="text-end ">
                      {{-- <button class="btn ">Blue badge</button> --}}
                      <a
                        class="btn btn-light "
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="Edit"
                        {{-- href="{{ route('admin.course-courses.edit', $course->id) }}" --}}
                      >
                        <i class="ti ti-edit"></i>
                      </a>
                      <a
                        class="btn btn-light text-danger delete-item"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="Delete"
                        {{-- href="{{ route('admin.course-courses.destroy', $course->id) }}" --}}
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
          {{ $courses->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection

@push('header_scripts')
  @vite(['resources/js/admin/course.js'])
@endpush
