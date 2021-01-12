@extends('admin.layouts.app')
@section('title', __('customer.title_index'))
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
                                <div class="form-group col">
                                    <label for="firstname">{{__('messages.firstname')}}</label>
                                    <input type="text" class="form-control" name="first_name" id="{{ __('messages.firstname') }}" placeholder="{{ __('messages.firstname') }}" value="{{request('first_name')}}">
                                </div>
                                <div class="form-group col">
                                    <label for="lastname">{{__('messages.lastname')}}</label>
                                    <input type="text" class="form-control" name="last_name" id="{{ __('messages.lastname') }}" placeholder="{{ __('messages.lastname') }}"  value="{{request('last_name')}}">
                                </div>
                                <div class="form-group col">
                                    <label for="email">{{__('messages.email')}}</label>
                                    <input type="email" class="form-control" name="email" id="{{ __('messages.email') }}" placeholder="{{ __('messages.email') }}" value="{{request('email')}}">
                                </div>
                                <div class="form-group col">
                                    <label for="phone">{{__('messages.phone')}}</label>
                                    <input type="text" class="form-control" name="phone" id="{{ __('messages.phone') }}" placeholder="{{ __('messages.phone') }}"   value="{{request('phone')}}">
                                </div>
                                <div class="form-group col">
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
                    <div class="card-body">
                        <x-create route="admin.customer.create"/>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th><a class="{{ column_active('id') }}" href="{{ sort_url('id') }}">#</a></th>
                                <th><a class="{{ column_active('first_name') }}" href="{{ sort_url('first_name') }}">{{ __('messages.firstname') }}</a></th>
                                <th><a class="{{ column_active('last_name') }}" href="{{ sort_url('last_name') }}">{{ __('messages.lastname') }}</a></th>
                                <th><a class="{{ column_active('email') }}" href="{{ sort_url('email') }}">{{ __('messages.email') }}</a></th>
                                <th><a class="{{ column_active('phone') }}" href="{{ sort_url('phone') }}">{{ __('messages.phone') }}</a></th>
                                <th><a class="{{ column_active('status') }}" href="{{ sort_url('status') }}">{{ __('messages.status') }}</a></th>
                                <th><a class="{{ column_active('created_at') }}" href="{{ sort_url('created_at') }}">{{ __('messages.created_at') }}</a></th>
                                <th><a class="{{ column_active('updated_at') }}" href="{{ sort_url('updated_at') }}">{{ __('messages.updated_at') }}</a></th>
                                <th class="text-center"><i class="icon-menu7"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->first_name }}</td>
                                    <td>{{ $customer->last_name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>
                                        @if($customer->status == 1)
                                            <span class="badge badge-success">{{ __('messages.enable') }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ __('messages.disable') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $customer->created_at->diffForHumans() }}</td>
                                    <td>{{ $customer->updated_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <x-edit route="admin.customer.edit" :id="$customer->id"/>
                                            <x-delete route="admin.customer.destroy" :id="$customer->id"/>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $customers->links() }}
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
@stop
@section('script')
@stop
