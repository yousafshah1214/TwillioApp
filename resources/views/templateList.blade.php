@extends('layouts.layout')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @include('partials.templates.nav')

      <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h1>Templates Management</h1>

        <h2>Templates List</h2>

        <div class="row justify-content-center">

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Template name</th>
                <th scope="col">Template Body</th>
                <th scope="col">Created by</th>
                <th scope="col">Options</th>
              </tr>
            </thead>
            <tbody>
              <?php $count =0; ?>
              @foreach($templates as $template)
                <tr>
                  <th scope="row">{{ ++$count }}</th>
                  <td>{{ $template->template_name }}</td>
                  <td>{{ $template->template_body }}</td>
                  <td>{{ $template->user->username }}</td>
                  <td>
                    <a href="{{ route('templates.edit',$template->id) }}"><button type="submit" class="btn btn-primary">Edit</button></a>
                    <form action="{{ URL::route('templates.destroy', $template->id) }}" style="display:inline-block" method="POST">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
            </table>
            {{ $templates->links() }}
        </div>
      </main>
    </div>

  </div>
@endsection
