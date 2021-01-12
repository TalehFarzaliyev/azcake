@extends('site.layouts.app')
@section('title', __('messages.home'))
@section('content')
<section class="breadcrumbs-custom">
    <div class="parallax-container breadcrumbs_section">
        <div class="breadcrumbs-custom-body parallax-content context-dark">
            <div class="container">
                <h1 class="breadcrumbs-custom-title">Login</h1>
            </div>
        </div>
    </div>
    <div class="breadcrumbs-custom-footer">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Login</li>
            </ul>
        </div>
    </div>
</section>
<section class="section section-xl bg-default text-md-left">
    <div class="container">
        <form data-form-output="form-output-global" data-form-type="contact" method="post" action="{{route('login')}}">
            <div class="row row-20 row-md-30 display-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="row row-20 row-md-30">
                        <div class="col-lg-12">
                            <div class="title-classic">
                                <h3 class="title-classic-title">Giriş</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row row-20 row-md-30">
                        @csrf
                        <div class="col-sm-6">
                            <div class="form-wrap">
                                <input class="form-input {{ $errors->has('email') ? ' form-control-has-validation' : '' }}" value="{{old('email')}}" id="contact-email-2" type="email" name="email"/>
                                @if ($errors->has('password'))
                                <span class="form-validation">{{ $errors->first('email') }}</span>
                                @endif
                                <label class="form-label" for="contact-email-2">E-mail</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-wrap">
                                <input class="form-input {{ $errors->has('password') ? ' form-control-has-validation' : '' }}" id="contact-password-2" type="password" name="password"/>
                                @if ($errors->has('password'))
                                <span class="form-validation">{{ $errors->first('password') }}</span>
                                @endif
                                <label class="form-label" for="contact-password-2">Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="row row-20 row-md-30">
                        <div class="col-md-12">
                            <div class="title-classic mt-5 justify-content-around">
                                <h3 class="title-classic-title ml-3">
                                    <button class="button button-sm button-primary button-zakaria" type="submit">Login</button>
                                </h3>
                                <p class="title-classic-subtitle"> Don't have an account? <a href="{{route('register')}}">Register</a> </p>
                                <p class="title-classic-subtitle float-right"><a href="">Forgot your password?</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>
@endsection