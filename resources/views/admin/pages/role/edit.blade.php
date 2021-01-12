@extends('admin.layouts.app')
@section('title', __('role.title_edit'))
@section('content')
    <!-- Page content -->
    <div class="page-content pt-0">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.role.update',$role->id)}}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <input type="hidden" name="id" value="{{ $role->id }}"/>
                            <div class="form-row">
                                <div class="form-group col-sm-4">
                                    <label class="font-weight-semibold @error('name') text-danger @enderror" for="name">{{__('messages.name')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <input type="text" name="name" id="name" class="form-control @error('name') border-danger @enderror" placeholder="{{__('messages.name')}}" value="{{ old('name', $role->name) }}">
                                    </div>
                                    @error('name')
                                    <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>{{__('messages.permission')}}</label>
                                    @foreach($permissions as $permission)
                                        <br>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input name="permission[]" type="checkbox" class="custom-control-input" id="custom_checkbox_inline_unchecked_{{$permission->id}}"  value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="custom_checkbox_inline_unchecked_{{$permission->id}}">{{$permission->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-sm-12">
                                    <x-save />
                                    <x-back route="admin.role.index"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
@stop
@section('script')
@stop
