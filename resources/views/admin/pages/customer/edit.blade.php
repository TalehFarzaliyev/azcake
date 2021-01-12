@extends('admin.layouts.app')
@section('title', __('customer.title_edit'))
@section('content')
    <!-- Page content -->
    <div class="page-content pt-0">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.customer.update',$customer->id)}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$customer->id}}" name="id">
                            {{ method_field('PUT') }}
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label class="font-weight-semibold @error('first_name') text-danger @enderror" for="first_name">{{__('messages.firstname')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') border-danger @enderror" placeholder="{{__('messages.firstname')}}" value="{{ old('first_name', $customer->first_name) }}">
                                    </div>
                                    @error('first_name')
                                    <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="font-weight-semibold @error('last_name') text-danger @enderror" for="last_name">{{__('messages.lastname')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') border-danger @enderror" placeholder="{{__('messages.lastname')}}" value="{{ old('last_name', $customer->last_name) }}">
                                    </div>
                                    @error('last_name')
                                    <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="font-weight-semibold @error('email') text-danger @enderror" for="email">{{__('messages.email')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <input type="email" name="email" id="email" class="form-control @error('email') border-danger @enderror" placeholder="{{__('messages.email')}}" value="{{ old('email',  $customer->email) }}">
                                    </div>
                                    @error('email')
                                    <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="font-weight-semibold @error('phone') text-danger @enderror" for="phone">{{__('messages.phone')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <input type="text" name="phone" id="phone" class="form-control @error('phone') border-danger @enderror" placeholder="{{__('messages.phone')}}" value="{{ old('phone',  $customer->phone) }}">
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
                                    <label for="status" class="font-weight-semibold @error('status') text-danger @enderror">{{__('messages.status')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <select name="status" class="select" id="status" @error('status') data-container-css-class="border-danger text-danger" @enderror>
                                            <option {{old('status',  $customer->status) == 1 ? 'selected': ''}} value="1">{{__('messages.enable')}}</option>
                                            <option {{old('status',  $customer->status) == '0'? 'selected': ''}}  value="0">{{__('messages.disable')}}</option>
                                        </select>
                                    </div>
                                    @error('status')
                                    <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <x-save />
                                    <x-back route="admin.customer.index"></x-back>
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
