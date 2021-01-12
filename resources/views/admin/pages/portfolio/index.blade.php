@extends('admin.layouts.app')
@section('title', __('portfolio.title_index'))
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
                                <div class="form-group col-sm-4">
                                    <label for="name">{{__('messages.name')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('messages.name')}}" name="name" id="name" value="{{request('name')}}">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="description">{{__('messages.description')}}</label>
                                    <input type="text" class="form-control" name="description" id="description" placeholder="{{__('messages.description')}}" value="{{request('description')}}">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="status">{{__('messages.status')}}</label>
                                    <select name="status" class="select" id="status">
                                        <option value="">{{ __('messages.all') }}</option>
                                        <option {{request('status') == 1 ? 'selected' : ''}}  value="1">{{ __('messages.enable') }}</option>
                                        <option {{request('status') == '0' ? 'selected' : ''}} value="0">{{ __('messages.disable') }}</option>
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
                        <x-create route="admin.portfolio.create"/>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th><a class="{{column_active('id')}}" href="{{sort_url('id')}}">#</a></th>
                                <th><a class="{{column_active('name')}}" href="{{sort_url('name')}}">{{__('messages.name')}}</a></th>
                                <th><a class="{{column_active('image')}}" href="{{sort_url('image')}}">{{__('messages.image')}}</a></th>
                                <th><a class="{{column_active('description')}}" href="{{sort_url('description')}}">{{__('messages.description')}}</a></th>
                                <th><a class="{{column_active('status')}}" href="{{sort_url('status')}}">{{__('messages.status')}}</a></th>
                                <th><a class="{{ column_active('created_at') }}" href="{{ sort_url('created_at') }}">{{__('messages.created_at')}}</a></th>
                                <th><a class="{{ column_active('updated_at') }}" href="{{ sort_url('updated_at') }}">{{__('messages.updated_at')}}</a></th>
                                <th class="text-center"><i class="icon-menu7"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($portfolios as $portfolio)
                                <tr>
                                    <td>{{$portfolio->id}}</td>
                                    <td>{{$portfolio->name}}</td>
                                    <td><img src="{{$portfolio->image()}}"  width="130" height="130" alt=""/></td>
                                    <td>{{$portfolio->description}}</td>
                                    <td>
                                        @if($portfolio->status == 1)
                                            <span class="badge badge-success">{{__('messages.enable')}}</span>
                                        @else
                                            <span class="badge badge-danger">{{__('messages.disable')}}</span>
                                        @endif
                                    </td>
                                    <td>{{$portfolio->created_at->diffForHumans()}}</td>
                                    <td>{{$portfolio->updated_at->diffForHumans()}}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <x-edit route="admin.portfolio.edit" :id="$portfolio->id"/>
                                            <x-delete route="admin.portfolio.destroy" :id="$portfolio->id"/>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$portfolios->links()}}
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
@stop
@section('script')
@stop
