@include('frontend.includes.navbar')
<title> Rooms Page </title>



<body>


    <div class="container">

    <div class="row">

        @foreach ($rooms['rows'] as $room )

        <div class="col-xs-6 col-md-3">
                <a href="{{ route('roombook',['id'=>$room->id]) }}">
                    <img src="{{ asset('images/'.$room->images) }}" alt="image" class="img-fluid" width="400" >
                </a>

            </div>
                @endforeach
        </div>
        </div>




<body>
