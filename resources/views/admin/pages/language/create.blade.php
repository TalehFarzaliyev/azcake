@extends('admin.layouts.app')
@section('title', __('language.title_create'))
@section('content')
    <div class="page-content pt-0">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.language.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="font-weight-semibold @error('name') text-danger @enderror" for="name">{{__('messages.name')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <input type="text" name="name" id="name" class="form-control @error('name') border-danger @enderror" placeholder="{{__('messages.name')}}" value="{{ old('name') }}">
                                    </div>
                                    @error('name')
                                    <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="font-weight-semibold @error('code') text-danger @enderror" for="code">{{__('messages.code')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <input type="text" name="code" id="code" maxlength="2" minlength="2" class="form-control @error('code') border-danger @enderror" placeholder="{{__('messages.code')}}" value="{{ old('code') }}">
                                    </div>
                                    @error('code')
                                    <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="direction">{{__('messages.direction')}}</label>
                                    <select name="direction" id="direction" class="select">
                                        <option {{old('direction') == 'ltr' ? 'selected': ''}} value="ltr">{{ __('messages.ltr') }}</option>
                                        <option {{old('direction') == 'rtl' ? 'selected': ''}} value="rtl">{{ __('messages.rtl') }}</option>
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
                                <div class="col-sm-12">
                                    <x-save />
                                    <x-back route="admin.language.index"></x-back>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
