@extends('layout.master')

@section('content')
@include('sweetalert::alert')
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-md-6  border">
            <p class="fw-bold text-center m-4">Date : {{$date}}</p>
            <table class="table">
                <thead class="bg-warning">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Account</th>
                        <th scope="col">Credit Side</th>
                        <th scope="col">Debit Side</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="/add-entry" method="POST">
                        @csrf
                        <tr class="border-none">
                            <th scope="row"></th>
                            <td>
                                <select name="credit_account_id" class="form-select" aria-label="Default select example">
                                    <option selected>Select account</option>
                                    @foreach ($allAccounts as $account)
                                    <option value="{{$account->id}}">{{$account->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input name="credit_one" type="number" min="0" value="0" class="form-control">
                            </td>
                            <td>
                                <input type="number" class="form-control" disabled>
                            </td>
                        </tr>

                        <tr class="border-none">
                            <th scope="row"></th>
                            <td>
                                <select name="debit_account_id" class="form-select" aria-label="Default select example">
                                    <option selected>Select account</option>
                                    @foreach ($allAccounts as $account)
                                    <option value="{{$account->id}}">{{$account->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" class="form-control" disabled>
                            </td>
                            <td>
                                <input name="debit_one" type="number" min='0' value="0" class="form-control">
                            </td>
                        </tr>

                </tbody>
            </table>
            <div class="d-flex justify-content-end m-2">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
            </form>
        </div>
    </div>
@endsection
