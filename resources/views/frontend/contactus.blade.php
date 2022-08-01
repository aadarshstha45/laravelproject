@include('frontend.includes.navbar')


<title> Contact Us </title>

<div class="container">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->


                <!-- /.card-header -->
                <!-- form start -->
                {{ Form::open(['route' => 'room', 'method' => 'post', 'enctype' => 'multipart/form-data', 'action' => 'mailto:aadarshjr45@gmail.com']) }}

                <div class="card-body">

                    <div class="form-group row mb-3">
                        {{ Form::label('name', 'Name *', ['class' => 'col-3 col-form-label']) }}
                        <div class="col-9">
                            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Your Name']) }}

                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        {{ Form::label('email', 'Email *', ['class' => 'col-3 col-form-label']) }}
                        <div class="col-9">
                            {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Your Email']) }}

                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        {{ Form::label('subject', ' Subject *', ['class' => 'col-3 col-form-label']) }}
                        <div class="col-9">
                            {{ Form::textarea('subject', null, ['class' => 'form-control', 'id' => 'subject', 'placeholder' => 'Subject']) }}
                        </div>
                    </div>

                </div>
                <div class="card-foter">
                    {{ Form::button('Submit',['type' =>'submit','class' => 'btn btn-primary']) }}
                </div>


                {{ Form::close() }}


            </div>


            <!-- /.card -->

        </div>
    </div>

    </div>

