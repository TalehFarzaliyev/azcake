@extends('admin.layouts.app')
@section('title', __('product.title_edit'))
@section('content')
    <!-- Page content -->
    <div class="page-content pt-0">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                @if(count(langs_get_code_name()))
                    <form action="{{route('admin.product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="card">
                            <div class="bg-light">
                                <ul class="nav nav-tabs nav-tabs-bottom mb-0">
                                    @foreach(langs_get_code_name() as $key=>$lang)
                                        <li class="nav-item">
                                            <a href="#card-{{$key}}" class="nav-link {{$loop->index == '0' ? 'active' : ''}}" data-toggle="tab">
                                                {{$lang}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-body tab-content">
                                @foreach(langs_get_code_name() as $key=>$lang)
                                    <div class="tab-pane fade show {{$loop->index == '0' ? 'active' : ''}}" id="card-{{$key}}">
                                        <div class="form-row">
                                            <div class="form-group col-sm-12">
                                                <label for="title-{{ $key }}">{{__('messages.name')}}</label>
                                                <input type="text" class="form-control " name="{{'name:'.$key}}" id="title-{{ $key }}"  value="{{ old('name:'.$key, $product->{'name:'.$key}) }}">
                                                @error('name:'.$key)
                                                <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label>{{__('messages.description')}}</label>
                                                <textarea name="{{'description:'.$key}}"  id="editor-full-{{$key}}" rows="4" cols="4">{!! old('name:'.$key, $product->{'description:'.$key}) !!}</textarea>
                                                @error('description:'.$key)
                                                <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="old_price" class="font-weight-semibold @error('old_price') text-danger @enderror">Old Price</label>
                                        <input type="text" class="form-control " name="old_price" value="{{$product->old_price}}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="price" class="font-weight-semibold @error('price') text-danger @enderror">Price</label>
                                        <input type="text" class="form-control " name="price" value="{{$product->price}}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="status" class="font-weight-semibold @error('parent_id') text-danger @enderror">{{__('messages.category')}}</label>
                                        <div class="form-group-feedback form-group-feedback-right">
                                            <select name="product_category_id"  class="select" id="product_category_id" @error('product_category_id') data-container-css-class="border-danger text-danger" @enderror>
                                                @foreach($product_categories as $category)
                                                    <option {{$product->product_category_id == $category->id? 'selected': ''}}  value="{{ $category->id }}">{{  $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category_id')
                                        <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="status">{{__('messages.status')}}</label>
                                        <select name="status" class="select">
                                            <option {{old('status', $product->status) == 1 ? 'selected': ''}} value="1">{{__('messages.enable')}}</option>
                                            <option {{old('status', $product->status) == '0' ? 'selected': ''}} value="0">{{__('messages.disable')}}</option>
                                        </select>
                                        @error('status')
                                        <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div class="card-img-actions d-inline-block mb-3">
                                            <img class="img-fluid square" src="{{asset('uploads/'.$product->image)}}" width="170" height="170" alt="">
                                        </div>
                                        {{--                                        <img src="{{asset('uploads/'.$product->image)}}" type="hidden" alt="" style="display: none">--}}
                                        <input id="image" class="form-control-file" type="file" name="image"
                                               value="{{old('image') ?? $product->image}}">
                                        @error('image')
                                        <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12">
                                        <x-save />
                                        <x-back route="admin.page.index"></x-back>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    @include('admin.particles._alert',['message'=> __('please_add_language')])
                @endif
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
@stop
@section('script')
    <script>
        CKEDITOR.replace('editor-full-en', {
            height: 400
        });
        CKEDITOR.replace('editor-full-az', {
            height: 400
        });
        CKEDITOR.replace('editor-full-ru', {
            height: 400
        });
    </script>
@stop
