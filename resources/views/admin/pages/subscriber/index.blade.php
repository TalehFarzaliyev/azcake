@extends('admin.layouts.app')
@section('title', __('subscriber.title_index'))
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
                            <div class="form-row">
                                <div class="form-group col-sm-4">
                                    <label for="email">{{__('messages.email')}}</label>
                                    <input type="text" class="form-control" name="email" id="{{ __('messages.email') }}" placeholder="{{ __('messages.email') }}" value="{{request('email')}}">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="ip">{{__('messages.ip_address')}}</label>
                                    <input type="text" class="form-control" name="ip" id="{{ __('messages.ip') }}" placeholder="{{ __('messages.ip_address') }}"  value="{{request('ip')}}">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="status">{{__('messages.status')}}</label>
                                    <select name="status" class="select" id="status">
                                        <option value="">{{ __('messages.all') }}</option>
                                        <option {{ request('status') == 1 ? 'selected' : '' }}  value="1">{{ __('messages.enable') }}</option>
                                        <option {{ request('status') == '0' ? 'selected' : '' }} value="0">{{ __('messages.disable') }}</option>
                                    </select>
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

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th><a class="{{ column_active('id') }}" href="{{ sort_url('id') }}">#</a></th>
                                <th><a class="{{ column_active('ip') }}" href="{{ sort_url('ip') }}">{{ __('messages.ip_address') }}</a></th>
                                <th><a class="{{ column_active('email') }}" href="{{ sort_url('email') }}">{{ __('messages.email') }}</a></th>
                                <th><a class="{{ column_active('status') }}" href="{{ sort_url('status') }}">{{ __('messages.status') }}</a></th>
                                <th><a class="{{ column_active('created_at') }}" href="{{ sort_url('created_at') }}">{{ __('messages.created_at') }}</a></th>
                                <th><a class="{{ column_active('updated_at') }}" href="{{ sort_url('updated_at') }}">{{ __('messages.updated_at') }}</a></th>
                                <th class="text-center"><i class="icon-menu7"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subscribers as $subscriber)
                                <tr>
                                    <td>{{ $subscriber->id }}</td>
                                    <td>{{ $subscriber->ip }}</td>
                                    <td>{{ $subscriber->email }}</td>
                                    <td>
                                        @if($subscriber->status == 1)
                                            <span class="badge badge-success">{{ __('messages.enable') }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ __('messages.disable') }}</span>
                                        @endif
                                    </td>

                                    <td>{{ $subscriber->created_at->diffForHumans() }}</td>
                                    <td>{{ $subscriber->updated_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <x-delete route="admin.subscriber.destroy" :id="$subscriber->id"/>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $subscribers->links() }}
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
@stop
@section('script')
@stop
