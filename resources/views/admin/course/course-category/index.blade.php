@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Course Category</h3>
          <div class="card-actions">
            <a class="btn btn-primary btn-3" href="{{ route('admin.course-categories.create') }}">
              <i class="ti ti-plus me-2" style="font-size: 24px;"></i>
              Add new
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-vcenter card-table">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Icon</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Show At Trending</th>
                  <th>Status</th>
                  <th class="text-end">Action</th>
                </tr>
              </thead>
              <tbody>

                @forelse ($categories as $category)
                  <tr>
                    <td>
                      <img
                        class="object-cover"
                        src="{{ asset($category->image) }}"
                        srcset=""
                        alt=""
                        height="50"
                        width="50"
                      >
                    </td>
                    <td><i class="ti ti-{{ $category->icon }}" style="font-size: 24px"></i></td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                      @if ($category->show_at_trending)
                        <span class="badge bg-green-lt">Yes</span>
                      @else
                        <span class="badge bg-red-lt">No</span>
                      @endif
                    </td>
                    <td>
                      @if ($category->status)
                        <span class="badge bg-green-lt">Yes</span>
                      @else
                        <span class="badge bg-red-lt">No</span>
                      @endif
                    </td>
                    <td class="text-end">
                      <a
                        class="btn  btn-light "
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        href="{{ route('admin.course-sub-categories.index', $category->id) }}"
                        title="Sub Category"
                      >
                        <i class="ti ti-list"></i>
                      </a>
                      <a
                        class="btn  btn-light "
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        href="{{ route('admin.course-categories.edit', $category->id) }}"
                        title="Edit"
                      >
                        <i class="ti ti-edit"></i>
                      </a>
                      <a
                        class="btn  btn-light text-danger delete-item"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        href="{{ route('admin.course-categories.destroy', $category->id) }}"
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
          {{ $categories->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
