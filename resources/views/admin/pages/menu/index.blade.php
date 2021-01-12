@extends('admin.layouts.app')
@section('title', __('menu.title_index'))
@section('content')
    <div class="page-content pt-0">
        <div class="content-wrapper">
            <div class="content">
                @include('admin.particles._sessionmessage')
                <div class="card">
                    <div class="card-body">
                        <x-create route="admin.menu.create"/>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th><a class="{{column_active('id')}}" href="{{sort_url('id')}}">#</a></th>
                                <th><a class="{{column_active('name')}}" href="{{sort_url('name')}}">{{__('messages.name')}}</a></th>
                                <th><a class="{{column_active('status')}}" href="{{sort_url('status')}}">{{__('messages.status')}}</a></th>
                                <th><a class="{{ column_active('created_at') }}" href="{{ sort_url('created_at') }}">{{__('messages.created_at')}}</a></th>
                                <th><a class="{{ column_active('updated_at') }}" href="{{ sort_url('updated_at') }}">{{__('messages.updated_at')}}</a></th>
                                <th class="text-center"><i class="icon-menu7"> </i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menus as $menu)
                                <tr>
                                    <td>{{ $menu->id }}</td>
                                    <td>{{ $menu->name }}</td>
                                    <td>
                                        @if($menu->status == 1)
                                            <span class="badge badge-success">{{__('messages.enable')}}</span>
                                        @else
                                            <span class="badge badge-danger">{{__('messages.disable')}}</span>
                                        @endif
                                    </td>
                                    <td>{{ $menu->created_at ? $menu->created_at->diffForHumans() : '-' }}</td>
                                    <td>{{ $menu->updated_at ? $menu->updated_at->diffForHumans() : '-'}}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <x-show route="admin.menu.show" :id="$menu->id" />
                                            <x-edit route="admin.menu.edit" :id="$menu->id"/>
                                            <x-delete route="admin.menu.destroy" :id="$menu->id"/>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $menus->links() }}
            </div>
        </div>
    </div>
@stop
@section('script')
@stop
