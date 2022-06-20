<div class="card-body">

    <div class="form-group row mb-3">
        {{ Form::label('car_name', 'Car Name *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('car_name', null, ['class' => 'form-control', 'id' => 'car_name', 'placeholder' => 'Car Name']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'car_name'])
        </div>
    </div>
    <div class="form-group row mb-3">
        {{ Form::label('car_brand_id', 'Car Brand *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::select('car_brand_id',$data['car_brands'], null, ['class' => 'form-control', 'id' => 'car_brand_id', 'placeholder' => 'Please Select Car Brand']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'car_brand_id'])
        </div>
    </div>
    <div class="form-group row mb-3">
        {{ Form::label('plate_no', 'Plate No *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('plate_no', null, ['class' => 'form-control', 'id' => 'plate_no', 'placeholder' => 'Plate No']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'plate_no'])
        </div>
    </div>
    <div class="form-group row mb-3">
        {{ Form::label('minimum_charge', 'Minimum Charge *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::number('minimum_charge', null, ['class' => 'form-control', 'id' => 'minimum_charge', 'placeholder' => 'Minimun Charge']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'minimum_charge'])
        </div>
    </div>
    <div class="form-group row mb-3">
        {{ Form::label('charge_per_km', 'Charge Per km *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::number('charge_per_km', null, ['class' => 'form-control', 'id' => 'charge_per_km', 'placeholder' => 'Charge Per km']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'charge_per_km'])
        </div>
    </div>
    <div class="form-group row mb-3">
        {{ Form::label('seat_capacity', 'Seat Capacity *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::number('seat_capacity', null, ['class' => 'form-control', 'id' => 'seat_capacity', 'placeholder' => 'Seat Capacity']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'seat_capacity'])
        </div>
    </div>
    <div class="form-group row mb-3">
        {{ Form::label('fuel_type', 'Fuel Type *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::select('fuel_type',['E'=>"Electric",'P'=>"Petrol"], null, ['class' => 'form-control', 'id' => 'fuel_type', 'placeholder' => 'Fuel Type']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'fuel_type'])
        </div>
    </div>


  <div class="form-group row mb-3">
        {{ Form::label('logo_image', 'Image', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::file('logo_image', null, ['class' => 'form-control', 'id' => 'logo_image']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'logo'])
            @if(isset($data['row']->logo))
                <img src="{{ asset('images/cars/' . $data['row']->logo) }}" class="img-fluid" width="100px">
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-3">
            {!! Form::label('stock', 'Stock',["class" => "radiostock"]) !!}
        </div>
        <div class="col-9">
            <label class="radio-inline">
            {!! Form::radio('stock', 1, true) !!} Available </label>
            <label class="radio-inline">
            {!! Form::radio('stock',0, false) !!} Not Available</label>
        </div>
    </div>
</div>

<div class="card-footer">
    {{ Form::button('Submit',['type' =>'submit','class' => 'btn btn-primary']) }}
</div>
