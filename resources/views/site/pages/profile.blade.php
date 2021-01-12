@extends('site.layouts.app')
@section('title', __('messages.home'))
@section('content')
<section class="breadcrumbs-custom">
    <div class="parallax-container breadcrumbs_section">
        <div class="breadcrumbs-custom-body parallax-content context-dark">
            <div class="container">
                <h1 class="breadcrumbs-custom-title">AzCake keyfiyyətə zəmanət verir!</h1>
            </div>
        </div>
    </div>
    <div class="breadcrumbs-custom-footer">
        <div class="container display-flex justify-content-center">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-bag-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.5 3.5a2.5 2.5 0 0 1 5 0V4h-5v-.5zm6 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                        </svg> Cari Sifarişlər</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-bag-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.5 3.5a2.5 2.5 0 0 1 5 0V4h-5v-.5zm6 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
                        </svg>
                        Sifarişlərin Tarixi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-credit-card-2-front-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                        </svg>
                        Profil Ayarları
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <section class="section section-xl bg-default text-center">
            <div class="container">
                <div class="title-group">
                    <h3>Table styles</h3>
                    <p class="big font-family-sans-serif-1">Tables have always been perfect for displaying facts and numbers.</p>
                    <p class="big font-family-sans-serif-1">Now you can benefit from using them on your website.</p>
                </div>
                <div class="table-custom-responsive">
                    <table class="table-custom table-custom-primary">
                        <thead>
                        <tr>
                            <th>Column 1</th>
                            <th>Column 2</th>
                            <th>Column 3</th>
                            <th>Column 4</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Item #1</td>
                            <td>Description</td>
                            <td>Subtotal</td>
                            <td>$3.00</td>
                        </tr>
                        <tr>
                            <td>Item #2</td>
                            <td>Description</td>
                            <td>Discount</td>
                            <td>$3.00</td>
                        </tr>
                        <tr>
                            <td>Item #3</td>
                            <td>Description</td>
                            <td>Shipping</td>
                            <td>$3.00</td>
                        </tr>
                        <tr>
                            <td>Item #4</td>
                            <td>Description</td>
                            <td>Tax</td>
                            <td>$4.00</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>All Items</td>
                            <td>Description</td>
                            <td>Your Total</td>
                            <td>$13.00</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <section class="section section-md bg-default">
            <div class="container">
                <div class="table-custom-responsive">
                    <table class="table-custom table-custom-bordered">
                        <thead>
                        <tr>
                            <th>Column 1</th>
                            <th>Column 2</th>
                            <th>Column 3</th>
                            <th>Column 4</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Item #1</td>
                            <td>Description</td>
                            <td>Subtotal</td>
                            <td>$3.00</td>
                        </tr>
                        <tr>
                            <td>Item #2</td>
                            <td>Description</td>
                            <td>Discount</td>
                            <td>$3.00</td>
                        </tr>
                        <tr>
                            <td>Item #3</td>
                            <td>Description</td>
                            <td>Shipping</td>
                            <td>$3.00</td>
                        </tr>
                        <tr>
                            <td>Item #4</td>
                            <td>Description</td>
                            <td>Tax</td>
                            <td>$4.00</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>All Items</td>
                            <td>Description</td>
                            <td>Your Total</td>
                            <td>$13.00</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <section class="section section-sm section-first bg-default text-md-left">
            <div class="container">
                <h3>General Infromation</h3>
                <form method="post" action="{{route('profile-update')}}">
                    <div class="row row-20 row-md-30">
                        <div class="col-lg-8">
                            <div class="row row-20 row-md-30">
                                @csrf
                                <div class="col-sm-6">
                                    <div class="form-wrap">
                                        <input class="form-input {{ $errors->has('first_name') ? ' form-control-has-validation' : '' }}"
                                               value="{{ old('first_name') ?? auth()->guard('customer')->user()->first_name }}"
                                               id="contact-first-name-2" type="text" name="first_name" data-constraints="@Required"/>
                                        @if ($errors->has('first_name'))
                                            <span class="form-validation">{{ $errors->first('first_name') }}</span>
                                        @endif
                                        <label class="form-label" for="contact-first-name-2">First Name</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-wrap">
                                        <input class="form-input {{ $errors->has('last_name') ? ' form-control-has-validation' : '' }}"
                                               value="{{ old('last_name') ?? auth()->guard('customer')->user()->last_name }}"
                                               id="contact-last-name-2" type="text" name="last_name" data-constraints="@Required"/>
                                        @if ($errors->has('last_name'))
                                            <span class="form-validation">{{ $errors->first('last_name') }}</span>
                                        @endif
                                        <label class="form-label" for="contact-last-name-2">Last Name</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-wrap">
                                        <input class="form-input {{ $errors->has('email') ? ' form-control-has-validation' : '' }}"
                                               value="{{ old('email') ?? auth()->guard('customer')->user()->email }}"
                                               id="contact-email-2" type="email" name="email" readonly/>
                                        @if ($errors->has('email'))
                                        <span class="form-validation">{{ $errors->first('email') }}</span>
                                        @endif
                                        <label class="form-label" for="contact-email-2">E-mail</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-wrap">
                                        <input class="form-input {{ $errors->has('phone') ? ' form-control-has-validation' : '' }}"
                                               value="{{ old('phone') ?? auth()->guard('customer')->user()->phone }}"
                                               id="contact-phone-2" type="text" name="phone" data-constraints="@Numeric"/>
                                        @if ($errors->has('phone'))
                                        <span class="form-validation">{{ $errors->first('phone') }}</span>
                                        @endif
                                        <label class="form-label" for="contact-phone-2">Phone</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-wrap">
                                <label class="form-label" for="contact-message-2">Ünvan</label>
                                <textarea class="form-input textarea-lg {{ $errors->has('address') ? ' form-control-has-validation' : '' }}"
                                          id="contact-message-2" name="address" data-constraints="@Required">{{ old('address') ?? auth()->guard('customer')->user()->address }}</textarea>
                                @if ($errors->has('address'))
                                    <span class="form-validation">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button class="button button-sm button-primary button-zakaria" type="submit">Change</button>
                </form>
            </div>
        </section>

        <section class="section section-sm section-first bg-default text-md-left">
            <div class="container">
                <h3>Update Password</h3>
                <form method="post" action="{{route('password-update')}}">
                    <div class="row row-20 row-md-30">
                        <div class="col-lg-8">
                            <div class="row row-20 row-md-30">
                                @csrf
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
                            </div>
                        </div>
                    </div>
                    <button class="button button-sm button-primary button-zakaria" type="submit">Change Password</button>
                </form>
            </div>
        </section>
    </div>
</div>
@endsection