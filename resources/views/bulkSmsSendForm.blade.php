@extends('layouts.layout')

@section('content')
  <div class="container-fluid">
    <div class="row">

      @include('partials.bulkSms.nav')

      <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h1>Bulk SMS</h1>

        <h2>Send Bulk Sms to All Lists or any selected list</h2>

        <div class="row justify-content-center">
          <div class="col-5">

            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                  {{ $error }}
                </div>
              @endforeach
            @endif
            
            {!! Form::open(['url' => 'bulk/sms/send' ]) !!}
              <div class="form-group">
                <label for="templateSelect">Select Template</label>
                <select class="form-control" name="template" id="templateSelect">
                  <option value="">Select Template</option>
                @foreach($templates as $template)
                        <option value="{{ $template->id }}">{{ $template->template_name }}</option>
                @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="selectList">Select Bulk List</label>
                <select class="form-control" id="selectList" name="bulkList">
                  <option value="">Select List</option>
                  @foreach ($bulkLists as $list)
                    <option value="{{ $list->id }}">{{ $list->bulk_list_name }}</option>
                  @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Send</button>
            {!! Form::close() !!}
          </div>
        </div>
      </main>
    </div>

  </div>
@endsection
