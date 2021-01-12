@extends('admin.layouts.app')
@section('title', __('contact.title_show'))
@section('content')
    <!-- Page content -->
    <div class="page-content pt-0">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                <div class="card">
                    <div class="card-body tab-content">
                        <div class="fade show">
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <label for="name">{{__('messages.name')}}</label>
                                    <input type="text" class="form-control " name="name" id="name"
                                           value="{{ $contact->name }}">
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="subject">{{__('messages.subject')}}</label>
                                    <input type="text" class="form-control " name="subject" id="subject"
                                           value="{{ $contact->subject }}">
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="email">{{__('messages.email')}}</label>
                                    <input type="email" class="form-control " name="email" id="email"
                                           value="{{ $contact->email }}">
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>{{__('messages.message')}}</label>
                                    <textarea name="message" class="form-control" rows="10"
                                              cols="30">{{ $contact->message }}</textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-sm-12">
                                <x-back route="admin.contact.index"></x-back>
                            </div>
                        </div>
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
