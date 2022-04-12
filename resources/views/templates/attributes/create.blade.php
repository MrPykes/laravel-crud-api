
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form method="POST" action="{{ url('api/attribute/store')}}">
                @csrf
                <div class="mb-3">
                  <label for="inputName" class="form-label">Name</label>
                  <input name="name" type="text" class="form-control" id="inputName">
                </div>
                <div class="mb-3">
                  <label for="inputValue" class="form-label">Value</label>
                  <input name="value" type="text" class="form-control" id="inputValue">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection

