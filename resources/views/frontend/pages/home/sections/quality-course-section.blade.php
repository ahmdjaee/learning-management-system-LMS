<section class="wsus__quality_courses mt_120 xs_mt_100">
  <div class="row quality_course_slider">
    <div class="quality_course_slider_item"
      style="background: url({{ asset('frontend/assets/images/quality_courses_bg.jpg') }});"
    >
      <div class="col-12">
        <div class="row align-items-center">
          <div class="col-xxl-5 col-xl-4 col-md-6 col-lg-7 wow fadeInLeft">
            <div class="wsus__quality_courses_text">
              <div class="wsus__section_heading heading_left mb_30">
                <h5>100% QUALITY COURSES</h5>
                <h2>{{ $featuredInstructor?->title }}</h2>
              </div>
              <p>{{ $featuredInstructor?->sub_title }}</p>
              <a class="common_btn"
                href="{{ $featuredInstructor?->button_url }}">{{ $featuredInstructor?->button_text }}<i
                  class="far fa-arrow-right"
                ></i></a>
            </div>
          </div>
          <div class="col-xxl-4 col-xl-4 col-md-6 col-lg-6 d-none d-xl-block wow fadeInUp">
            <div class="wsus__quality_courses_img">
              <img
                class="img-fluid w-100"
                src="{{ $featuredInstructor?->image }}"
                alt="Quality Courses"
              >
            </div>
          </div>
          <div class="col-xxl-3 col-xl-4 col-md-6 col-lg-5 wow fadeInUp">
            <div class="row quality_course_card_slider">
              @foreach ($featuredInstructorCourses as $course)
                <div class="col-12">
                  <x-course-card :course="$course" />
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
