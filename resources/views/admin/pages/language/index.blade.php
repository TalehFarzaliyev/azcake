@extends('admin.layouts.app')
@section('title', __('language.title_index'))
@section('content')
    <div class="page-content pt-0">
        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="get">
                            <input type="hidden" name="column" value="{{request('column')}}">
                            <input type="hidden" name="order" value="{{request('order')}}">
                            <div class="form-row">
                                <div class="form-group col-sm-3">
                                    <label for="">{{__('messages.name')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('messages.name')}}" name="name" id="name" value="{{request('name')}}">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="code">{{__('messages.code')}}</label>
                                    <input type="text" class="form-control" name="code" id="code" placeholder="{{__('messages.code')}}" value="{{request('code')}}">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="direction">{{__('messages.direction')}}</label>
                                    <select name="direction" class="select" id="direction">
                                        <option value="">{{ __('messages.all') }}</option>
                                        <option {{request('direction') == 'ltr' ? 'selected': ''}} value="ltr">{{ __('messages.ltr') }}</option>
                                        <option {{request('direction') == 'rtl' ? 'selected': ''}} value="rtl">{{ __('messages.rtl') }}</option>
                                    </select>
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
                        <x-create route="admin.language.create"/>
                        <a href="{{ action('\Barryvdh\TranslationManager\Controller@getIndex') }}" class="btn btn-outline-success float-right mr-2"><i class="icon-sphere mr-2"></i>{{ __('messages.translate') }}</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th><a class="{{column_active('id')}}" href="{{sort_url('id')}}">#</a></th>
                                <th><a class="{{column_active('name')}}" href="{{sort_url('name')}}">{{__('messages.name')}}</a></th>
                                <th><a class="{{column_active('code')}}" href="{{sort_url('code')}}">{{__('messages.code')}}</a></th>
                                <th><a class="{{column_active('direction')}}" href="{{sort_url('direction')}}">{{__('messages.direction')}}</a></th>
                                <th><a class="{{column_active('status')}}" href="{{sort_url('status')}}">{{__('messages.status')}}</a></th>
                                <th><a class="{{ column_active('created_at') }}" href="{{ sort_url('created_at') }}">{{__('messages.created_at')}}</a></th>
                                <th><a class="{{ column_active('updated_at') }}" href="{{ sort_url('updated_at') }}">{{__('messages.updated_at')}}</a></th>
                                <th class="text-center"><i class="icon-menu7"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($languages as $language)
                                <tr>
                                    <td>{{ $language->id }}</td>
                                    <td>{{ $language->name }}</td>
                                    <td>{{ $language->code }}</td>
                                    <td>{{ $language->direction }}</td>
                                    <td>
                                        @if($language->status == 1)
                                            <span class="badge badge-success">{{__('messages.enable')}}</span>
                                        @else
                                            <span class="badge badge-danger">{{__('messages.disable')}}</span>
                                        @endif
                                    </td>
                                    <td>{{ $language->created_at->diffForHumans() }}</td>
                                    <td>{{ $language->updated_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <x-edit route="admin.language.edit" :id="$language->id"/>
                                            <x-delete route="admin.language.destroy" :id="$language->id"/>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $languages->links() }}
            </div>
        </div>
    </div>
@stop
@section('script')
@stop
