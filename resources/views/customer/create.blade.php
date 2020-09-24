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
                    <div class="panel-heading">Customer Add</div>
                    <div class="panel-body">
                        <form method="post" action="{{url('customer/create')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-md-6">

                                <div class="form-group {{$errors->has('name')?'has-error':''}}">
                                    <label>Customer Name</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}"/>
                                    <p class="help-block">{{$errors->first('name')}}</p>
                                </div>

                                <div class="form-group {{$errors->has('email')?'has-error':''}}">
                                    <label>Email Address</label>
                                    <input type="text" name="email" class="form-control" value="{{old('email')}}"/>
                                    <p class="help-block">{{$errors->first('email')}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('phone_number')?'has-error':''}}">
                                    <label>Email Address</label>
                                    <input type="text" name="phone_number" class="form-control"
                                           value="{{old('phone_number')}}"/>
                                    <p class="help-block">{{$errors->first('phone_number')}}</p>
                                </div>

                                <div class="form-group {{$errors->has('customer_image')?'has-error':''}}">
                                    <label>File input</label>
                                    <input type="file" name="customer_image">
                                    <p class="help-block">{{$errors->first('customer_image')}}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="reset" class="btn btn-warning pull-left" value="Reset"/>
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"
                                                                                            aria-hidden="true"></i> Add
                                    Customer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

