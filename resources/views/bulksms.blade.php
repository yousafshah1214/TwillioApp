@extends('layouts.layout')

@section('content')

  <div class="container-fluid">
    <div class="row">

      @include('partials.bulkSms.nav')

      <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h1>Bulk SMS</h1>

        <h2>Recent Bulk Lists Added</h2>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Bulk List Name</th>
                <th>No of Records</th>
                <th>Added at</th>
                <th>Added by</th>
              </tr>
            </thead>
            <tbody>

              <?php $count = 0; ?>

              @foreach($lists as $list)
                <tr>
                  <td>{{ ++$count }}</td>
                  <td>{{ $list->bulk_list_name }}</td>
                  <td>{{ $list->number_of_records }}</td>
                  <td>{{ $list->user->username }}</td>
                  <td>{{ $list->created_at }}</td>
                </tr>
              @endforeach


            </tbody>
          </table>
        </div>

        {{ $lists->links() }}
        {{-- @include('partials.pagination') --}}

      </main>
    </div>
  </div>

@endSection
