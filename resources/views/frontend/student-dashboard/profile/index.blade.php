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
              <h1>Profile</h1>
              <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Profile</li>
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
        <div class="col-xl-9 col-md-8 wow fadeInRight">

          <form
            class="wsus__dashboard_contant"
            action="{{ route('student.profile.update') }}"
            method="post"
            enctype="multipart/form-data"
          >
            @csrf
            <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
              <div class="wsus__dashboard_heading">
                <h5>Update Your Information</h5>
                <p>Manage your personal information here.</p>
              </div>
            </div>

            <div class="wsus__dashboard_profile wsus__dashboard_profile_avatar">
              <div class="img">
                <img
                  class="img-fluid w-100"
                  id="profile_preview"
                  src="{{ asset(auth()->user()->image) }}"
                  alt="profile"
                >
                <label for="profile_photo">
                  <img
                    class="img-fluid w-100"
                    src="{{ asset('frontend/assets/images/dash_camera.png') }}"
                    alt="camera"
                  >
                </label>
                <input
                  id="profile_photo"
                  name="avatar"
                  type="file"
                  hidden=""
                  accept="image/*"
                >
                <script>
                  document.addEventListener('DOMContentLoaded', function() {
                    const input = document.getElementById('profile_photo');
                    const preview = document.getElementById('profile_preview');

                    input.onchange = evt => {
                      const [file] = input.files
                      if (file) {
                        preview.src = URL.createObjectURL(file)
                      }
                    }
                  })
                </script>
              </div>
              <div class="text">
                <h6>Your avatar</h6>
                <p>PNG or JPG no bigger than 400px wide and tall.</p>
              </div>
            </div>

            <div class="wsus__dashboard_profile_update">
              <div class="row">
                <div class="col-xl-12">
                  <div class="wsus__dashboard_profile_update_info">
                    <label>Full name</label>
                    <input
                      name="name"
                      type="text"
                      value="{{ auth()->user()->name }}"
                      placeholder="Enter your full name"
                    >
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />

                  </div>
                </div>
                <div class="col-xl-12">
                  <div class="wsus__dashboard_profile_update_info">
                    <label>Headline</label>
                    <input
                      name="headline"
                      type="text"
                      value="{{ auth()->user()->headline }}"
                      placeholder="Enter your headline"
                    >
                    <x-input-error class="mt-2" :messages="$errors->get('headline')" />

                  </div>
                </div>
                <div class="col-xl-6">
                  <div class="wsus__dashboard_profile_update_info">
                    <label>Email</label>
                    <input
                      name="email"
                      type="email"
                      value="{{ auth()->user()->email }}"
                      placeholder="Enter your email"
                    >
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                  </div>
                </div>
                <div class="col-xl-6">
                  <div class="wsus__dashboard_profile_update_info">
                    <label style="margin-bottom: 5px">Gender</label>
                    <select class="select_js" name="gender">
                      <option value="">Select Gender</option>
                      <option value="male" @selected(auth()->user()->gender == 'male')>Male</option>
                      <option value="female" @selected(auth()->user()->gender == 'female')>Female</option>
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('gender')" />

                  </div>
                </div>
                <div class="col-xl-12">
                  <div class="wsus__dashboard_profile_update_info">
                    <label>About Me</label>
                    <textarea
                      name="about"
                      rows="7"
                      placeholder="Your text here"
                    >{{ auth()->user()->bio }}</textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('about')" />

                  </div>
                </div>
                <div class="col-xl-12">
                  <div class="wsus__dashboard_profile_update_btn">
                    <button class="common_btn" type="submit">Update Profile</button>
                  </div>
                </div>
              </div>
            </div>
          </form>

          <div class="wsus__dashboard_contant">
            <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
              <div class="wsus__dashboard_heading">
                <h5>Update Your Password</h5>
                <p>Fill the field to update your password.</p>
              </div>
            </div>

            <form
              class="wsus__dashboard_profile_update"
              action="{{ route('student.profile.update-password') }}"
              method="post"
            >
              @csrf
              <div class="row">
                <div class="col-xl-12">
                  <div class="wsus__dashboard_profile_update_info">
                    <label>Current Password</label>
                    <input
                      name="current_password"
                      type="password"
                      placeholder="Enter your current password"
                    >
                    <x-input-error class="mt-2" :messages="$errors->get('current_password')" />

                  </div>
                </div>
                <div class="col-xl-6">
                  <div class="wsus__dashboard_profile_update_info">
                    <label>New Password</label>
                    <input
                      name="password"
                      type="password"
                      placeholder="Enter your new password"
                    >
                    <x-input-error class="mt-2" :messages="$errors->get('password')" />

                  </div>
                </div>
                <div class="col-xl-6">
                  <div class="wsus__dashboard_profile_update_info">
                    <label>Confirm Password</label>
                    <input
                      name="password_confirmation"
                      type="password"
                      placeholder="Enter your confirm password"
                    >
                    <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />

                  </div>
                </div>
                <div class="col-xl-12">
                  <div class="wsus__dashboard_profile_update_btn">
                    <button class="common_btn" type="submit">Update Password</button>
                  </div>
                </div>
              </div>
            </form>
          </div>

          <div class="wsus__dashboard_contant">
            <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
              <div class="wsus__dashboard_heading">
                <h5>Update Your Social Information</h5>
                <p>Put your social links here</p>
              </div>
            </div>

            <form
              class="wsus__dashboard_profile_update"
              action="{{ route('student.profile.update-social') }}"
              method="post"
            >
              @csrf
              <div class="row">
                <div class="col-xl-12">
                  <div class="wsus__dashboard_profile_update_info">
                    <label>Facebook</label>
                    <input
                      name="facebook"
                      type="text"
                      value="{{ auth()->user()->facebook }}"
                      placeholder="Enter your facebook url"
                    >
                    <x-input-error class="mt-2" :messages="$errors->get('facebook')" />
                  </div>
                </div>
                <div class="col-xl-12">
                  <div class="wsus__dashboard_profile_update_info">
                    <label>X</label>
                    <input
                      name="x"
                      type="text"
                      value="{{ auth()->user()->x }}"
                      placeholder="Enter your x url"
                    >
                    <x-input-error class="mt-2" :messages="$errors->get('x')" />
                  </div>
                </div>
                <div class="col-xl-12">
                  <div class="wsus__dashboard_profile_update_info">
                    <label>Linkedin</label>
                    <input
                      name="linkedin"
                      type="text"
                      value="{{ auth()->user()->linkedin }}"
                      placeholder="Enter your linkedin url"
                    >
                    <x-input-error class="mt-2" :messages="$errors->get('linkedin')" />
                  </div>
                </div>
                <div class="col-xl-12">
                  <div class="wsus__dashboard_profile_update_info">
                    <label>Website</label>
                    <input
                      name="website"
                      type="text"
                      value="{{ auth()->user()->website }}"
                      placeholder="Enter your website url"
                    >
                    <x-input-error class="mt-2" :messages="$errors->get('website')" />
                  </div>
                </div>

                <div class="col-xl-12">
                  <div class="wsus__dashboard_profile_update_btn">
                    <button class="common_btn" type="submit">Update Socials</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--===========================
                                  DASHBOARD OVERVIEW END
                              ============================-->
@endsection
