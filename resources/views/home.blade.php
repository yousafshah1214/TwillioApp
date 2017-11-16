@extends('layouts.layout')

@section('content')

  <div class="container-fluid">
    <div class="row">
      <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="{{ url('home') }}">Overview</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Reports</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Analytics</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Export</a>
          </li>
        </ul>

        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">Nav item</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Nav item again</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">One more nav</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Another nav item</a>
          </li>
        </ul>

        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">Nav item again</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">One more nav</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Another nav item</a>
          </li>
        </ul>
      </nav>

      <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h1>Dashboard</h1>

        <section class="row text-center placeholders">
          <div class="col-4 col-sm-2 placeholder">
            <a href="{{ route('templates.index') }}">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Templates</h4>
            </a>
            <div class="text-muted">Create and Edit SMS Templates</div>
          </div>
          <div class="col-4 col-sm-2 placeholder">
            <a href="{{ url('bulk/sms') }}" class="">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Bulk Sender</h4>
            </a>
            <span class="text-muted">Send Bulk SMS to Contacts</span>

          </div>
          <div class="col-4 col-sm-2 placeholder">
            <a href="{{ route('reports.index') }}">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Reports</h4>
            </a>
            <span class="text-muted">Reports on Messages</span>
          </div>
          <div class="col-4 col-sm-2 placeholder">
            <a href="{{ route('compliance.index') }}">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Compliance</h4>
            </a>
            <span class="text-muted">List of Negative Keywords</span>
          </div>
          <div class="col-4 col-sm-2 placeholder">
            <a href="{{ url('user') }}">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Users</h4>
            </a>
            <span class="text-muted">Create And Edit Users</span>
          </div>
          <div class="col-4 col-sm-2 placeholder">
            <a href="{{ url('states') }}">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>States</h4>
            </a>
            <span class="text-muted">Create and Edit States</span>
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
            <?php $count =0; ?>
              @foreach($messages as $message)

                <tr>
                  <td>{{ ++$count }}</td>
                  <td>{{ $message->conversation->phoneList->phone_number }}</td>
                  <td>{{ $message->message_body }}</td>
                  <td>{{ $message->conversation->phoneList->state->state_name }}</td>
                  <td>{{ $message->conversation->user->username }}</td>
                  <td>{{ $message->created_at->toDayDateTimeString() }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{ $messages->links() }}
        </div>
      </main>
    </div>
  </div>

@endSection
