@include('frontend.includes.navbar')


<title> My Bookings </title>

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection


    <div class="row">
        {{-- <div class="col-12"> --}}
         <div class="card">
            @include('frontend.includes.flashmessage')

                <div class="card-body col-12">
                    <table id="dataTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Room No.</th>
                                <th>Total Amount</th>
                                <th>Total Adults</th>
                                <th>Total Children</th>
                                <th>Check In Date</th>
                                <th>Check Out Date</th>


                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['books'] as $book )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $book->bookedRoomNo -> roomNo }}</td>
                                    <td>{{ $book-> charge }}</td>
                                    <td>{{ $book->noOfAdults }}</td>
                                    <td>{{ $book->noOfChildren }}</td>
                                    <td>{{ $book->checkinDate }}</td>
                                    <td>{{ $book->checkoutDate }}</td>



                                    <td style="display:flex">
                                        <button class="btn" id='{{ $book->id }}' style="background-color: #5C2D91; cursor: pointer; color: #fff;">Pay with Khalti</button>

                                        <form action="{{ route('mybookings.delete', ['id' => $book->id]) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm cancel-confirm" type="button">

                                                Cancel
                                            </button>
                                        </form>
                                    </td>
                                



                                </tr>
                                 <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "{{ config('app.khalti_public_key') }}",
            "productIdentity": "{{ $book->id }}",
            "productName": "{{ $book->bookedRoomNo->roomNo }}",
            "productUrl": "http://chautari.com",
            "paymentPreference": [
                "KHALTI"
                ],
            "eventHandler": {
                onSuccess (payload) {
                   $.ajax({
                    type : "POST",
                    url : "{{ route('khalti.payment') }}",
                    data: {
                        'amount' : 1000,
                        'token' : payload.token,
                        '_token' : "{{ csrf_token() }}"
                    },
                    success: function(res){
                        $.ajax({
                            type: "POST",
                            url : "{{ route('khalti.storePayment') }}",
                            data:{
                                'response':res,
                                '_token' : "{{ csrf_token() }}",

                            },
                            success: function(res){
                                console.log('success');
                            }
                        })
                        console.log(res)
                    }
                });
                    console.log(payload);
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("{{ $book->id}}");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 1000});
        }
    </script>
                            @endforeach
                        </tbody>
                    </table>
                {{-- </div> --}}
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>


<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>


    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/sweetalert.js') }}"></script>
    <script>
        $(function() {
            $('#dataTable').DataTable();
        });

        $(".cancel-confirm").click(function(){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, cancel it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $(this).closest("form").submit();
            }
            })
        });
    </script>
