@extends('admin.layouts.app',['panel' => 'Payment','page' => 'Show'])

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <tr>
                    <th>Transaction Id</th>
                    <td>{{ $data['row']->transactionId }}</td>
                </tr>
                <tr>
                    <th>Paid By</th>
                    <td>{{ $data['row']->user-> name }}</td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>{{ $data['row']->amount }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $data['row']->paidDate }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $data['row']->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $data['row']->updated_at }}</td>
                </tr>
            </table>
        </div>
        <!-- /.col -->
    </div>
@endsection
