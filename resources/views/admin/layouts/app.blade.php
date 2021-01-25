<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title','Dashboard')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('assets/global_assets/js/nestable/jquery.nestable.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset('assets/global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/ui/slinky.min.js')}}"></script>
    <!-- /core JS files -->
    <script src="{{asset('assets/global_assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/editors/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/demo_pages/editor_ckeditor_default.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/nestable/jquery.nestable.js')}}"></script>
    <!-- Theme JS files -->
    <script src="{{ asset('assets/global_assets/js/plugins/uploaders/dropzone.min.js') }}"></script>

    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">

    {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('style')
    <!-- /theme JS files -->
</head>
<body>

<!-- Main navbar -->
@include('admin.particles._navbar')
<!-- /main navbar -->

<!-- Secondary navbar -->
@include('admin.particles._secondary')
<!-- /secondary navbar -->

<!-- Page header -->
@include('admin.particles._page_header')
<!-- /page header -->

@yield('content')


<!-- Footer -->
@include('admin.particles._footer')
<!-- /footer -->

@yield('script')
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

</body>

</html>
