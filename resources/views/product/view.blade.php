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
                <div class="form-group">
                    <a class="btn btn-primary pull-right" href="{{route('product.create')}}" role="button"><i
                                class="fa fa-plus" aria-hidden="true"></i> Create
                        Product</a>
                </div>
                <br>
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Product View</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">SKU ID</th>
                                <th scope="col">Product Quantity</th>
                                <th scope="col">Product Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>{{$product->category_name}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->sku_id}}</td>
                                    <td>{{$product->product_quantity}}</td>
                                    <td>{{$product->product_price}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
