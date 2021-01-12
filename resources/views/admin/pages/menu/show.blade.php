@extends('admin.layouts.app')
@section('title', __('menu.title_show'))
@section('style')
    <style>
        .dd{
            display: unset;
        }
        .dd-handle{
            height: 44px;
            padding: 11px 10px;
            border-radius: 10px;
        }

        .dd3-content{
            margin: 6px 0;
            margin-left: 92%;
            position: absolute;
            border-radius: 10px;
            display: block;
            padding: 5px 10px 5px 12px;
            background: #f50000;
            color: #ffffff;
        }
    </style>
    @endsection
@section('content')
    <div class="page-content pt-0">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{ route('admin.menu.create.content',[$menu->id,'category']) }}" method="post">
                                    @csrf
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">@lang('messages.category')</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mb-0">
                                                <label class="form-control-label required">{{ __('messages.category') }}</label>
                                                <select class="form-control select" name="category" data-toggle="select">
                                                    @foreach($categories as $category)
                                                        <option {{ old('category', $category->id) ? 'selected' : '' }}  value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" data-loading-text="Yükleniyor..." class="btn btn-icon btn-success button-submit header-button-top float-right">
                                                    <span class="btn-inner--icon">
                                                        <i class="fas fa-save"></i>
                                                    </span>
                                                        <span class="btn-inner--text">@lang('messages.add') @lang('messages.menu')</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="col-sm-12">
                                <form action="{{ route('admin.menu.create.content',[$menu->id,'page']) }}" method="post">
                                    @csrf
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">@lang('messages.page')</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mb-0">
                                                <label class="form-control-label required">{{ __('messages.page') }}</label>
                                                <select class="form-control select" name="page" data-toggle="select">
                                                    <option {{ old('page') == '0' ? 'selected' : '' }}  value="0">@lang('messages.home')</option>
                                                    @foreach($pages as $page)
                                                        <option {{ old('page') == $page->id ? 'selected' : '' }}  value="{{ $page->id }}">{{ $page->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('page')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" data-loading-text="Yükleniyor..." class="btn btn-icon btn-success button-submit header-button-top float-right">
                                                        <span class="btn-inner--icon">
                                                            <i class="fas fa-save"></i>
                                                        </span>
                                                        <span class="btn-inner--text">@lang('messages.add') @lang('messages.menu')</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>
                    <div class="col-sm-8">


                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0">@lang('messages.menu') @lang('messages.content')</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">

                                        @if($menuContents->count())

                                            <div class="custom-dd dd" id="nestable_list_2">
                                                <ol class="dd-list">
                                                    @foreach($menuContents as $menu)
                                                        <li class="dd-item" data-id="{{ $menu->id }}" >
                                                            <a class="dd3-content" onclick="_getConfirm('{{ route('admin.menu.delete.content', $menu->id) }}', '{{ csrf_token() }}')"  href="#"><i class="icon-trash"></i></a>
                                                            <div class="dd-handle">
                                                                {{ $menu->page ? $menu->page->title : ($menu->category ? $menu->category->name :  __($menu->lang)) }}
                                                            </div>


                                                            @if($menu->children->count())
                                                                <ol class="dd-list">
                                                                    @foreach($menu->children as $children)
                                                                        <li class="dd-item" data-id="{{ $children->id }}">
                                                                            <a class="dd3-content" onclick="_getConfirm('{{ route('admin.menu.delete.content', $menu->id) }}', '{{ csrf_token() }}')" href="#" ><i class="icon-trash"></i></a>
                                                                            <div class="dd-handle">
                                                                                {{ $children->page ? $children->page->title : ($children->category ? $children->category->name :  __($children->lang)) }}
                                                                            </div>

                                                                        </li>

                                                                    @endforeach
                                                                </ol>

                                                            @endif
                                                        </li>
                                                    @endforeach



                                                </ol>
                                            </div>
                                        @else
                                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                <span class="alert-text"><strong>@lang('messages.You haven`t added anything to the menu yet.')</strong> </span>

                                            </div>
                                        @endif
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>

                        </div> <!-- end card-box -->
                    </div> <
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            var updateOutput = function (e) {
                var list = e.length ? e : $(e.target), output = list.data('output');
                if (window.JSON) {output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                    var data = list.nestable('serialize');
                    $.post( '{{ route('admin.menu.update.content', $menu->id) }}', {
                        data: data,
                        _token: '{{ csrf_token() }}' } );
                }

            };
            $('#nestable_list_2').nestable({
                group: 1,
                maxDepth: 2,
            }).on('change', updateOutput);
            updateOutput($('#nestable_list_2').data('output', $('#nestable-output')));

        });
    </script>
@endsection
