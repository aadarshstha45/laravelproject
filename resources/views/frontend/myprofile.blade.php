@include('frontend.includes.navbar')


<title> My Profile </title>
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
    <div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-9">
            @include('frontend.includes.flashmessage')

        <div class="card">
        <div class="card-header">
            <a class="btn btn-edit btn-md float-right" href="{{ route('myprofile.edit',['id' => $data['row']->id]) }}">
                <i class="fas fa-pencil-alt"></i>
                Edit
            </a>
        </div>
                <div class="card-body">
                <table id="dataTable" class="table table-bordered table-hover">
                <tr>
                <th style="padding:20px 10px">Name</th>
                    <td> <input id="name" class="form-control" name="name" value="{{ $data['row']->name }} " readonly>
                    </td>
                </tr>
                <tr>
                <th style="padding:20px 10px">Email</th>

                <td> <input id="email" class="form-control" name="email" value="{{ $data['row']->email }} " readonly>
                </td>
                </tr>
                <th style="padding:20px 10px">Phone</th>

                <td> <input id="phone" class="form-control" name="phone" value="{{ $data['row']->phone }} " readonly>
                </td>
                </tr>
            <tr>
                <th style="padding:20px 10px"">Address</th>

                <td> <input id="address" class="form-control" name="address" value="{{ $data['row']->address }} " readonly>
                </td>
                </tr>

    </table>

    </div>
    </div>
</div>
    </div>
</div>

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
