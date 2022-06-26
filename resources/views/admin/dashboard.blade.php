@extends('admin.layouts.app',['panel' => 'Dashboard' , 'page' => ''])

@section('title', 'Dashboard')
<link rel="icon" href="{{ asset('images/h.png') }}" type="image/icon type">

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ App\Models\User::count() }}</h3>

                    <p>Total Users</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('user.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ App\Models\Room::count() }}</h3>

                    <p>Total Rooms</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{  route ('room') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                {{-- <a href="{{ route('car.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ App\Models\RoomCategory::count() }}</h3>

                    <p>Total Room Categories</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{  route ('roomcategory.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                {{-- <a href="{{ route('car.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>



    </div>
@endsection
