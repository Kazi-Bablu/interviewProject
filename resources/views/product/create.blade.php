@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('flash::message')
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Product Add</div>
                    <div class="panel-body">
                        <form method="post" action="{{url('product/create')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-md-6">

                                <div class="form-group {{$errors->has('category_id')?'has-error':''}}">
                                    <label for=""> Category Name</label>
                                    <select name="category_id"
                                            class="form-control selectpicker"
                                            data-live-search="true"
                                            title="Select an Category">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach

                                    </select>
                                    <p class="help-block">{{$errors->first('category_id')}}</p>
                                </div>

                                <div class="form-group {{$errors->has('product_name')?'has-error':''}}">
                                    <label>Product Name</label>
                                    <input type="text" name="product_name" class="form-control"
                                           value="{{old('product_name')}}"/>
                                    <p class="help-block">{{$errors->first('product_name')}}</p>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('product_quantity')?'has-error':''}}">
                                    <label>Product Quantity</label>
                                    <input type="number" name="product_quantity" class="form-control"
                                           value="{{old('product_quantity')}}"/>
                                    <p class="help-block">{{$errors->first('product_quantity')}}</p>
                                </div>

                                <div class="form-group {{$errors->has('product_price')?'has-error':''}}">
                                    <label>Product Price</label>
                                    <input type="number" name="product_price" class="form-control"
                                           value="{{old('product_price')}}"/>
                                    <p class="help-block">{{$errors->first('product_price')}}</p>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <input type="reset" class="btn btn-warning pull-left" value="Reset"/>
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"
                                                                                            aria-hidden="true"></i> Add
                                    Product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

