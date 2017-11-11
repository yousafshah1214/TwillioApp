@extends('layouts.layout')

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
      {!! Form::open(['url' => 'admin/login', 'class' => "form-signin"]) !!}
        <h2 class="form-signin-heading">Admin Login</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div>
  </div>
</div> <!-- /container -->

@endSection
