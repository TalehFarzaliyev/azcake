@extends('admin.layouts.app')
@section('title', __('product.title_index'))
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

                                    <label for="status" class="font-weight-semibold @error('product_category_id') text-danger @enderror">{{__('messages.category')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <select name="product_category_id"  class="select" id="product_category_id">
                                            <option value="">{{ __('messages.all') }}</option>
                                            @foreach($product_categories as $category)
                                                <option {{request('product_category_id') == $category->id? 'selected': ''}}  value="{{ $category->id }}">{{  $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="title">{{__('messages.title')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('messages.title')}}" name="title" id="title" value="{{request('title')}}">
                                </div>
                                <div class="form-group col-sm-3">
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
                        <x-create route="admin.product.create"/>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th><a class="{{column_active('id')}}" href="{{sort_url('id')}}">#</a></th>
                                <th><a class="{{column_active('image')}}" href="{{sort_url('image')}}">{{__('messages.image')}}</a></th>
                                <th><a class="{{column_active('title')}}" href="{{sort_url('title')}}">{{__('messages.title')}}</a></th>
                                <th><a class="{{column_active('product_category_id')}}" href="{{sort_url('product_category_id')}}">{{__('messages.category')}}</a></th>
                                <th><a class="{{column_active('status')}}" href="{{sort_url('status')}}">{{__('messages.status')}}</a></th>
                                <th class="text-center"><i class="icon-menu7"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td><img src="{{asset('uploads/'.$post->image)}}"  width="80" height="60" alt=""/></td>
                                    <td>{{$post->name}}</td>
                                    <td>{{$post->category ? $post->category->name : __('category.no').' '.__('messages.category')}}</td>
                                    <td>
                                        @if($post->status == 1)
                                            <span class="badge badge-success">{{__('messages.enable')}}</span>
                                        @else
                                            <span class="badge badge-danger">{{__('messages.disable')}}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <x-edit route="admin.product.edit" :id="$post->id"/>
                                            <a href="{{route('admin.single_product.index', $post->id)}}" type="button" class="btn btn-light" data-popup="tooltip" data-placement="right" data-original-title="{{ __('messages.product_variants') }}"><i class="icon-cube4"></i></a>
                                            <x-delete route="admin.product.destroy" :id="$post->id"/>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$products->links()}}
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
@stop
@section('script')
@stop
