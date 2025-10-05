@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Testimonials Section</h3>
          <div class="card-actions">
            <div class="card-actions">
              <a class="btn btn-primary btn-3" href="{{ route('admin.testimonials-section.create') }}">
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
                  <th>Image</th>
                  <th>User Name</th>
                  <th>User Title</th>
                  <th>Rating</th>
                  <th>Review</th>
                  <th class="text-end">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($testimonials as $testimonial)
                  <tr>
                    <td>
                      <img
                        src="{{ asset($testimonial->user_image) }}"
                        alt=""
                        width="100"
                      >
                    </td>
                    <td>{{ $testimonial->user_name }}</td>
                    <td>{{ $testimonial->user_title }}</td>

                    <td class="text-nowrap">
                      @for ($i = 0; $i < $testimonial->rating; $i++)
                        <i class="ti ti-star-filled text-warning "></i>
                      @endfor
                    </td>

                    <td>{{ $testimonial->review }}</td>

                    <td class="text-end ">
                      <a
                        class="btn btn-light "
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        href="{{ route('admin.testimonials-section.edit', $testimonial->id) }}"
                        title="Edit"
                      >
                        <i class="ti ti-edit"></i>
                      </a>
                      <a
                        class="btn btn-light text-danger delete-item"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        href="{{ route('admin.testimonials-section.destroy', $testimonial->id) }}"
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
      </div>
    </div>
  </div>
@endsection
