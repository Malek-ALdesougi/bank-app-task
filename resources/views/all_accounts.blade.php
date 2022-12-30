@extends('layout.master')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                        {{-- <th scope="col">Handle</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allAccounts as $account)
                        <tr>
                            <th scope="row">{{$account->id}}</th>
                            <td>{{ $account->name }}</td>
                            <td><a href="/history/{{$account->id}}" class="btn btn-success">Details</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
