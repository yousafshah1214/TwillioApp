@extends('layouts.layout')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @include('partials.user.nav')

      <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h1>Users Management</h1>

        <h2>Create New User</h2>

        <div class="row justify-content-center">
          <div class="col-5">

            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                  {{ $error }}
                </div>
              @endforeach
            @endif

            {!! Form::open(['url' => 'user']) !!}

              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="UsernameHelp" placeholder="Enter Username for New User">
                <small id="UsernameHelp" class="form-text text-muted">Please Enter Unique Username</small>
              </div>
              <div class="form-group">
                <label for="InputEmail">Email address</label>
                <input type="email" class="form-control" id="InputEmail" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="InputPassword">Password</label>
                <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="formControlSelect">State Assigned to User</label>
                <select class="form-control" id="formControlSelect" name="state">
                  <option value="">Select State</option>
                  @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="formControlSelect">User Role</label>
                <select  name="role" class="form-control" id="formControlSelect">
                  <option value="">Select User Role</option>
                  <option value="role1">Moderator</option>
                  <option value="role2">Admin</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Submit to Create User</button>

            {!! Form::close() !!}

          </div>
        </div>
      </main>
    </div>

  </div>
@endsection
