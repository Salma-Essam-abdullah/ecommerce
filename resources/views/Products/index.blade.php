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
                  <h4 class="card-title ">  Products</h4>
                  <p class="card-category"> Here is all the products</p>
              
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Name</th>
                          <th scope="col">Description</th>
                          <th scope="col">Images</th>
                          <th scope="col">Price</th>
                          <th scope="col">Quantity</th> 
                          <th scope="col">Products</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($products as $products)
                        <tr>
                          <th scope="row">{{$products->id}}</th>
                          <td>{{$products->name}} </td>
                          <td>{{$products->description}}</td>
                          <td>{{$products->image}}</td>
                          <td>{{$products->price}}</td>
                          <td>{{$products->quantity}}</td>
                          <td>
                          <a href="{{route('products.show', ['products'=>$products->id])}}" type="button" class="btn btn-primary" >show</a>
              
                          <a href="{{route('products.update', ['products'=>$products->id])}}" type="button" class="btn btn-info" >update</a>
              
                          <a href="{{route('products.delete', ['products'=>$products->id])}}" type="button" class="btn btn-danger" >delete</a>
                        </td>
                          
              
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
      