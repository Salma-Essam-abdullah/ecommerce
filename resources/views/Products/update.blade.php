@extends('layouts.slider')

@section('content')
<div class="card">
  <div class="card-header card-header-primary">
    <h4 class="card-title">Update</h4>
    <p class="card-category">You Can Update Products</p>
  </div>
  <div class="card-body">
<form method="PUT" action="{{route('products.updates')}}">
    @csrf
    <div class="form-group">
 
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" value="{{$products->name}}">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" type="text" class="form-control" id="description">{{$products->description}}"</textarea>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input name="price" type="text" class="form-control" id="price" value="{{$products->price}}">
     </div>
     <div class="form-group">
        <label for="quantity">Quantity</label>
        <input name="quantity" type="text" class="form-control" id="quantity" value="{{$products->quantity}}">
     </div>
     <div class="form-group">
      
        
          <input name="id" type="text" class="form-control" id="quantity" value="{{$products->id}}" hidden>


    </div>
    <button type="submit" class="btn btn-success">update product </button>
  </form>
    </div>
  </div>
</div>
 @endsection