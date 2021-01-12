@extends('admin.layouts.app')
@section('title', __('team.title_edit'))
@section('content')
    <!-- Page content -->
    <div class="page-content pt-0">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                @if(count(langs_get_code_name()))
                    <form action="{{route('admin.team.update',$team->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}
                        <input type="hidden" name="id" value="{{ $team->id }}">
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
                                            <div class="form-group col-sm-6">
                                                <label for="name-{{ $key }}">{{__('messages.name')}}</label>
                                                <input type="text" class="form-control " name="{{'name:'.$key}}" id="name-{{ $key }}"  value="{{ old('name:'.$key, $team->{'name:'.$key}) }}">
                                                @error('title:'.$key)
                                                <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="position-{{ $key }}">{{__('messages.position')}}</label>
                                                <input type="text" class="form-control " name="{{'position:'.$key}}" id="name-{{ $key }}"  value="{{ old('position:'.$key, $team->{'position:'.$key}) }}">
                                                @error('position:'.$key)
                                                <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label>{{__('messages.description')}}</label>
                                                <textarea name="{{'description:'.$key}}"  id="editor-full-{{$key}}" rows="4" cols="4">{!! old('name:'.$key, $team->{'description:'.$key}) !!}</textarea>
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
                                        <label for="facebook">{{__('messages.facebook')}}</label>
                                        <input type="text" name="facebook" class="form-control" id="facebook" value="{{ old('facebook' ,$team->facebook) }}">
                                        @error('facebook')
                                        <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="instagram">{{__('messages.instagram')}}</label>
                                        <input type="text" name="instagram" class="form-control" id="instagram" value="{{ old('instagram' ,$team->instagram) }}">
                                        @error('instagram')
                                        <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="email">{{__('messages.email')}}</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email' ,$team->email) }}">
                                        @error('email')
                                        <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="website">{{__('messages.website')}}</label>
                                        <input type="text" name="website" class="form-control" id="website" value="{{ old('website' ,$team->website) }}">
                                        @error('website')
                                        <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="phone">{{__('messages.phone')}}</label>
                                        <input type="number" name="phone" class="form-control" id="phone" value="{{ old('phone' ,$team->phone) }}">
                                        @error('phone')
                                        <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="status">{{__('messages.status')}}</label>
                                        <select name="status" class="select">
                                            <option {{old('status', $team->status) == 1 ? 'selected': ''}} value="1">{{__('messages.enable')}}</option>
                                            <option {{old('status', $team->status) == '0' ? 'selected': ''}} value="0">{{__('messages.disable')}}</option>
                                        </select>
                                        @error('status')
                                        <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="image">{{__('messages.image')}}</label>
                                        <img src="{{asset('assets/img/'.$team->image)}}" type="hidden" alt="" style="display: none">
                                        <input id="image" class="form-control" type="file" name="image"
                                               value="{{old('image') ?? $team->image}}">
                                        @error('image')
                                        <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12">
                                        <x-save />
                                        <x-back route="admin.team.index"></x-back>
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
