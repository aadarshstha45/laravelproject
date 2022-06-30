
@include('frontend.includes.navbar')

<br>
    <div class="container">
        <div class="card card">

    <div class="row">

        <div class="col-md-12 sm-6">
                {{ Form::open(['route' => 'bookroom', 'method' => 'post','enctype' => 'multipart/form-data']) }}
                <div class="col-sm-6 col-md-3">
                    <img src="{{ asset('images/rooms/'.$room_details-> images) }}" alt="image" class="" width="600" height="400px" style="margin-left: 200px" >

            </div>
                <div class="card-body ml-1">

            <input type="hidden" name="roomNo" value="{{$room_details-> id }}">
            <input type="hidden" name="charge" value="{{$room_details-> price }}">
            <input type="hidden" name="status" value="Booked">
                    <div class="form-group row mb-2">
                        {{ Form::label('checkinDate', 'Check in date *', ['class' => 'col-3 col-form-label']) }}
                        <div class="col-5">
                            {{ Form::date('checkinDate', null, ['class' => 'form-control', 'id' => 'checkinDate', 'placeholder' => '']) }}
                            @include('admin.includes.validation_error_message',['fieldname' => 'checkinDate'])
                        </div>
                    </div>


                    <div class="form-group row mb-3">
                        {{ Form::label('checkoutDate', ' Checkout Date *', ['class' => 'col-3 col-form-label']) }}
                        <div class="col-5">
                            {{ Form::date('checkoutDate', null, ['class' => 'form-control', 'id' => 'checkoutDate', 'placeholder' => '']) }}
                            @include('admin.includes.validation_error_message',['fieldname' => 'checkoutDate'])

                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        {{ Form::label('noOfAdults', 'Adults *', ['class' => 'col-3 col-form-label']) }}
                        <div class="col-5">
                            {{ Form::number('noOfAdults', null, ['class' => 'form-control', 'id' => 'noOfAdults', 'placeholder' => 'Number of Adults']) }}
                            @include('admin.includes.validation_error_message',['fieldname' => 'noOfAdults'])

                        </div>
                    </div>



                    <div class="form-group row mb-3">
                        {{ Form::label('noOfChildren', 'Children', ['class' => 'col-3 col-form-label']) }}
                        <div class="col-5">
                            {{ Form::number('noOfChildren', null, ['class' => 'form-control', 'id' => 'noOfChildren', 'placeholder' => 'Number of Children']) }}
                            @include('admin.includes.validation_error_message',['fieldname' => 'noOfChildren'])

                        </div>
                    </div>


                </div>
                <div class="form ml-6">
                    {{ Form::button('Book',['type' =>'submit','class' => 'btn btn-primary']) }}
                </div>



                {{ Form::close() }}
            </div>
        </div>
    </div>




    </div>

