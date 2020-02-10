<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   
 <link rel="stylesheet" href="/css/app.css">
 <link rel="stylesheet" href="/css/login.css">
 <script src="{{ asset('js/app.js') }}" defer></script>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="/img/logoviva.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Usuario">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Acceso">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Olvistas la contraseña?</a>
    </div>
  </div>
  <br>
     <strong>Copyright &copy; 2020 <a href="https://viva.com.do">Trilogy Dominicana </a> ADManager</strong> 
</div>

