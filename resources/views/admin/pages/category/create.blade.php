@extends('admin.layouts.app')
@section('title', __('category.title_create'))
@section('content')
    <!-- Page content -->
    <div class="page-content pt-0">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                @if(count(langs_get_code_name()))
                    <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="bg-light">
                                <ul class="nav nav-tabs nav-tabs-bottom mb-0">
                                    @foreach(langs_get_code_name() as $key=>$lang)
                                        <li class="nav-item">
                                            <a href="#card-{{$key}}"
                                               class="nav-link {{$loop->index == '0' ? 'active' : ''}}"
                                               data-toggle="tab">
                                                {{$lang}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-body tab-content">
                                @foreach(langs_get_code_name() as $key=>$lang)
                                    <div class="tab-pane fade show {{$loop->index == '0' ? 'active' : ''}}"
                                         id="card-{{$key}}">
                                        <div class="form-row">
                                            <div class="form-group col-sm-12">
                                                <label for="name-{{ $key }}">{{__('messages.name')}}</label>
                                                <input type="text" class="form-control " name="{{'name:'.$key}}" placeholder="{{__('messages.name')}}" value="{{old('name:'.$key)}}">
                                                @error('name:'.$key)
                                                <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label>{{__('messages.description')}}</label>
                                                <textarea class="form-control " name="{{'description:'.$key}}">{{old('description:'.$key)}}</textarea>
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
                                    <div class="form-group col-sm-6">
                                        <label for="status" class="font-weight-semibold @error('parent_id') text-danger @enderror">{{__('messages.status')}}</label>
                                        <div class="form-group-feedback form-group-feedback-right">
                                            <select name="parent_id"  class="select" id="parent_id" @error('parent_id') data-container-css-class="border-danger text-danger" @enderror>
                                                <option {{old('parent_id') == '0'? 'selected': ''}}  value="0">{{__('messages.main').' '.__('category.category')}}</option>
                                                @foreach($parents as $parent)
                                                    <option {{old('parent_id') == $parent->id? 'selected': ''}}  value="{{ $parent->id }}">{{  $parent->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('parent_id')
                                        <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12">
                                        <x-save />
                                        <x-back route="admin.category.index"></x-back>
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
@stop
