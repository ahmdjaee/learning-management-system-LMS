{{-- @extends('admin.course.course-module.course-app')

@section('course-content')

@endsection --}}

@extends('admin.course.course-module.course-app')

@section('course-content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create Course</h3>
          <div class="card-actions">
            <div class="card-actions">
              <a class="btn btn-primary btn-3" href="{{ route('admin.courses.index') }}">
                <i class="ti ti-arrow-left me-2" style="font-size: 24px"></i>
                Back
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div
            class="tab-pane fade show active"
            id="pills-home"
            role="tabpanel"
            aria-labelledby="pills-home-tab"
            tabindex="0"
          >
            <div class="dashboard_add_course_finish ">
              <form class="course-form more-info-form" action="#">
                @csrf
                <input
                  name="id"
                  type="hidden"
                  value="{{ @$course?->id }}"
                >
                <input
                  name="current_step"
                  type="hidden"
                  value="4"
                >
                <input
                  name="next_step"
                  type="hidden"
                  value=""
                >
                <div class="row">
                  <div class="col-xl-12">
                    <div class="add_course_more_info_input">
                      <label for="#">Message for Reviewer</label>
                      <textarea
                        name="message_for_reviewer"
                        rows="7"
                        placeholder="Message for Reviewer"
                      >{!! @$course?->message_for_reviewer !!}</textarea>
                    </div>
                  </div>
                  <div class="col-xl-12">
                    <div class="add_course_more_info_input mb-0">
                      <label for="#">Status *</label>
                      <select
                        class="form-select"
                        name="status"
                        required
                      >
                        <option value=""> Please Select </option>
                        <option value="active" @selected(@$course->status == 'active')>Active</option>
                        <option value="inactive" @selected(@$course->status == 'inactive')>Inactive</option>
                        <option value="draft" @selected(@$course->status == 'draft')>Draft</option>
                      </select>
                      <button class="btn btn-primary btn-3 mt-3" type="submit">save</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
