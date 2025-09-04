@extends('frontend.instructor-dashboard.course.course-app')

@section('course-content')
  <div
    class="tab-pane fade show active"
    id="pills-home"
    role="tabpanel"
    aria-labelledby="pills-home-tab"
    tabindex="0"
  >
    <div class="add_course_content">
      <form class="more-info-form course-form" action="#">
        @csrf
        <input
          name="id"
          type="hidden"
          value="{{ request()?->id }}"
        >
        <input
          name="current_step"
          type="hidden"
          value="3"
        >
        <input
          name="next_step"
          type="hidden"
          value="4"
        >
      </form>
      <div class="add_course_content_btn_area d-flex flex-wrap justify-content-between">
        <a class="common_btn dynamic-modal-btn" data-id="{{ $courseId }}">Add New Chapter</a>
        <a class="common_btn" href="#">Short Chapter</a>
      </div>
      <div class="accordion" id="accordionExample">
        @foreach ($chapters as $chapter)
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button
                class="accordion-button collapsed"
                data-bs-toggle="collapse"
                data-bs-target="#collapse-{{ $chapter->id }}"
                type="button"
                aria-expanded="false"
                aria-controls="collapse-{{ $chapter->id }}"
              >
                <span>{{ $chapter->title }}</span>
              </button>
              <div class="add_course_content_action_btn">
                <div class="dropdown">
                  <div
                    class="btn btn-secondary dropdown-toggle"
                    data-bs-toggle="dropdown"
                    type="button"
                    aria-expanded="false"
                  >
                    <i class="far fa-plus"></i>
                  </div>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a
                        class="dropdown-item add-lesson"
                        data-chapter-id="{{ $chapter->id }}"
                        data-course-id="{{ $courseId }}"
                        href="javascript:;"
                      >Add Lesson</a>
                    </li>
                    <li><a class="dropdown-item" href="#">Add Document</a>
                    </li>
                    <li><a class="dropdown-item" href="#">Add Quiz</a></li>
                  </ul>
                </div>
                <a class="edit edit-chapter" data-chapter-id="{{ $chapter->id }}" href="#"><i class="far fa-edit"></i></a>
                <a class="del delete-item" href="{{ route('instructor.course-content.destroy-chapter', $chapter->id) }}"><i class="fas fa-trash-alt"></i></a>
              </div>
            </h2>
            <div
              class="accordion-collapse collapse"
              id="collapse-{{ $chapter->id }}"
              data-bs-parent="#accordionExample"
            >
              <div class="accordion-body">
                <ul class="item_list sortable-list">
                  @foreach ($chapter->lessons as $lesson)
                    <li class="" data-lesson-id="{{ $lesson->id }}" data-chapter-id="{{ $chapter->id }}">
                      <span>{{ $lesson->title }}</span>
                      <div class="add_course_content_action_btn">
                        <a
                          class="edit edit-lesson"
                          data-chapter-id="{{ $chapter->id }}"
                          data-course-id="{{ $courseId }}"
                          data-lesson-id="{{ $lesson->id }}"
                          href="#"
                        ><i class="far fa-edit"></i></a>
                        <a class="del delete-item" href="{{ route('instructor.course-content.destroy-lesson', $lesson->id) }}"><i class="fas fa-trash-alt"></i></a>
                        <a class="arrow dragger" style="cursor: grab" href="javascript:;"><i class="fas fa-arrows-alt"></i></a>
                      </div>
                    </li>
                  @endforeach
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
