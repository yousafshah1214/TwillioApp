@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.reports.nav')

            <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
                <h1>Reports</h1>

                <h2>All Messages Sent Out by This App</h2>

                <div class="row justify-content-center">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Sender User Name</th>
                            <th scope="col">Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count =0; ?>
                        @foreach($messages as $message)
                            <tr>
                                <th scope="row">{{ ++$count }}</th>
                                <td>{{ $message->conversation->phoneList->first_name }}</td>
                                <td>{{ $message->conversation->phoneList->phone_number }}</td>
                                <td>{{ $message->conversation->user->username }}</td>
                                <td>{{ $message->created_at->format('l jS \\of F Y h:i:s A') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $messages->links() }}
                </div>
            </main>
        </div>

    </div>
@endsection
