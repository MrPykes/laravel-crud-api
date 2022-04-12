
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form method="POST" action="{{ url('api/category/update',"$id")}}">
                @csrf
                <div class="mb-3">
                  <label for="inputName" class="form-label">Name</label>
                  <input name="category_name" type="text" class="form-control" id="inputName" value="{{$name}}">
                </div>
                <div class="mb-3">
                  <label for="inputDescription" class="form-label">Description</label>
                  <input name="description" type="text" class="form-control" id="inputDescription" value="{{$description}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection

