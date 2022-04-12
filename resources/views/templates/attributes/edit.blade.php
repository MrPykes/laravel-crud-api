
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form method="POST" action="{{ url('api/attribute/update',"$id")}}">
                @csrf
                <div class="mb-3">
                  <label for="inputName" class="form-label">Name</label>
                  <input name="attribute_name" type="text" class="form-control" id="inputName" value="{{$name}}">
                </div>
                <div class="mb-3">
                  <label for="inputValue" class="form-label">Value</label>
                  <input name="attribute_value" type="text" class="form-control" id="inputValue" value="{{$value}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection

