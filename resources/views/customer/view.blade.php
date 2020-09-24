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
                    <a class="btn btn-primary pull-right" href="{{route('customer.create')}}" role="button"><i
                                class="fa fa-plus" aria-hidden="true"></i> Create
                        Customer</a>
                </div>
                <br>
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Customer View</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Customer Unique ID</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Image</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <th scope="row">{{$customer->id}}</th>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->customer_unique_id}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->phone_number}}</td>
                                    <td>
                                        <img src="{{ URL::asset($customer->customer_image) }}" class="img-rounded"
                                             style="height: 50px; width: 60px; background-position: center center;background-size: cover;">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$customers->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
