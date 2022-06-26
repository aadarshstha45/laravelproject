<div class="card-body">

    <div class="form-group row mb-3">
        {{ Form::label('roomNo', 'Room Number *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('roomNo', null, ['class' => 'form-control', 'id' => 'roomNo', 'placeholder' => 'Room Number']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'roomNo'])
        </div>
    </div>
    <div class="form-group row mb-3">
        {{ Form::label('room_categories_id', 'Category *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::select('room_categories_id',$data['room_categories'], null, ['class' => 'form-control', 'id' => 'room_categories_id', 'placeholder' => 'Select Room Category']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'room_categories_id'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('price', ' Charge *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::number('price', null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Minimun Charge']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'price'])
        </div>
    </div>


  <div class="form-group row mb-3">
        {{ Form::label('image', 'Image', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::file('image', null, ['class' => 'form-control', 'id' => 'image']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'image'])
            @if(isset($data['row']->images))
            <img src="{{ asset('images/' . $data['row']->images) }}" class="img-fluid" width="100px">
            @endif
        </div>
    </div>



<div class="form-group row mb-3">
    {{ Form::label('status', 'Status *', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::select('status',['A'=>"Available",'U'=>"Unavailable"], null, ['class' => 'form-control', 'id' => 'status', 'placeholder' => 'Room Status']) }}
        @include('admin.includes.validation_error_message',['fieldname' => 'status'])
    </div>
</div>
</div>
<div class="card-footer">
    {{ Form::button('Submit',['type' =>'submit','class' => 'btn btn-primary']) }}
</div>
