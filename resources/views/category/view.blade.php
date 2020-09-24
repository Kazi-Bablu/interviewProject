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
                    <a class="btn btn-primary pull-right" href="{{route('category.create')}}" role="button"><i
                                class="fa fa-plus" aria-hidden="true"></i> Create
                        Category</a>
                </div>
                <br>
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Category View</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{$category->id}}</th>
                                    <td>{{$category->category_name}}</td>
                                    <td>{{$category->category_status}}</td>
                                    <td>
                                        <div class="btn btn-danger btn-xs">
                                            <a href="{{ url('category/delete',$category->id) }}"><i
                                                        class="fa fa-trash" aria-hidden="true"> Delete</i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
