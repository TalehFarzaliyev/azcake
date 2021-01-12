@extends('admin.auth.app')
@section('title', 'Login Page')
@section('content')

    <form class="login-form"  action="{{ route('admin.login') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="text-center mb-3">
                <h5 class="mb-0">Login to your account</h5>
                <span class="d-block text-muted">Your credentials</span>
            </div>

            <div class="form-group form-group-feedback form-group-feedback-left">
                <label style="width: 100%">
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}">
                </label>
                <div class="form-control-feedback">
                    <i class="icon-user text-muted"> </i>
                </div>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group form-group-feedback form-group-feedback-left">
                <label style="width: 100%">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}">
                </label>
                <div class="form-control-feedback">
                    <i class="icon-lock2 text-muted"> </i>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group d-flex align-items-center">
                <div class="form-check mb-0">
                    <label class="form-check-label">
                        <input type="checkbox" name="remember" name="remember" id="remember" class="form-input-styled" checked data-fouc {{ old('remember') ? 'checked' : '' }}>
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"> </i></button>
            </div>
        </div>
    </form>

@stop
