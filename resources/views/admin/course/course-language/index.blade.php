@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Course Language</h3>
          <div class="card-actions">
            <div class="card-actions">
              <a class="btn btn-primary btn-3" href="{{ route('admin.course-languages.create') }}">
                <i class="ti ti-plus me-2" style="font-size: 24px"></i>
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
                  <th>Slug</th>
                  <th class="text-end">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($languages as $language)
                  <tr>
                    <td>{{ $language->name }}</td>
                    <td>
                      {{ $language->slug }}
                    </td>
                    <td class="text-end">
                      <a href="{{ route('admin.course-languages.edit', $language->id)  }}" class="btn btn-sm btn-primary">
                        <i class="ti ti-edit"></i>
                      </a>
                      <a href="{{ route('admin.course-languages.destroy', $language->id) }}" class="btn btn-sm btn-danger delete-item">
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
          {{ $languages->links() }}
        </div>
      </div>
    </div>
  </div>


 
@endsection
