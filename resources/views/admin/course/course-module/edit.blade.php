@extends('admin.course.course-module.course-app')

@section('course-content')
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Course</h3>
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
            <div class="add_course_basic_info">
              <form
                class="basic-info-update-form course-form"
                action="{{ route('admin.courses.store-basic-info') }}"
                enctype="multipart/form-data"
                method="post"
              >
                @csrf
                <input
                  name="id"
                  type="hidden"
                  value="{{ $course->id }}"
                >
                <input
                  name="current_step"
                  type="hidden"
                  value="1"
                >
                <input
                  name="next_step"
                  type="hidden"
                  value="2"
                >
                <div class="row">
                  <div class="col-xl-12">
                    <div class="add_course_basic_info_imput">
                      <label for="#">Title *</label>
                      <input
                        name="title"
                        type="text"
                        value="{{ $course->title }}"
                        placeholder="Title"
                      >
                    </div>
                  </div>
                  <div class="col-xl-12">
                    <div class="add_course_basic_info_imput">
                      <label for="#">Seo description</label>
                      <input
                        name="seo_description"
                        type="text"
                        value="{{ $course->seo_description }}"
                        placeholder="Seo description"
                      >
                    </div>
                  </div>
                  <div class="col-xl-12">
                    <div class="add_course_basic_info_imput">
                      <label for="#">Thumbnail *</label>
                      <input name="thumbnail" type="file">
                    </div>
                  </div>

                  <div class="col-xl-6">
                    <div class="add_course_basic_info_imput">
                      <label for="#">Demo Video Storage <b>(optional)</b></label>
                      <select class="select_js storage" name="demo_video_storage">
                        <option value=""> Please Select </option>
                        <option value="upload" @selected($course?->demo_video_storage == 'upload')>Upload</option>
                        <option value="youtube" @selected($course?->demo_video_storage == 'youtube')>Youtube</option>
                        <option value="vimoe" @selected($course?->demo_video_storage == 'vimoe')>Vimeo</option>
                        <option value="eksternal_link" @selected($course?->demo_video_storage == 'eksternal_link')>Eksternal Link
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div
                      class="add_course_basic_info_imput upload-source {{ $course?->demo_video_storage != 'upload' ? 'd-none' : '' }}"
                    >
                      <label for="#">Path</label>
                      <div class="input-group ">
                        <span class="input-group-btn">
                          <a
                            class="btn btn-primary"
                            id="lfm"
                            data-input="thumbnail"
                            data-preview="holder"
                          >
                            <i class="fa fa-picture-o"></i> Choose
                          </a>
                        </span>
                        <input
                          class="form-control source-input"
                          id="thumbnail"
                          name="file"
                          type="text"
                          value="{{ $course?->demo_video_source }}"
                          readonly
                        >
                      </div>
                    </div>
                    <div
                      class="add_course_basic_info_imput eksternal-source {{ $course?->demo_video_storage == 'upload' ? 'd-none' : '' }}"
                    >
                      <label for="#">Path</label>
                      <input
                        class="source-input"
                        name="url"
                        type="url"
                        value="{{ $course?->demo_video_source }}"
                      >
                    </div>

                  </div>
                  <div class="col-xl-6">
                    <div class="add_course_basic_info_imput">
                      <label for="#">Price *</label>
                      <input
                        name="price"
                        type="text"
                        value="{{ $course->price }}"
                        placeholder="Price"
                      >
                      <p>Put 0 for free</p>
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="add_course_basic_info_imput">
                      <label for="#">Discount Price</label>
                      <input
                        name="discount"
                        type="text"
                        value="{{ $course->discount }}"
                        placeholder="Discount"
                      >
                    </div>
                  </div>
                  <div class="col-xl-12">
                    <div class="add_course_basic_info_imput mb-0">
                      <label for="#">Description</label>
                      <textarea
                        name="description"
                        rows="8"
                        placeholder="Description"
                      >{!! $course->description !!}</textarea>
                      <button class="btn btn-primary btn-3 mt-3" type="submit">Save</button>
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

@push('bottom-scripts')
  <script type="module">
    $('#lfm').filemanager('file', {
      prefix: '/admin/laravel-filemanager'
    });
  </script>
@endpush
