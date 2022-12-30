@extends('layout.master')

@section('content')
    @include('sweetalert::alert')

    <div class="containerr d-flex align-items-center justify-content-center">
        <div id="image">
            {{-- <img width="100%" height="100vh" src="https://img.freepik.com/free-vector/money-income-attraction_74855-6573.jpg?w=2000"> --}}
        </div>
        <div style="width: 900px;">
            <h2>Welcome to the Bank Application</h2>
            <div class="d-flex justify-content-start">
                <a href="/create-entry" class="btn btn-warning me-5">Make a new entry</a>
                <a href="/all-accounts" class="btn btn-dark text-warning">See All Accounts</a>
            </div>
        </div>
    </div>
@endsection
