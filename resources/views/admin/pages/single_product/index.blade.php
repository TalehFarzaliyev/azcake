@extends('admin.layouts.app')
@section('title',__('Variant Add').': '.$product->name)
@section('content')
    <!-- Page content -->
    <div class="page-content pt-0">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                <form action="{{ route('admin.single_product.store', $product->id) }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="bg-light">
                            <ul class="nav nav-tabs nav-tabs-bottom mb-0">
                                @foreach(langs_get_code_name() as $key=>$lang)
                                    <li class="nav-item">
                                        <a href="#card-{{$key}}"
                                           class="nav-link {{$loop->index == '0' ? 'active' : ''}}"
                                           data-toggle="tab">
                                            {{$lang}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body tab-content">
                            @foreach(langs_get_code_name() as $key=>$lang)
                                <div class="tab-pane fade show {{$loop->index == '0' ? 'active' : ''}}"
                                     id="card-{{$key}}">
                                    <div class="form-row">
                                        <div class="form-group col-sm-12">
                                            <label for="name-{{ $key }}">{{__('messages.name')}}</label>
                                            <input type="text" class="form-control " name="{{'name:'.$key}}" placeholder="{{__('messages.name')}}" value="{{old('name:'.$key)}}">
                                            @error('name:'.$key)
                                            <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <label for="status" class="font-weight-semibold @error('product_attribute_id') text-danger @enderror">{{__('messages.product_attribute')}}</label>
                                    <div class="form-group-feedback form-group-feedback-right">
                                        <select name="product_attribute_id" class="select" id="status" @error('product_attribute_id') data-container-css-class="border-danger text-danger" @enderror>
                                            @foreach($product_attributes as $attribute)
                                                <option {{old('status') == 1 ? 'selected': ''}} value="1">{{ $attribute->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('product_attribute_id')
                                    <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="price" class="font-weight-semibold @error('price') text-danger @enderror">Price</label>
                                    <input type="number" class="form-control " name="price"  placeholder="10 AZN" value="{{ old('price') }}">
                                    @error('price')
                                    <span class="form-text font-weight-semibold text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn btn-outline-success float-right"><i class="icon-floppy-disk"></i> {{__('messages.add_attribute')}}</button>
                                    <x-back route="admin.product.index"></x-back>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="card mt-2">

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th><a >{{__('messages.variant')}}</a></th>
                                <th><a >{{__('messages.price')}}</a></th>
                                <th class="text-center"><i class="icon-menu7"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($variants as $variant)
                                <tr>
                                    <td>{{$variant->name}}</td>
                                    <td>{{$variant->price}}</td>

                                    <td class="text-center">
                                        <div class="btn-group">
                                            <x-delete route="admin.single_product.destroy" :id="$variant->id"/>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$variants->links()}}
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
@stop
@section('script')
@stop
