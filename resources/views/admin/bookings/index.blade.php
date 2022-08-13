@extends('admin.layouts.app',['panel' => 'Bookings','page' => 'List'])

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('title', 'Bookings History')

@section('content')
    <div class="row">
        <div class="col-12">

            @include('admin.includes.flash_message')

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Bookings</h3>
                    <a class="btn btn-success btn-md float-right" href="{{ route('room.create') }}">
                        <i class="fas fa-pencil-alt"></i>
                        Create
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Room No.</th>
                                <th>Booked By </th>
                                <th>Checkin Date</th>
                                <th>Checkout Date</th>
                                <th>Charge</th>
                                <th>Status</th>
                                <th>Total Adults</th>
                                <th>Total Children</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data['books'] as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->bookedRoomNo -> roomNo }}</td>
                                    <td>{{ $row->bookedBy -> name }}</td>
                                    <td>{{ $row->checkinDate}}</td>
                                    <td>{{ $row->checkoutDate }}</td>
                                    <td>{{ $row->charge }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>{{ $row->noOfAdults }}</td>
                                    <td>{{ $row->noOfChildren }}</td>
                                    <td style="display:flex">
                                        <a class="btn btn-primary btn-sm mr-2"
                                            href="{{ route('bookings.details', ['id' => $row->id]) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            Details
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection

@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dist/js/sweetalert.js') }}"></script>
    <script>
        $(function() {
            $('#dataTable').DataTable();
        });

        $(".delete-confirm").click(function(){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $(this).closest("form").submit();
            }
            })
        });
    </script>
@endsection
