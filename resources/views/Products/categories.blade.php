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

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  @if (Route::has('login'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                  @endif

                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }}
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
      </div>
  </div>
</nav>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Categories</h4>
                  <p class="card-category"> Here is all the categories</p>

                </div>

                <div class="card-body">
                  <div class="table-responsive">
         <table class="table">
       <thead class=" text-primary">
            <th scope="col">ID</th>
            <th scope="col">Category Name</th>
            <th scope="col">Add Products</th>
            <th scope="col">Update Categories</th>
            <th scope="col">Delete Categories</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($categories as $category)
          <tr>
          <th scope="row">{{$category->id}}</th>
          <td>{{$category->name}} </td>
          <td><a href="{{route('products.create',['category_id'=>$category->id]) }}"><button type="button" class="btn btn-primary">Add</button></a></td>
          <td><a href="{{route('products.updatecategory',['categories'=>$category->id]) }}"><button type="button" class="btn btn-info">Update</button></a></td>
          <td><a href="{{route('products.deletecategory',['categories'=>$category->id]) }}"><button type="button" class="btn btn-danger">Delete</button></a></td>
          </tr>
          @endforeach
                      </tbody>
                    </table>

                  </div>

                </div>
              </div>
              <a  href="{{route('products.createcategories')}}" type="button" class="btn btn-success">Add New Category</a>
            </div>
          </div>
        </div>
      </div>
@endsection
