@extends('frontend.layouts.master')

@section('content')
  <!--===========================
    BREADCRUMB START
    ============================-->
  <section class="wsus__breadcrumb" style="background: url(images/breadcrumb_bg.jpg);">
    <div class="wsus__breadcrumb_overlay">
      <div class="container">
        <div class="row">
          <div class="col-12 wow fadeInUp">
            <div class="wsus__breadcrumb_text">
              <h1>Become a Instructor</h1>
              <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Become a Instructor</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--===========================
        BREADCRUMB END
   ============================-->

  <!--===========================
        DASHBOARD OVERVIEW START
    ============================-->
  <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
    <div class="container">
      <div class="row">
        @include('frontend.student-dashboard.sidebar')
        <div class="col-xl-9 col-md-8">

          <div class="text-end">
            <a class="common_btn" href="{{ route('student.dashboard') }}">
              Back
            </a>
          </div>

          <div class="card mt-4">
            <div class="card-header">
              Become a Instructor
            </div>
            <div class="card-body">
              <form
                action="{{ route('student.become-instructor.update', auth()->user()) }}"
                enctype="multipart/form-data"
                method="post"
              >
                @csrf
                <div class="form-group">
                  <label>Document</label>
                  <input
                    class="form-control"
                    name="document"
                    type="file"
                    required
                    placeholder="Document"
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
                <button class="common_btn mt-3" type="submit">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--===========================
    DASHBOARD OVERVIEW END
    ============================-->
@endsection
