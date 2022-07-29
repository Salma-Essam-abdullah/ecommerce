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
            <h4 class="card-title "> Categories</h4>
            <p class="card-category"> You Can Add Categories</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
    <div class="container" style="margin-top: 40px">
      <h3> Want To Add Categories ?</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{route('products.storecategory')}}">
    @csrf
    <div class="form-group">
      <label for="name">Category Name</label>
      <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
    </div>
    <div class="form-group" >
        <input type="hidden"  name="seller_id"  value="{{$seller_id}} " readonly>
      </div>
     <button type="submit"  class="btn btn-success">Create Category</button>
  </form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
