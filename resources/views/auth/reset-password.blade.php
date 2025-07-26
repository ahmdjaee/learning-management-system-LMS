@extends('frontend.layouts.master')

@section('content')
    
    <!--===========================
        SIGN IN START
    ============================-->
    <section class="wsus__sign_in">
        <div class="row align-items-center">
            <div class="col-xxl-5 col-xl-6 col-lg-6 wow fadeInLeft">
                <div class="wsus__sign_img">
                    <img src="{{ asset('frontend/assets/images/login_img_1.jpg') }}" alt="login" class="img-fluid">
                    <a href="/">
                        <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="EduCore" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-9 m-auto wow fadeInRight">
                <div class="wsus__sign_form_area">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf
                        
                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        
                        
                                <h2>Reset Password<span>!</span></h2>
                                <p class="new_user">Enter your new password</p>
                                
                                <!-- Session Status -->
                                <x-auth-session-status :status="session('status')" />

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Email*</label>
                                            <input type="email" placeholder="Email " name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Password*</a></label>
                                            <input type="password" name="password" required autocomplete="current-password" placeholder="Password">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <label>Confirm Password*</a></label>
                                            <input type="password" name="password_confirmation" required autocomplete="current-password" placeholder="Password">
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <button type="submit" class="common_btn">Reset Password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--===========================
        SIGN IN END
    ============================-->
@endsection
