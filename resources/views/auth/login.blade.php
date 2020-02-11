@extends('layouts.app')

@section('content')
 <link rel="stylesheet" href="/css/login.css">

<div class="wrapper fadeInDown"  id="app">

  <div id="formContent">
    <!-- Tabs Titles -->
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="/img/logoviva.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf
      <input type="text" id="username" class="fadeIn second" name="username" value="{{ old('username') }}" placeholder="Usuario" autofocus>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Acceso" {{ __('Login') }} >
      
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Olvistas la contraseña?</a>
    </div>
  </div>
  <br>
     <strong>Copyright &copy; 2020 <a href="https://viva.com.do">Trilogy Dominicana </a> ADManager</strong> 
     
     <script src="{{ asset('js/app.js') }}"></script>
</div>

@endsection