@extends('admin.layouts.app')
@section('title', __('user.title_create'))
@section('content')
    <!-- Page content -->
    <div class="page-content pt-0">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.user.store')}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label class="font-weight-semibold @error('firstname') text-danger @enderror" for="firstname">{{__('messages.firstname')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <input type="text" name="firstname" id="firstname" class="form-control @error('firstname') border-danger @enderror" placeholder="{{__('messages.firstname')}}" value="{{ old('firstname') }}">
                                    </div>
                                    @error('firstname')
                                    <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="font-weight-semibold @error('lastname') text-danger @enderror" for="lastname">{{__('messages.lastname')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <input type="text" name="lastname" id="lastname" class="form-control @error('lastname') border-danger @enderror" placeholder="{{__('messages.lastname')}}" value="{{ old('lastname') }}">
                                    </div>
                                    @error('lastname')
                                    <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="font-weight-semibold @error('email') text-danger @enderror" for="email">{{__('messages.email')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <input type="email" name="email" id="email" class="form-control @error('email') border-danger @enderror" placeholder="{{__('messages.email')}}" value="{{ old('email') }}">
                                    </div>
                                    @error('email')
                                    <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="font-weight-semibold @error('phone') text-danger @enderror" for="phone">{{__('messages.phone')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <input type="text" name="phone" id="phone" class="form-control @error('phone') border-danger @enderror" placeholder="{{__('messages.phone')}}" value="{{ old('phone') }}">
                                    </div>
                                    @error('phone')
                                    <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="font-weight-semibold @error('password') text-danger @enderror" for="password">{{__('messages.password')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <input type="password" name="password" id="password" class="form-control @error('password') border-danger @enderror" placeholder="{{__('messages.password')}}" value="{{ old('password') }}">
                                    </div>
                                    @error('password')
                                    <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="font-weight-semibold @error('password_confirmation') text-danger @enderror" for="password_confirmation">{{__('messages.password_confirmation')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password') border-danger @enderror" placeholder="{{__('messages.password_confirmation')}}" value="{{ old('password_confirmation') }}">
                                    </div>
                                    @error('password_confirmation')
                                    <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="font-weight-semibold @error('birthday') text-danger @enderror" for="birthday">{{__('messages.birthday')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <input type="text" name="birthday" id="birthday" class="form-control @error('birthday') border-danger @enderror" placeholder="{{__('messages.birthday')}}" value="{{ old('birthday') }}">
                                    </div>
                                    @error('birthday')
                                    <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="gender">{{__('messages.gender')}}</label>
                                    <select name="gender" class="select" id="gender" @error('gender') data-container-css-class="border-danger text-danger" @enderror>
                                        <option {{ old('gender') == 1 ? 'selected': '' }} selected value="1">{{ __('messages.male') }}</option>
                                        <option {{ old('gender') == 2 ? 'selected': '' }} value="2">{{ __('messages.female') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="status" class="font-weight-semibold @error('status') text-danger @enderror">{{__('messages.status')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <select name="status" class="select" id="status" @error('status') data-container-css-class="border-danger text-danger" @enderror>
                                            <option {{old('status') == 1 ? 'selected': ''}} value="1">{{__('messages.enable')}}</option>
                                            <option {{old('status') == '0'? 'selected': ''}}  value="0">{{__('messages.disable')}}</option>
                                        </select>
                                    </div>
                                    @error('status')
                                    <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="role">{{__('messages.role')}}</label>
                                    <select multiple="multiple" name="roles[]" class="select" id="role">
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <x-save />
                                    <x-back route="admin.user.index"></x-back>
                                </div>
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
