@extends('admin.layouts.app')
@section('title', __('team.title_index'))
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
                                    <label for="name">{{__('messages.name')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('messages.name')}}" name="name" id="name" value="{{request('name')}}">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="position">{{__('messages.position')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('messages.position')}}" name="position" id="position" value="{{request('position')}}">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="description">{{__('messages.description')}}</label>
                                    <input type="text" class="form-control" name="description" id="description" placeholder="{{__('messages.description')}}" value="{{request('description')}}">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="facebook">{{__('messages.facebook')}}</label>
                                    <input type="text" class="form-control" name="facebook" id="facebook" placeholder="{{__('messages.facebook')}}" value="{{request('facebook')}}">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="instagram">{{__('messages.instagram')}}</label>
                                    <input type="text" class="form-control" name="instagram" id="instagram" placeholder="{{__('messages.instagram')}}" value="{{request('instagram')}}">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="email">{{__('messages.email')}}</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="{{__('messages.email')}}" value="{{request('email')}}">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="website">{{__('messages.website')}}</label>
                                    <input type="text" class="form-control" name="website" id="website" placeholder="{{__('messages.website')}}" value="{{request('website')}}">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="phone">{{__('messages.phone')}}</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="{{__('messages.phone')}}" value="{{request('phone')}}">
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
                        <x-create route="admin.team.create"/>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th><a class="{{column_active('id')}}" href="{{sort_url('id')}}">#</a></th>
                                <th><a class="{{column_active('name')}}" href="{{sort_url('name')}}">{{__('messages.name')}}</a></th>
                                <th><a class="{{column_active('position')}}" href="{{sort_url('position')}}">{{__('messages.position')}}</a></th>
                                <th><a class="{{column_active('image')}}" href="{{sort_url('image')}}">{{__('messages.image')}}</a></th>
                                <th><a class="{{column_active('description')}}" href="{{sort_url('description')}}">{{__('messages.description')}}</a></th>
                                <th><a class="{{column_active('facebook')}}" href="{{sort_url('facebook')}}">{{__('messages.facebook')}}</a></th>
                                <th><a class="{{column_active('instagram')}}" href="{{sort_url('instagram')}}">{{__('messages.instagram')}}</a></th>
                                <th><a class="{{column_active('email')}}" href="{{sort_url('email')}}">{{__('messages.email')}}</a></th>
                                <th><a class="{{column_active('website')}}" href="{{sort_url('website')}}">{{__('messages.website')}}</a></th>
                                <th><a class="{{column_active('phone')}}" href="{{sort_url('phone')}}">{{__('messages.phone')}}</a></th>
                                <th><a class="{{column_active('status')}}" href="{{sort_url('status')}}">{{__('messages.status')}}</a></th>
                                <th><a class="{{ column_active('created_at') }}" href="{{ sort_url('created_at') }}">{{__('messages.created_at')}}</a></th>
                                <th><a class="{{ column_active('updated_at') }}" href="{{ sort_url('updated_at') }}">{{__('messages.updated_at')}}</a></th>
                                <th class="text-center"><i class="icon-menu7"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teams as $team)
                                <tr>
                                    <td>{{ $team->id }}</td>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->position }}</td>
                                    <td><img src="{{ $team->image() }}"  width="130" height="130" alt=""/></td>
                                    <td>{{ $team->description }}</td>
                                    <td>{{ $team->facebook }}</td>
                                    <td>{{ $team->instagram }}</td>
                                    <td>{{ $team->email }}</td>
                                    <td>{{ $team->website }}</td>
                                    <td>{{ $team->phone }}</td>
                                    <td>
                                        @if($team->status == 1)
                                            <span class="badge badge-success">{{__('messages.enable')}}</span>
                                        @else
                                            <span class="badge badge-danger">{{__('messages.disable')}}</span>
                                        @endif
                                    </td>
                                    <td>{{ $team->created_at->diffForHumans() }}</td>
                                    <td>{{ $team->updated_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <x-edit route="admin.team.edit" :id="$team->id"/>
                                            <x-delete route="admin.team.destroy" :id="$team->id"/>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $teams->links() }}
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
@stop
@section('script')
@stop
