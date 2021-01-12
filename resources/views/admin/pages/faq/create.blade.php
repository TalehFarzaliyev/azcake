@extends('admin.layouts.app')
@section('title',__('faq.title_create'))
@section('style')
    <style>
        .card-body{
            padding-bottom: 0;
        }
    </style>
@endsection
@section('content')


    <!-- Page content -->
    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">
                @if(count(langs_get_code_name()))
                <form action="{{route('admin.faq.store')}}" method="post">
                    @csrf
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
                                            <label>{{__('messages.title')}}</label>
                                            <input type="text" class="form-control " name="{{'title:'.$key}}"  value="{{old('title:'.$key)}}">
                                            @error('title:'.$key)
                                            <label id="with_icon-error" class="validation-invalid-label" for="with_icon">
                                                {{$message}}
                                            </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>{{__('messages.description')}}</label>
                                            <input type="text" class="form-control " name="{{'description:'.$key}}"  value="{{old('description:'.$key)}}">
                                            @error('description:'.$key)
                                            <label id="with_icon-error" class="validation-invalid-label" for="with_icon">
                                                {{$message}}
                                            </label>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="status">{{__('messages.status')}}</label>
                                    <select name="status" id="status" class="form-control select">
                                        <option {{old('status') == 0 ? 'selected': ''}} value="0">{{__('messages.disable')}}</option>
                                        <option {{old('status') == 1 ? 'selected': ''}} value="1">{{__('messages.enable')}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>{{__('messages.sort')}}</label>
                                    <input type="number" class="form-control " name="sort"  value="{{old('sort',0)}}">
                                    @error('sort')
                                    <label id="with_icon-error" class="validation-invalid-label" for="with_icon">
                                        {{$message}}
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12">
                                    <button class="btn btn-success ml-3 float-right"><i class="icon-floppy-disk"></i> {{__('Save')}}</button>
                                    <a href="{{ route('admin.faq.index') }}" type="submit" class="btn btn-light float-right"><i class="icon-circle-left2"></i> {{__('faq.Back')}}</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
                @else
                    @include('admin.particles._alert',['message'=> 'Please add language!'])

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
