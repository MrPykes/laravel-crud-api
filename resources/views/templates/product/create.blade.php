
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form method="POST" action="{{ url('/product/store')}}">
                @csrf
                <div class="mb-3">
                  <label for="inputName" class="form-label">Name</label>
                  <input name="name" type="text" class="form-control" id="inputName">
                </div>
                <div class="mb-3">
                  <label for="inputDescription" class="form-label">Description</label>
                  <input name="description" type="text" class="form-control" id="inputDescription">
                </div>

                <div class="mb-3">
                  <label for="inputAttributes" class="form-label">Attributes</label>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="inputCategories" class="form-label">Categories</label>
                  <select class="form-select" name="categories[]" type="checkbox" id="inputCategories">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>

                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Image</label>
                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection

