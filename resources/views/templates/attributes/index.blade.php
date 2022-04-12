@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('/attribute/create')}}" class="btn btn-primary">Add New Attribute</a>
    <div class="card-header text-center">
        {{ __('Products') }}
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Value</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attributes as $attribute)    
                <tr>
                    <th>{{$attribute->name}}</th>
                    <th>{{$attribute->value}}</th>
                    <th>
                        <a class="btn btn-primary" href="{{ url('/api/attribute/edit',"$attribute->id")}}">Edit</a>    
                        <a class="btn btn-danger" href="{{ url('/api/attribute/delete',"$attribute->id")}}">Delete</a>    
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
