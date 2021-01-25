@extends('admin.layouts.app')
@section('title', __('Orders'))
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
                                    <label for="name">{{__('messages.first_name')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('messages.first_name')}}" name="first_name" id="first_name" value="{{request('first_name')}}">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="subject">{{__('messages.last_name')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('messages.last_name')}}" name="last_name" id="last_name" value="{{request('last_name')}}">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="subject">{{__('messages.phone')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('messages.phone')}}" name="phone" id="phone" value="{{request('phone')}}">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="email">{{__('messages.id')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('messages.Order Id')}}" name="id" id="id" value="{{request('id')}}">
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
                                <th><a class="{{ column_active('customer_id')}}" href="{{ sort_url('customer_id')}}">{{__('messages.customer')}}</a></th>
                                <th><a class="{{ column_active('first_name')}}" href="{{ sort_url('first_name')}}">{{__('messages.first_name')}}</a></th>
                                <th><a class="{{ column_active('last_name')}}" href="{{ sort_url('last_name')}}">{{__('messages.last_name')}}</a></th>
                                <th><a class="{{ column_active('phone')}}" href="{{ sort_url('phone')}}">{{__('messages.phone')}}</a></th>
                                <th><a class="{{ column_active('address')}}" href="{{ sort_url('address')}}">{{__('messages.address')}}</a></th>
                                <th><a class="{{ column_active('special_text')}}" href="{{ sort_url('special_text')}}">{{__('messages.special_text')}}</a></th>
                                <th><a class="{{ column_active('total')}}" href="{{ sort_url('total')}}">{{__('messages.total')}}</a></th>
                                <th><a class="{{ column_active('order_status')}}" href="#">{{__('messages.order_status')}}</a></th>
                                <th><a class="{{ column_active('created_at') }}" href="{{ sort_url('created_at') }}">{{__('messages.created_at')}}</a></th>
                                <th><a class="{{ column_active('updated_at') }}" href="{{ sort_url('updated_at') }}">{{__('messages.updated_at')}}</a></th>
                                <th class="text-center"><i class="icon-menu7"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ optional($item->customer)->first_name }}</td>
                                    <td>{{ $item->first_name }}</td>
                                    <td>{{ $item->last_name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->total.' AZN' }}</td>
                                    <td>{{ $item->special_text }}</td>
                                    <td>{{ optional($item->order_status)->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <x-show route="admin.order.show" :id="$item->id"/>
                                            <x-delete route="admin.order.destroy" :id="$item->id"/>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $items->links() }}
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
@stop
@section('script')
@stop
