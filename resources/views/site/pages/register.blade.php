@extends('site.layouts.app')
@section('title', __('messages.home'))
@section('content')
    <section class="breadcrumbs-custom">
        <div class="parallax-container breadcrumbs_section">
            <div class="breadcrumbs-custom-body parallax-content context-dark">
                <div class="container">
                    <h1 class="breadcrumbs-custom-title">Register</h1>
                </div>
            </div>
        </div>
        <div class="breadcrumbs-custom-footer">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="active">Register</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="section section-xl bg-default text-md-left">
        <div class="container">
            <form data-form-output="form-output-global" data-form-type="contact" method="post" action="{{route('register')}}">
                <div class="row row-20 row-md-30 display-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="row row-20 row-md-30">
                            <div class="col-lg-12">
                                <div class="title-classic mb-5">
                                    <h3 class="title-classic-title">Register</h3>
                                    <p class="title-classic-subtitle">If you are a new user of the site, please fill out the registration form.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row row-20 row-md-30">
                            @csrf
                            <input type="hidden" name="site" value="1"/>
                            <div class="col-sm-6">
                                <div class="form-wrap">
                                    <input class="form-input {{ $errors->has('first_name') ? ' form-control-has-validation' : '' }}" value="{{old('first_name')}}" id="contact-first-name-2" type="text" name="first_name" data-constraints="@Required"/>
                                    @if ($errors->has('first_name'))
                                    <span class="form-validation">{{ $errors->first('first_name') }}</span>
                                    @endif
                                    <label class="form-label" for="contact-first-name-2">First Name</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-wrap">
                                    <input class="form-input {{ $errors->has('last_name') ? ' form-control-has-validation' : '' }}" value="{{old('last_name')}}" id="contact-last-name-2" type="text" name="last_name" data-constraints="@Required"/>
                                    @if ($errors->has('last_name'))
                                    <span class="form-validation">{{ $errors->first('last_name') }}</span>
                                    @endif
                                    <label class="form-label" for="contact-last-name-2">Last Name</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-wrap">
                                    <input class="form-input {{ $errors->has('email') ? ' form-control-has-validation' : '' }}" value="{{old('email')}}" id="contact-email-2" type="email" name="email" data-constraints="@Required"/>
                                    @if ($errors->has('email'))
                                    <span class="form-validation">{{ $errors->first('email') }}</span>
                                    @endif
                                    <label class="form-label" for="contact-email-2">E-mail</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-wrap">
                                    <input class="form-input {{ $errors->has('phone') ? ' form-control-has-validation' : '' }}" value="{{old('phone')}}" id="contact-phone-2" type="text" name="phone" data-constraints="@Required"/>
                                    @if ($errors->has('phone'))
                                    <span class="form-validation">{{ $errors->first('phone') }}</span>
                                    @endif
                                    <label class="form-label" for="contact-phone-2">Phone</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-wrap">
                                    <input class="form-input {{ $errors->has('password') ? ' form-control-has-validation' : '' }}" id="contact-password-2" type="password" name="password" data-constraints="@Required"/>
                                    @if ($errors->has('password'))
                                    <span class="form-validation">{{ $errors->first('password') }}</span>
                                    @endif
                                    <label class="form-label" for="contact-password-2">Password</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-wrap">
                                    <input class="form-input {{ $errors->has('password_confirmation') ? ' form-control-has-validation' : '' }}" id="contact-rePassword-2" type="password" name="password_confirmation" data-constraints="@Required"/>
                                    @if ($errors->has('password_confirmation'))
                                    <span class="form-validation">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                    <label class="form-label" for="contact-rePassword-2">Retype Password</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-wrap">
                                    <label class="form-label" for="contact-message-2">Ünvan</label>
                                    <textarea class="form-input textarea-lg {{ $errors->has('address') ? ' form-control-has-validation' : '' }}"
                                              id="contact-message-2" name="address" data-constraints="@Required">{{ old('address')}}</textarea>
                                    @if ($errors->has('address'))
                                        <span class="form-validation">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row row-20 row-md-30">
                            <div class="col-lg-12">
                                <div class="title-classic mt-5">
                                    <h3 class="title-classic-title">
                                        <button class="button button-sm button-primary button-zakaria" type="submit">Register</button>
                                    </h3>
                                    <p class="title-classic-subtitle">Do you already have an account? <a href="{{route('login')}}">Login</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection