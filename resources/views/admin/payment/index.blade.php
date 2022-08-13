@extends('admin.layouts.app',['panel' => 'Payment','page' => 'List'])

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('title', 'Payment List')

@section('content')
    <div class="row">
        <div class="col-12">

            @include('admin.includes.flash_message')

                <!-- /.card-header -->
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>transactionId</th>
                                <th>Amount</th>
                                <th>Paid By</th>
                                <th>Paid Date</th>
                                <th>Paid For </th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data['rows'] as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->transactionId }}</td>
                                    <td>{{ $row->amount }}</td>
                                    <td>{{ $row->user-> name }}</td>
                                    <td>{{ $row->paidDate }}</td>
                                    <td>{{ $row->paidfor->roomNo}}</td>



                                    <td style="display:flex">
                                        <a class="btn btn-primary btn-sm mr-2"
                                            href="{{ route('payment.show', ['id' => $row->id]) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            Show Details
                                        </a>

                                        </form>
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

@endsection
