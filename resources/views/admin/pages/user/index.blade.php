@extends('admin.layouts.app')
@section('title', __('user.title_index'))
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
                            <div class="form-row">
                                <div class="form-group col-sm-2">
                                    <label for="firstname">{{__('messages.firstname')}}</label>
                                    <input type="text" class="form-control" name="firstname" id="{{ __('messages.firstname') }}" placeholder="{{ __('messages.firstname') }}" value="{{request('firstname')}}">
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="lastname">{{__('messages.lastname')}}</label>
                                    <input type="text" class="form-control" name="lastname" id="{{ __('messages.lastname') }}" placeholder="{{ __('messages.lastname') }}"  value="{{request('lastname')}}">
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="email">{{__('messages.email')}}</label>
                                    <input type="email" class="form-control" name="email" id="{{ __('messages.email') }}" placeholder="{{ __('messages.email') }}" value="{{request('email')}}">
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="phone">{{__('messages.phone')}}</label>
                                    <input type="text" class="form-control" name="phone" id="{{ __('messages.phone') }}" placeholder="{{ __('messages.phone') }}"   value="{{request('phone')}}">
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="">{{__('messages.gender')}}</label>
                                    <select name="gender" class="select" id="gender">
                                        <option value="">{{ __('messages.all') }}</option>
                                        <option {{ request('gender') == 1 ? 'selected': '' }} value="1">{{ __('messages.male') }}</option>
                                        <option {{ request('gender') == 2 ? 'selected': '' }} value="2">{{ __('messages.female') }}</option>
                                        <option {{ request('gender') == '0' ? 'selected': '' }} value="0">{{ __('messages.unknown') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="status">{{__('messages.status')}}</label>
                                    <select name="status" class="select" id="status">
                                        <option value="">{{ __('messages.all') }}</option>
                                        <option {{ request('status') == 1 ? 'selected' : '' }}  value="1">{{ __('messages.enable') }}</option>
                                        <option {{ request('status') == '0' ? 'selected' : '' }} value="0">{{ __('messages.disable') }}</option>
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
                        <x-create route="admin.user.create"/>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th><a class="{{ column_active('id') }}" href="{{ sort_url('id') }}">#</a></th>
                                <th><a class="{{ column_active('firstname') }}" href="{{ sort_url('firstname') }}">{{ __('messages.firstname') }}</a></th>
                                <th><a class="{{ column_active('lastname') }}" href="{{ sort_url('lastname') }}">{{ __('messages.lastname') }}</a></th>
                                <th><a class="{{ column_active('email') }}" href="{{ sort_url('email') }}">{{ __('messages.email') }}</a></th>
                                <th><a class="{{ column_active('phone') }}" href="{{ sort_url('phone') }}">{{ __('messages.phone') }}</a></th>
                                <th><a class="{{ column_active('gender') }}" href="{{ sort_url('gender') }}">{{ __('messages.gender') }}</a></th>
                                <th><a class="{{ column_active('status') }}" href="{{ sort_url('status') }}">{{ __('messages.status') }}</a></th>
                                <th><a class="{{ column_active('birthday') }}" href="{{ sort_url('birthday') }}">{{ __('messages.birthday') }}</a></th>
                                <th><a class="{{ column_active('role') }}" href="{{ sort_url('role') }}">{{ __('messages.role') }}</a></th>
                                <th><a class="{{ column_active('created_at') }}" href="{{ sort_url('created_at') }}">{{ __('messages.created_at') }}</a></th>
                                <th><a class="{{ column_active('updated_at') }}" href="{{ sort_url('updated_at') }}">{{ __('messages.updated_at') }}</a></th>
                                <th class="text-center"><i class="icon-menu7"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->firstname }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @if($user->status == 1)
                                            <span class="badge badge-success">{{ __('messages.enable') }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ __('messages.disable') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->gender == 1 ? 'Male' : 'Female' }}</td>
                                    <td>{{ $user->birthday }}</td>
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <x-edit route="admin.user.edit" :id="$user->id"/>
                                            <x-delete route="admin.user.destroy" :id="$user->id"/>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $users->links() }}
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
@stop
@section('script')
@stop
