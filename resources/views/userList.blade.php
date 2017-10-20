@extends('layouts.layout')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @include('partials.user.nav')

      <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h1>Users</h1>

        <h2>Users List</h2>

        <div class="row justify-content-center">

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">State Assigned</th>
                <th scope="col">Status</th>
                <th scope="col">Options</th>
              </tr>
            </thead>
            <tbody>
              <?php $count =0; ?>
              @foreach($users as $user)
                <tr>
                  <th scope="row">{{ ++$count }}</th>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    @foreach ($user->states as $state)
                      @if(!is_null($state->state_name))
                        {{ $state->state_name }} <br/>
                      @else
                        State Not Assigned
                      @endif
                    @endforeach
                  </td>
                  <td>
                    @if($user->status == 1)
                      Active
                    @else
                      Not Active
                    @endif
                  </td>
                  <td>
                    <form action="{{ URL::route('user.destroy', $user->id) }}" method="POST">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </tr>
              @endforeach
            </tbody>
            </table>
            {{ $users->links() }}
        </div>
      </main>
    </div>

  </div>
@endsection
