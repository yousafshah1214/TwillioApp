@extends('layouts.layout')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @include('partials.states.nav')

      <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h1>States Management</h1>

        <h2>Update State</h2>

        <div class="row justify-content-center">
          <div class="col-5">

            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                  {{ $error }}
                </div>
              @endforeach
            @endif

            {!! Form::open(['url' => 'states/'.$state->id]) !!}
              {{ method_field('PUT') }}
              <div class="form-group">
                <label for="stateName">State Name</label>
                <input type="text" class="form-control" id="stateName" name="stateName" value="{{ $state->state_name }}" aria-describedby="stateNameHelp" placeholder="Enter name of state">
                <small id="UsernameHelp" class="form-text text-muted">Please Enter State Name</small>
              </div>
              <div class="form-group">
                <label for="stateCode">State Name Code</label>
                <input type="text" class="form-control" id="stateCode" name="stateCode" value="{{ $state->state_code }}" aria-describedby="stateCodeHelp" placeholder="Enter code name of state">
                <small id="UsernameHelp" class="form-text text-muted">Please Enter code name of state</small>
              </div>
              <div class="form-group">
                <label for="InputAreaCode">Area Code</label>
                <input type="text" class="form-control" id="InputAreaCode" name="areaCode" value="{{ $state->area_code }}" aria-describedby="areaCodeHelp" placeholder="Enter Area Code">
                <small id="areaCodeHelp" class="form-text text-muted">Enter Area Code</small>
              </div>
              <div class="form-group">
                <label for="formControlSelect">Assign User to State</label>
                <select class="form-control" id="formControlSelect" name="user">
                  <option value="">Select User</option>
                  @foreach ($users as $user)
                      @if ($user->username == $state->user->username)
                          <option value="{{ $user->id }}" selected>{{ $user->username }}</option>
                      @else
                          <option value="{{ $user->id }}">{{ $user->username }}</option>
                      @endif
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ $state->country }}" aria-describedby="countryHelp" placeholder="Enter country name in short code">
                <small id="countryHelp" class="form-text text-muted">Please Enter country name in short code</small>
              </div>
              <button type="submit" class="btn btn-primary">Submit to Update State</button>

            {!! Form::close() !!}

          </div>
        </div>
      </main>
    </div>

  </div>
@endsection
