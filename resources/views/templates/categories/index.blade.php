@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('/category/create')}}" class="btn btn-primary">Add New Category</a>
    <div class="card-header text-center">
        {{ __('Products') }}
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)    
                <tr>
                    <th>{{$category->name}}</th>
                    <th>{{$category->description}}</th>
                    <th>
                        <a class="btn btn-primary" href="{{ url('/api/category/edit',"$category->id")}}">Edit</a>    
                        <a class="btn btn-danger" href="{{ url('/api/category/delete',"$category->id")}}">Delete</a>    
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
