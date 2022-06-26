
@include('frontend.includes.navbar')

<br>
    <div class="container">
        <div class="card card">

    <div class="row">

        <div class="col-md-12">
                {{ Form::open(['route' => 'bookroom', 'method' => 'post','enctype' => 'multipart/form-data']) }}
                <div class="col-xs-6 col-md-3">
                    <img src="{{ asset('images/'.$room_details->images) }}" alt="image" class="img-fluid" width="400" style="margin-left: 300px" >


            </div>
                <div class="card-body">

            <input type="hidden" name="roomNo" value="{{$room_details-> id }}">
            <input type="hidden" name="charge" value="{{$room_details-> price }}">
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

                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        {{ Form::label('noOfAdults', 'Adults *', ['class' => 'col-3 col-form-label']) }}
                        <div class="col-5">
                            {{ Form::number('noOfAdults', null, ['class' => 'form-control', 'id' => 'noOfAdults', 'placeholder' => 'Number of Adults']) }}

                        </div>
                    </div>



                    <div class="form-group row mb-3">
                        {{ Form::label('noOfChildren', 'Children', ['class' => 'col-3 col-form-label']) }}
                        <div class="col-5">
                            {{ Form::number('noOfChildren', 0, ['class' => 'form-control', 'id' => 'noOfChildren', 'placeholder' => 'Number of Children']) }}

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

