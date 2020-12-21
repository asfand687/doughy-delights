@extends('master')
@section('content')
<div class="spacer login-page"></div>
<div class="container login-form" id="container">
  <div class="form-container sign-up-container">
    <form action="/signup" method="POST">
      @csrf
      <h1>Create Account</h1>
      <input type="text" name="name" placeholder="Name" />
      <input type="email" name="email" placeholder="Email" />
      <input type="password" name="password" placeholder="Password" />
      <button class="sign-up-button">Sign Up</button>
    </form>
  </div>
  <!-- Signup end -->
  <div class="form-container sign-in-container">
    <form action="/login" method="POST">
      @csrf
      <h1>Login</h1>
      <input type="email" name="email" placeholder="Email" />
      <input type="password" name="password" placeholder="Password" />
      <button class="login-button">Login</button>
    </form>
  </div>
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <h1>Welcome Back!</h1>
        <p>
          To keep connected with us please login with your personal info
        </p>
        <button class="ghost" id="signIn">Sign In</button>
      </div>
      <div class="overlay-panel overlay-right">
        <h1>Hello, Friend!</h1>
        <p>Enter your personal details and start journey with us</p>
        <button class="ghost" id="signUp">Sign Up</button>
      </div>
    </div>
  </div>
</div>
@endsection

