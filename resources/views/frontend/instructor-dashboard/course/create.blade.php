@extends('frontend.instructor-dashboard.course.course-app')

@section('course-content')
  <div
    class="tab-pane fade show active"
    id="pills-home"
    role="tabpanel"
    aria-labelledby="pills-home-tab"
    tabindex="0"
  >
    <div class="add_course_basic_info">
      <form
        class="basic-info-form course-form"
        action="{{ route('instructor.courses.store-basic-info') }}"
        enctype="multipart/form-data"
        method="post"
      >
        @csrf
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
                <option value="upload">Upload</option>
                <option value="youtube">Youtube</option>
                <option value="vimoe">Vimeo</option>
                <option value="eksternal_link">Eksternal Link</option>
              </select>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="add_course_basic_info_imput upload-source">
              <label for="#">Path</label>
              <div class="input-group">
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
                  readonly
                >
              </div>
            </div>
            <div class="add_course_basic_info_imput eksternal-source d-none">
              <label for="#">Path</label>
              <input
                class="source-input"
                name="url"
                type="url"
              >
            </div>

          </div>
          <div class="col-xl-6">
            <div class="add_course_basic_info_imput">
              <label for="#">Price *</label>
              <input
                name="price"
                type="text"
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
                placeholder="Price"
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
              ></textarea>
              <button class="common_btn mt_20" type="submit">Save</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $('#lfm').filemanager('file');
  </script>
@endpush
