@extends('layouts.layout')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @include('partials.templates.nav')

      <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h1>Templates Management</h1>

        <h2>Create New Template</h2>

        <div class="row justify-content-center">
          <div class="col-5">

            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                  {{ $error }}
                </div>
              @endforeach
            @endif

            {!! Form::open(['url' => 'templates']) !!}

              <div class="form-group">
                <label for="name">Template name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Enter name for new template">
                <small id="nameHelp" class="form-text text-muted">Please Enter Unique template name</small>
              </div>
              <div class="form-group">
                <label for="formControlTextarea">Template</label>
                <textarea name="template" class="form-control" id="formControlTextarea" rows="3" aria-describedby="templateHelp" placeholder="Enter new template"></textarea>
                <small id="templateHelp" class="form-text text-muted">Placeholders for fields: First name = { firstname } , Last name = { lastname } , Address = { address } , Phone number = { phoneNumber }</small>
              </div>
              <button type="submit" class="btn btn-primary">Submit to Create Template</button>

            {!! Form::close() !!}

          </div>
        </div>
      </main>
    </div>

  </div>
@endsection
