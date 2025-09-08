

@extends('admin.course.course-module.course-app')

@section('course-content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">More info</h3>
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
            <div class="add_course_more_info">
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
                  value="2"
                >
                <input
                  name="next_step"
                  type="hidden"
                  value="3"
                >
                <div class="row">
                  <div class="col-xl-6">
                    <div class="add_course_more_info_input">
                      <label for="#">Capacity</label>
                      <input
                        name="capacity"
                        type="text"
                        value="{{ $course?->capacity }}"
                        placeholder="Capacity"
                      >
                      <p>leave blank for unlimited</p>
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="add_course_more_info_input">
                      <label for="#">Course Duration (Minutes)*</label>
                      <input
                        name="duration"
                        type="text"
                        value="{{ $course?->duration }}"
                        placeholder="300"
                      >
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="add_course_more_info_checkbox">
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          id="flexCheckDefault"
                          name="qna"
                          type="checkbox"
                          value="1"
                          @checked($course?->qna == 1)
                        >
                        <label class="form-check-label" for="flexCheckDefault">Q&A</label>
                      </div>
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          id="flexCheckDefault2"
                          name="certificate"
                          type="checkbox"
                          value="1"
                          @checked($course?->certificate == 1)
                        >
                        <label class="form-check-label" for="flexCheckDefault2">Completion
                          Certificate</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="">
                        <label for="#" class="form-label">Category *</label>
                      <select class="tom-select" type="text" name="category_id">
                        <option value=""> Please Select </option>
                        @foreach ($categories as $category)
                          @if ($category->subCategories->isNotEmpty())
                            <optgroup label="{{ $category->name }}">
                              @foreach ($category->subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}" @selected($course?->category_id == $subCategory->id)>
                                  {{ $subCategory->name }}</option>
                              @endforeach
                            </optgroup>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="add_course_more_info_radio_box">
                      <h3>Level</h3>
                      @foreach ($levels as $level)
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            id="id-{{ $level->id }}"
                            name="course_level_id"
                            type="radio"
                            value="{{ $level->id }}"
                            @checked($course?->course_level_id == $level->id)
                          >
                          <label class="form-check-label" for="id-{{ $level->id }}">
                            {{ $level->name }}
                          </label>
                        </div>
                      @endforeach
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="add_course_more_info_radio_box">
                      <h3>Language</h3>
                      @foreach ($languages as $language)
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            id="id-{{ $language->id }}"
                            name="course_language_id"
                            type="radio"
                            value="{{ $language->id }}"
                            @checked($course?->course_language_id == $language->id)
                          >
                          <label class="form-check-label" for="id-{{ $language->id }}">
                            {{ $language->name }}
                          </label>
                        </div>
                      @endforeach

                    </div>
                  </div>
                  <div class="col-xl-12">
                    <button class="btn btn-primary btn-3" type="submit">Save</button>
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

@push('bottom-scripts')
  <script type="module">
    $('#lfm').filemanager('file', {
      prefix: '/admin/laravel-filemanager'
    });
  </script>
@endpush
