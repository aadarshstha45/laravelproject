<div class="card-body">

    <div class="form-group row mb-3">
        {{ Form::label('category', 'Category *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('category', null, ['class' => 'form-control', 'id' => 'category', 'placeholder' => 'Room Category']) }}
            @include('admin.includes.validation_error_message',['fieldname' => 'category'])
        </div>
    </div>



</div>

<div class="card-footer">
    {{ Form::button('Submit',['type' =>'submit','class' => 'btn btn-primary']) }}
</div>
