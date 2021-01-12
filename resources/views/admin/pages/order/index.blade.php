@extends('admin.layouts.app')
@section('title', __('contact.title_index'))
@section('content')
    <!-- Page content -->
    <div class="page-content pt-0">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="get">
                            <input type="hidden" name="column" value="{{request('column')}}">
                            <input type="hidden" name="order" value="{{request('order')}}">
                            <div class="form-row">
                                <div class="form-group col-sm-3">
                                    <label for="name">{{__('messages.name')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('messages.name')}}" name="name" id="name" value="{{request('name')}}">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="subject">{{__('messages.subject')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('messages.subject')}}" name="subject" id="subject" value="{{request('subject')}}">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="email">{{__('messages.email')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('messages.email')}}" name="email" id="email" value="{{request('email')}}">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="message">{{__('messages.message')}}</label>
                                    <input type="text" class="form-control" name="message" id="message" placeholder="{{__('messages.message')}}" value="{{request('message')}}">
                                </div>

                                <div class="col-sm-12">
                                    <x-search/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @include('admin.particles._sessionmessage')
                <div class="card">
{{--                    <div class="card-body">--}}
{{--                        <x-create route="admin.contact.create"/>--}}
{{--                    </div>--}}
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th><a class="{{ column_active('id')}}" href="{{ sort_url('id')}}">#</a></th>
                                <th><a class="{{ column_active('name')}}" href="{{ sort_url('name')}}">{{__('messages.name')}}</a></th>
                                <th><a class="{{ column_active('subject')}}" href="{{ sort_url('subject')}}">{{__('messages.subject')}}</a></th>
                                <th><a class="{{ column_active('email')}}" href="{{ sort_url('email')}}">{{__('messages.email')}}</a></th>
                                <th><a class="{{ column_active('message')}}" href="{{ sort_url('message')}}">{{__('messages.message')}}</a></th>
                                <th><a class="{{ column_active('created_at') }}" href="{{ sort_url('created_at') }}">{{__('messages.created_at')}}</a></th>
                                <th><a class="{{ column_active('updated_at') }}" href="{{ sort_url('updated_at') }}">{{__('messages.updated_at')}}</a></th>
                                <th class="text-center"><i class="icon-menu7"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>{{ $contact->created_at->diffForHumans() }}</td>
                                    <td>{{ $contact->updated_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <x-show route="admin.contact.show" :id="$contact->id"/>
                                            <x-delete route="admin.contact.destroy" :id="$contact->id"/>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $contacts->links() }}
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
@stop
@section('script')
@stop
