@extends('layouts.layout')

@section('content')

  <div class="container-fluid">
    <div class="row">
      <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('user.dashboard') }}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">New Messages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.conversations.list') }}">Conversations</a>
          </li>
        </ul>

      </nav>

      <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h1>Dashboard</h1>

        <section class="row text-center placeholders">
          <div class="col-4 col-sm-2 placeholder">
            <a href="{{ route('user.conversations.list') }}">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Conversations</h4>
            </a>
            <span class="text-muted">Check All Conversations</span>
          </div>
        </section>

        <h2>Recent Send and Received Messages</h2>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Phone Number</th>
                <th>Message</th>
                <th>State</th>
                <th>Sent_by</th>
                <th>Sent at</th>
              </tr>
            </thead>
            <tbody>
            <?php $count =0 ?>
              @foreach($list as $phone)
                @foreach($phone->conversation as $conversation )
                  @foreach($conversation->messages as $message)
                    @if($count == 3)
                      <?php break; ?>
                    @endif
                    <tr>
                      <td>{{ ++$count }}</td>
                      <td>{{ $message->conversation->phoneList->phone_number }}</td>
                      <td>{{ $message->message_body }}</td>
                      <td>{{ $message->conversation->phoneList->state->state_name }}</td>
                      <td>{{ $message->conversation->user->username }}</td>
                      <td>{{ $message->created_at->toDayDateTimeString() }}</td>
                    </tr>
                  @endforeach
                @endforeach
              @endforeach
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

@endSection
