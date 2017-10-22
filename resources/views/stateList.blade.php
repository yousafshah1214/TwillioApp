@extends('layouts.layout')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @include('partials.states.nav')

      <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h1>States</h1>

        <h2>States List</h2>

        <div class="row justify-content-center">

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">State Name</th>
                <th scope="col">State Code</th>
                <th scope="col">State Assigned to</th>
                <th scope="col">Options</th>
              </tr>
            </thead>
            <tbody>
              <?php $count =0; ?>
              @foreach($states as $state)
                <tr>
                  <th scope="row">{{ ++$count }}</th>
                  <td>{{ $state->state_name }}</td>
                  <td>{{ $state->area_code }}</td>
                  <td>{{ $state->user->username }}</td>
                  <td>

<a href="{{ route('states.edit',$state->id) }}"><button type="submit" class="btn btn-primary">Edit</button></a>

                    <form action="{{ URL::route('states.destroy', $state->id) }}" style="display:inline-block" method="POST">

                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                  </td>
                </tr>
              @endforeach
            </tbody>
            </table>
            {{ $states->links() }}
        </div>
      </main>
    </div>

  </div>
@endsection
