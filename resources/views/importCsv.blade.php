@extends('layouts.layout')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @include('partials.bulkSms.nav')

      <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h1>Bulk SMS</h1>

        <h2>Upload New Bulk List</h2>

        <div class="row justify-content-center">
          <div class="col-5">

            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                  {{ $error }}
                </div>
              @endforeach
            @endif

            {!! Form::open(['url' => 'bulk/import/csv/upload','files'  =>  true ]) !!}
            <div class="form-group">
              <label for="exampleInputEmail1">Bulk List Name</label>
              <input type="text" class="form-control" name="listName" id="listName" aria-describedby="nameHelp" placeholder="Enter List Name">
              <small id="nameHelp" class="form-text text-muted">Enter Name for ur own ease</small>
            </div>
              <div class="form-group">
                <label for="formFile">Example file input</label>
                <input type="file" class="form-control-file" id="formFile" name="csvFile">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            {!! Form::close() !!}
          </div>
        </div>
      </main>
    </div>

  </div>
@endsection
