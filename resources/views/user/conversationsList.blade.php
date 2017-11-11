@extends('layouts.layout')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('user.dashboard') }}">Dashboard</a>
          </li>
        </ul>

      </nav>

      <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h1>conversations</h1>

        <h2>All conversations</h2>

        <div class="row justify-content-center">

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Client Number</th>
                <th scope="col">Total Messages</th>
                <th scope="col">New Messages</th>
                <th scope="col">User Assigned</th>
                <th scope="col">Options</th>
              </tr>
            </thead>
            <tbody>
              <?php $count =0; ?>
              @foreach($conversations as $conversation)
                <tr>
                  <th scope="row">{{ ++$count }}</th>
                  <td>{{ $conversation->phonelist->phone_number }}</td>
                  <td>{{ $conversation->messages->count() }}</td>
                  <td>{{ $conversation->messages->where('type',0)->count() }}</td>
                  <td>{{ $conversation->user->username }}</td>
                  <td><a href="{{ route('user.conversations.show',array('id' => $conversation->id)) }}"><button type="button" class="btn btn-primary">Open</button></a></td>
                </tr>
              @endforeach
            </tbody>
            </table>

        </div>
      </main>
    </div>

  </div>
@endsection
