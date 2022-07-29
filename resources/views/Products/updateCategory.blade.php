@extends('layouts.slider')

@section('content')
<div class="card">
  <div class="card-header card-header-primary">
    <h4 class="card-title">Update</h4>
    <p class="card-category">You Can Update Products</p>
  </div>
  <div class="card-body">
<form method="PUT" action="{{route('products.updatescategory')}}">
    @csrf
    <div class="form-group">
 
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" value="{{$categories->name}}">
    </div>
     <div class="form-group">
          <input name="id" type="text" class="form-control" id="quantity" value="{{$categories->id}}" hidden>
    </div>
    <button type="submit" class="btn btn-success">Update Category </button>
  </form>
    </div>
  </div>
</div>
 @endsection
