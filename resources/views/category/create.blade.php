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
                        <form method="post" action="{{url('category/create')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-md-6">

                                <div class="form-group {{$errors->has('category_name')?'has-error':''}}">
                                    <label>Category Name</label>
                                    <input type="text" name="category_name" class="form-control"
                                           value="{{old('category_name')}}"/>
                                    <p class="help-block">{{$errors->first('category_name')}}</p>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('category_status')?'has-error':''}}">
                                    <label for=""> Category Name</label>
                                    <select name="category_status"
                                            class="form-control selectpicker"
                                            data-live-search="true"
                                            title="Select an Category">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>

                                    </select>
                                    <p class="help-block">{{$errors->first('category_status')}}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="reset" class="btn btn-warning pull-left" value="Reset"/>
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"
                                                                                            aria-hidden="true"></i> Add
                                    Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

