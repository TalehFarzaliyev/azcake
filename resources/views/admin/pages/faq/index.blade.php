@extends('admin.layouts.app')

@section('title', __('faq.title_index'))

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
                                    <label for="">{{__('faq.Title')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('messages.title')}}" name="title" value="{{request('title')}}">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="">{{__('faq.Description')}}</label>
                                    <input type="text" class="form-control" name="description" placeholder="{{__('messages.description')}}" value="{{request('description')}}">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="">{{__('messages.status')}}</label>
                                    <select name="status" class="select">
                                        <option value="">{{ __('messages.all') }}</option>
                                        <option {{request('status') == 1 ? 'selected' : ''}}  value="1">{{ __('messages.enable') }}</option>
                                        <option {{request('status') == '0' ? 'selected' : ''}} value="0">{{ __('messages.disable') }}</option>
                                    </select>
                                </div>

                                <div class="col-sm-12">
                                    <button type="submit"  class="btn btn-sm btn-light float-right"><i class="icon-search4 "></i> {{ __('messages.search') }}</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                @include('admin.particles._sessionmessage')
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('admin.faq.create')}}" class="btn btn-outline-success float-right"><i class="icon-plus2"></i> {{__('messages.create')}}</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th><a class="{{column_active('id')}}" href="{{sort_url('id')}}">#</a></th>
                                <th><a class="{{column_active('title')}}" href="{{sort_url('title')}}">{{__('messages.title')}}</a></th>
                                <th><a class="{{column_active('sort')}}" href="{{sort_url('sort')}}">{{__('messages.sort')}}</a></th>
                                <th><a class="{{column_active('description')}}" href="{{sort_url('description')}}">{{__('messages.description')}}</a></th>
                                <th><a class="{{column_active('status')}}" href="{{sort_url('status')}}">{{__('messages.status')}}</a></th>
                                <th>{{__('faq.Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faqs as $faq)
                                <tr>
                                    <td>{{$faq->id}}</td>
                                    <td>{{$faq->title}}</td>
                                    <td>{{$faq->sort}}</td>
                                    <td>{{$faq->description}}</td>
                                    <td>
                                        @if($faq->status == 1)
                                            <span class="badge badge-success">{{__('messages.enable')}}</span>
                                        @else
                                            <span class="badge badge-danger">{{__('messages.disable')}}</span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <a href="{{route('admin.faq.edit',$faq->id)}}" type="button" class="btn btn-sm btn-light text-dark"><i class="icon-database-edit2 "></i> Edit</a>
                                        <button type="button" onclick="_getConfirm('{{route('admin.faq.destroy',$faq->id)}}','{{csrf_token()}}')" class="btn btn-sm btn-light"><i class="icon-database-remove "></i> {{__('faq.Delete')}}</button>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                {{$faqs->links()}}


            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
@stop
@section('script')
@stop
