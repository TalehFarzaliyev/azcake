@extends('admin.layouts.app')
@section('title', __('Show Order'))
@section('content')
    <!-- Page content -->
    <div class="page-content pt-0">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th><a>#</a></th>
                                <th>Product</th>
                                <th>Atribute</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ optional($item->product)->name }}</td>
                                    <td>{{ optional($item->attribute)->name }}</td>
                                    <td>{{ $item->qty.' Ədəd' }}</td>
                                    <td>{{ $item->price.' AZN' }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-sm-12">
                                <x-back route="admin.order.index"></x-back>
                            </div>
                        </div>
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
