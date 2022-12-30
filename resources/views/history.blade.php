@extends('layout.master')


@section('content')
    <div class="container d-flex justify-content-between mt-5">
        <div class="col-md-4">
            <h1 class="mb-5">Credit Balance History</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Entry Number</th>
                        <th scope="col">Ammount</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($accountHistoryCredit as $history)
                    <tr>
                        <th scope="row">{{$history->id}}</th>
                        <td>{{$history->credit_balance + $history->debit_balance}}</td>
                        <td>{{$history->created_at}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">There is no Credit history at the moment</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <h1 class="mb-5">Debit Balance History</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Entry Number</th>
                        <th scope="col">Ammount</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($accountHistoryDebit as $history)
                    <tr>
                        <th scope="row">{{$history->id}}</th>
                        <td>{{$history->credit_balance + $history->debit_balance}}</td>
                        <td>{{$history->created_at}}</td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="3">There is no Debit history at the moment</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
