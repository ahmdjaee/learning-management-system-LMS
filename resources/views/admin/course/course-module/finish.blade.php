@extends('frontend.instructor-dashboard.course.course-app')

@section('course-content')
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
                class="select_2"
                name="status"
                required
              >
                <option value=""> Please Select </option>
                <option @selected(@$course->status == "active") value="active">Active</option>
                <option @selected(@$course->status == "inactive") value="inactive">Inactive</option>
                <option @selected(@$course->status == "draft") value="draft">Draft</option>
              </select>
              <button class="common_btn mt_25" type="submit">save</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
