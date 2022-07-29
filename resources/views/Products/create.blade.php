@extends('layouts.slider')
@section('content')

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">

      <a  style="font-size:30px; color:purple "class="navbar-brand" href="{{ url('/products') }}">
        ECOMMERCE
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>


  </div>
</nav>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">  Products</h4>
            <p class="card-category"> You Can Add Products</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
    <div class="container" style="margin-top: 40px">
      <h3> Want To Add Product ?</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" type="text" class="form-control" id="description"></textarea>
    </div>

     <div class="row">
         <div class="col-md-6">
           <label> Upload image </label>
         <input type="file" name="image" class="form-control">
         </div>
     </div>

    <div class="form-group">
        <label for="price">Price</label>

        <input name="price" type="text" class="form-control" id="price">
     </div>
     <div class="form-group">
        <label for="quantity">Quantity</label>
        <input name="quantity" type="text" class="form-control" id="quantity">
     </div>
     <div class="form-group" >
       <input type="hidden"  name="categories_id"  value="{{$category->id}} " readonly>
     </div>
     <div class="form-group" >
      <input type="hidden" name="seller_id" value="{{$seller}} " readonly>
    </div>
     <button type="submit"  class="btn btn-success">Add Product</button>

  </form>


</div>
</div>
</div>
</div>
</div>
</div>
 @endsection

