@include('frontend.includes.navbar')


<title> Home </title>

<link rel="stylesheet" href="{{ asset('dist/css/all.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('dist/style.css') }}">

        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

        <script src=" {{ asset('dist/js/custom.js') }}"></script>

        
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner">
                @foreach($data['rows'] as $data => $slider)
                <div class="carousel-item {{$loop->iteration == 1 ? 'active' : ''}}">
                    <img src="{{asset('images/rooms/'.$slider->images)}}" class="a"  alt=""> 
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>



        <div class="container">

        <div class="second">
			<div class="second1">
				<h3 class="aboutustext">About US</h3><br>
				<h2 class="text1">A Luxuary<br> Hotel With Nature</h2><br><br>

			</div>
			<div class="second2"><img class="logo" src="{{asset('Photo/aboutus1.jpg')}}" width=300px height=450px></div>
			<div class="second3"><img class="logo" src="Photo/aboutus2.jpg" width=300px height=450px></div>
		</div>
<div class="third">
    <div class="third1">
        <h2 class="deliciousfoodtext">Delicious Food</h2><br>
        <h3 class="text2">We Serve Fresh and Delicious Food</h3><br><br>

    </div>
        <div class="third2"><img class="logo" src="Photo/foodpic1.jpg" width=300px height=450px></div>
        <div class="third3"><img class="logo" src="Photo/foodpic2.jpg" width=300px height=450px></div>
</div>
        </div>