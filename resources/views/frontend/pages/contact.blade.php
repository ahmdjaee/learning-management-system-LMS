@extends('frontend.layouts.master')

@section('content')
  {{-- ===========================
        BREADCRUMB START
    ============================ --}}
  <section class="wsus__breadcrumb" style="background: url({{ asset(config('settings.site_breadcrumb')) }});">
    <div class="wsus__breadcrumb_overlay">
      <div class="container">
        <div class="row">
          <div class="col-12 wow fadeInUp">
            <div class="wsus__breadcrumb_text">
              <h1>Contact Us</h1>
              <ul>
                <li><a href="#">Home</a></li>
                <li>Contact Us</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- ===========================
        BREADCRUMB END
    ============================ --}}

  {{-- ===========================
        CONTACT US START
    ============================ --}}
  <section class="wsus__contact_us mt_95 xs_mt_75 pb_120 xs_pb_100">
    <div class="container">
      <div class="row">
        @foreach ($contactCards as $card)
          <div class="col-xl-3 col-md-6 col-lg-4 wow fadeInUp">
            <div class="wsus__contact_info">
              <div class="icon">
                <img
                  class="img-fluid"
                  src="{{ asset($card->icon) }}"
                  alt="contact"
                >
              </div>
              <h4>{{ $card->title }}</h4>
              <p>{{$card->line_1}}</p>
              <p>{{$card->line_2}}</p>
            </div>
          </div>
        @endforeach
      </div>
      <div class="wsus__contact_form_area mt_30 wow fadeInUp">
        <div class="row align-items-center">
          <div class="col-xl-4 col-lg-5 d-md-none d-lg-block">
            <div class="wsus__contact_form_img">
              <img
                class="img-fluid"
                src="{{ asset($setting?->image) }}"
                alt="contact"
              >
            </div>
          </div>
          <div class="col-xl-8 col-lg-7">
            <form method="post" action="" class="wsus__contact_form">
              @csrf
              <h4>Send Us Message</h4>
              <p>Your email address will not be published. Required fields are marked *</p>

              <div class="row">
                <div class="col-xl-6 col-md-6">
                  <input type="text" placeholder="Name*" name="name" required>
                  <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <div class="col-xl-6 col-md-6">
                  <input type="email" placeholder="Email*" name="email" required>
                  <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>
                <div class="col-12">
                  <input type="text" placeholder="Subject*" name="subject" required>
                  <x-input-error :messages="$errors->get('subject')" class="mt-2"/>
                </div>
                <div class="col-xl-12">
                  <textarea rows="5" placeholder="message*" name="message" required></textarea>
                  <x-input-error :messages="$errors->get('message')" class="mt-2"/>
                  <button class="common_btn" type="submit">Submit Now</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="wsus__contact_map mt_120 xs_mt_100 wow fadeInUp">
      <iframe
        src="{{ $setting?->map_url }}"
        style="border:0;"
        width="600"
        height="450"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>
    </div>
  </section>
  {{-- ===========================
        CONTACT US END
    ============================ --}}
@endsection
