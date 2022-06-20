<div class="card-body">

    <div class="form-group row mb-3">
        {{ Form::label('brand', 'Brand *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('brand', null, ['class' => 'form-control', 'id' => 'brand', 'placeholder' => 'Car Brand']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'brand'])
        </div>
    </div>


</div>

<div class="card-footer">
    {{ Form::button('Submit',['type' =>'submit','class' => 'btn btn-primary']) }}
</div>
