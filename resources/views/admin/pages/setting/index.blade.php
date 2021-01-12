@extends('admin.layouts.app')
@section('title', __('setting.title_index'))
@section('content')
    <!-- Page content -->
    <div class="page-content pt-0">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        @include('admin.particles._sessionmessage')
                        <form action="{{ route('admin.setting') }}" method="POST">
                            @csrf
                            <fieldset class="mb-3">
                                <div class="form-group row">
                                    <label for="site_title" class="col-form-label col-lg-2">{{ __('setting.site_title') }}</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="setting[site_title]" class="form-control" value="{{ old('site_title', $setting['site_title'] ?? null) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="site_url" class="col-form-label col-lg-2">{{ __('setting.site_url') }}</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="setting[site_title]" class="form-control" value="{{ old('site_url', $setting['site_url'] ?? null) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-form-label col-lg-2">{{ __('setting.email') }}</label>
                                    <div class="col-lg-10">
                                        <input type="email" name="setting[email]" class="form-control" value="{{ old('email', $setting['email'] ?? null) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-form-label col-lg-2">{{ __('setting.phone') }}</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="setting[phone]" class="form-control" value="{{ old('phone', $setting['phone'] ?? null) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="facebook" class="col-form-label col-lg-2">{{ __('setting.facebook') }}</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="setting[facebook]" class="form-control" value="{{ old('facebook', $setting['facebook'] ?? null) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="instagram" class="col-form-label col-lg-2">{{ __('setting.instagram') }}</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="setting[instagram]" class="form-control" value="{{ old('instagram', $setting['instagram'] ?? null) }}">
                                    </div>
                                </div>
                                @foreach(langs_get_code_name() as $key => $lang)
                                    <div class="form-group row">
                                        <label for="footer_message_az" class="col-form-label col-lg-2">{{ __('setting.address').' '.$key }}</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="setting[address_{{ $key }}]" class="form-control" value="{{ old('address_az', $setting['address_'.$key] ?? null) }}">
                                        </div>
                                    </div>
                                @endforeach
                                @foreach(langs_get_code_name() as $key => $lang)
                                    <div class="form-group row">
                                        <label for="footer_message" class="col-form-label col-lg-2">{{ __('setting.footer_message').' '.$key }}</label>
                                        <div class="col-lg-10">
                                            <input type="text" id="footer_message" name="setting[footer_message_{{ $key }}]" class="form-control" value="{{ old('footer_message_az', $setting['footer_message_'.$key] ?? null) }}">
                                        </div>
                                    </div>
                                @endforeach
                            </fieldset>
                            <div class="text-right">
                                <x-save/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
@stop
@section('script')
@stop
