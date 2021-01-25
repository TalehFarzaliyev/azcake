@extends('admin.layouts.app')
@section('title',__('Product Gallery'))
@section('content')
    <!-- Page content -->
    <div class="page-content pt-0">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body">

                                <form action="#" class="dropzone" id="dropzone_single">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($images as $image)
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-img-actions px-1 pt-1">
                                <img class="card-img img-fluid" src="{{ asset('uploads/'.$image->image) }}" alt="">
                                <div class="card-img-actions-overlay card-img">
                                    <a href="#" onclick="_getConfirm('{{ route('admin.product.dropzone.delete', $image['id']) }}', '{{ csrf_token() }}')" data-popup="tooltip" data-placement="right" data-original-title="{{ __('messages.delete') }}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                        <i class="icon-folder-remove"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
@stop
@section('script')
    <script>
        $("#dropzone_single").dropzone({
            maxFilesize: 10,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            url: "{{ route('admin.product.dropzone', $product['id']) }}",
            success: function (file, response) {
                console.log(response);
                if (response.status){
                    location.reload();
                }
            },
        });
    </script>
@stop
