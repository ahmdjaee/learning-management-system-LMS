<div class="wsus__single_courses_3">
  <div class="wsus__single_courses_3_img">
    <img
      class="img-fluid"
      src="{{ asset($course->thumbnail) }}"
      alt="Courses"
    >
    <span class="time"><i class="far fa-clock"></i> 15 Hours</span>
  </div>
  <div class="wsus__single_courses_text_3">
    <div class="rating_area">
      <!-- <a class="category" href="#">Design</a> -->
      <p class="rating">
        @for ($i = 0; $i < 5; $i++)
          @if ($i < $course->reviews()->avg('rating'))
            <i class="fas fa-star"></i>
          @else
            <i class="far fa-star"></i>
          @endif
        @endfor
        <span>
          ({{ number_format($course->reviews()->avg('rating'), 1) ?? 0.0 }}
          Rating)
        </span>
      </p>
    </div>

    <a class="title" href="{{ route('courses.show', $course->slug) }}">{{ $course->title }}</a>
    <ul>
      <li>{{ $course->lessons->count() }} Lessons</li>
      <li>{{ $course->enrollments->count() }} Student</li>
    </ul>
    <a class="author" href="#">
      <div class="img">
        <img
          class="img-fluid"
          src="{{ asset($course->instructor->image) }}"
          alt="Author"
        >
      </div>
      <h4>{{ $course->instructor->name }}</h4>
    </a>
  </div>
  <div class="wsus__single_courses_3_footer">
    <a
      class="common_btn add-to-cart"
      data-course-id="{{ $course->id }}"
      href="#"
    >Add To Cart <i class="far fa-arrow-right"></i></a>
    <p>
      @if ($course->price == 0)
        FREE
      @elseif ($course->discount > 0)
        <del>${{ $course->price }}</del>
        ${{ $course->discount }}
      @else
        ${{ $course->price }}
      @endif
    </p>
  </div>
</div>
