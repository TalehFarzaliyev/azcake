@extends('admin.layouts.app')
@section('title', __('post.title_index'))
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

                                    <label for="status" class="font-weight-semibold @error('parent_id') text-danger @enderror">{{__('messages.category')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <select name="category_id"  class="select" id="category_id" @error('parent_id') data-container-css-class="border-danger text-danger" @enderror>
                                            <option value="">{{ __('messages.all') }}</option>
                                        @foreach($categories as $category)
                                                <option {{request('category_id') == $category->id? 'selected': ''}}  value="{{ $category->id }}">{{  $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="title">{{__('messages.title')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('messages.title')}}" name="title" id="title" value="{{request('title')}}">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="">{{__('messages.description')}}</label>
                                    <input type="text" class="form-control" name="description" placeholder="{{__('messages.description')}}" value="{{request('description')}}">
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
                                    <x-search> </x-search>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @include('admin.particles._sessionmessage')
                <div class="card">
                    <div class="card-body">
                        <x-create route="admin.post.create"> </x-create>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th><a class="{{column_active('id')}}" href="{{sort_url('id')}}">#</a></th>
                                <th><a class="{{column_active('title')}}" href="{{sort_url('title')}}">{{__('messages.title')}}</a></th>
                                <th><a class="{{column_active('image')}}" href="{{sort_url('image')}}">{{__('messages.image')}}</a></th>
                                <th><a class="{{column_active('category_id')}}" href="{{sort_url('category_id')}}">{{__('messages.category')}}</a></th>
                                <th><a class="{{column_active('description')}}" href="{{sort_url('description')}}">{{__('messages.description')}}</a></th>
                                <th><a class="{{column_active('status')}}" href="{{sort_url('status')}}">{{__('messages.status')}}</a></th>
                                <th><a class="{{ column_active('created_at') }}" href="{{ sort_url('created_at') }}">{{__('messages.created_at')}}</a></th>
                                <th><a class="{{ column_active('updated_at') }}" href="{{ sort_url('updated_at') }}">{{__('messages.updated_at')}}</a></th>
                                <th class="text-center"><i class="icon-menu7"> </i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($posts) > 0)
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->name}}</td>
                                    <td><img src="{{$post->image()}}"  width="130" height="130" alt=""/></td>
                                    <td>{{$post->category ? $post->category->name : __('category.no').' '.__('messages.category')}}</td>

                                    <td>{{$post->description}}</td>
                                    <td>
                                        @if($post->status == 1)
                                            <span class="badge badge-success">{{__('messages.enable')}}</span>
                                        @else
                                            <span class="badge badge-danger">{{__('messages.disable')}}</span>
                                        @endif
                                    </td>
                                    <td>{{$post->created_at ? $post->created_at->diffForHumans() : '-'}}</td>
                                    <td>{{$post->updated_at ? $post->updated_at->diffForHumans() : '-'}}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <x-edit route="admin.post.edit" :id="$post->id"> </x-edit>
                                            <x-delete route="admin.post.destroy" :id="$post->id"> </x-delete>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$posts->links()}}
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
@stop
@section('script')
@stop
