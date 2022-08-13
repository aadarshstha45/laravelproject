@extends('admin.layouts.app',['panel' => 'Bookings','page' => 'Show'])

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">

                <tr>
                    <th>Room No.</th>

                    <td>{{ $data['books']->bookedRoomNo-> roomNo }}</td>
                </tr>
                <tr>
                    <th>Booked By </th>
                    <td>{{ $data['books']->bookedBy -> name }}</td>
                </tr>
                <tr>
                    <th>Checkin Date</th>

                    <td>{{ $data['books']->checkinDate }}</td>
                </tr>
                <tr>
                    <th>Checkout Date</th>
                    <td>{{ $data['books']->checkoutDate }}</td>
                </tr>
                <tr>
                    <th>Total Amount</th>
                    <td>{{ $data['books']->charge }}</td>
                </tr>
                <tr>
                    <th>Total Adults</th>

                    <td>{{ $data['books']->noOfAdults }}</td>
                </tr>
                <tr>
                    <th>Total Children</th>
                    <td>{{ $data['books']->noOfChildren }}</td>
                </tr>

            </table>
        </div>
        <!-- /.col -->
    </div>
@endsection
