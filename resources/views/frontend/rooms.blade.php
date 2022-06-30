@include('frontend.includes.navbar')
<title> Rooms Page </title>



<body>


    <div class="container">
    <div class="row">


        @foreach ($data['rows'] as $data )
        <div class="col-xs-8 col-md-3 table mt-4">
            
                    <img src="{{ asset('images/rooms/'.$data->images) }}" alt="image" class="" width="300px" height="250px" >
             <br>
              <h5> Room No: {{ $data -> roomNo }} </h5>
              <h5> Price: Rs. {{ $data -> price }} </h5>
              <h5> Status: {{ $data -> status }} </h5>
              <h5> Category: {{ $data ->room_category-> category }} </h5>

              <a href="{{ route('roombook',['id'=>$data->id]) }}" type="button" class="btn btn-primary mb-2 ml-4"> Book Now </a>
            </div>

                @endforeach

        </div>




<body>
