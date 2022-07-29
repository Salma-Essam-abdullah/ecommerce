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
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Product</h4>
             
            </div>
            <div class="card-body">
                      <h5 class="card-title">Name :</h5>
                      <p class="card-text">{{$products->name}}</p>
                      <h5 class="card-title">Description :</h5>
                      <p class="card-text">{{$products->description}}</p>
                      <h5 class="card-title">Image :</h5>
                      <img src="{{asset('/storage/'.$products->image)}}" class="card-text" alt="Image">
                      <h5 class="card-title">Price : </h5>
                      <p class="card-text">{{$products->price}}</p>
                      <h5 class="card-title">Quantity :</h5>
                      <p class="card-text">{{$products->quantity}}</p>    
            </div>
          </div>
@endsection
        