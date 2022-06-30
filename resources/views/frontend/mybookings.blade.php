@include('frontend.includes.navbar')


<title> My Bookings </title>

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection



    <div class="row">
        <div class="col-12">
         <div class="card">
                <div class="card-body">
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
                                        <button id="payment-button" style="background-color: #5C2D91; cursor: pointer; color: #fff; border: none; padding: 5px 10px; border-radius: 2px">Pay with Khalti</button>

                                        <form action="{{ route('mybookings.cancel', ['id' => $book->id]) }}" method="post">
                                            @method('delete')

                                            <button class="btn btn-danger btn-sm delete-confirm" type="button">

                                                Cancel
                                            </button>
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
    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "config('app.khalti_public_key')",
            "productIdentity": "1234567890",
            "productName": "Melonlord",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                        $.ajax({
                            type : "POST",
                            url: "{{ route('khalti.payment') }}",
                            data: {
                                'amount' : 1000,
                                'token' : payload.token,
                                '_token' : "{{ csrf_token() }}",
                            }
                })

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
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 1000});
        }
    </script>
@section('js')
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src=" {{ asset('dist/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src=" {{ asset('plugins/bootstrap//js/bootstrap.bundle.min.js') }}"></script>
    <script src=" {{ asset('dist/js/templatemo.js') }}"></script>
    <script src="{{ asset('dist/js/custom.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script> --}}
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dist/js/sweetalert.js') }}"></script>


@endsection
