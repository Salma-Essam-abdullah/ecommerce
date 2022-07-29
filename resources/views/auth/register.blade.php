<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<style>
        .form-group {
    margin-left: 101px;
    width: 500px;
    margin-bottom: 4rem;
}

.right{
    color: grey;
    margin-top: 13%;

}
.btn {
    margin-left: 100px;
}
h3{
    color:darkmagenta;
    margin-bottom: 31px;
    font-family: Monospace;
}
.btn{
    background-color: darkmagenta;
    border-color:darkmagenta;
}
.forget{
    margin-left: 200px;
}
.form-control{
    opacity: 0.7;
    filter: alpha(opacity=70);
    border-radius: 25px;
}
.log{
    margin-left: 200px;
}

</style>
</head>
<body>

    <div class="row">
        <div class="col-lg-6">
           <img src="log.jpg"> 
        </div>
        <div class="col-lg-6 ">
             
                    <form class="right" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group ">
                            <h3> REGISTER </h3>
                            <label for="name" cclass= "text-md-right">{{ __('Name') }}</label>

                                
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        

                        <div class="form-group">
                            <label for="email" class=" text-md-right">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group row">
                            <label for="password" class=" text-md-right">{{ __('Password') }}</label>

                            
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group ">
                            <label for="password-confirm"  class=" text-md-right">{{ __('Confirm Password') }}</label>

                           
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            
                        </div>

                        
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <a class="log"  href="{{ route('login') }}"> Already Have An Account ? Login</a>
                    </form>
        </div>
    </div>    

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>     
   
</body>
</html>
