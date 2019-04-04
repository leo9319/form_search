@extends('layouts.alternate')

@section('content')

<div class="container">

     <div class="row">

       <div class="col-lg-6 offset-lg-3 mt-3" style="border: 0.5px solid black; border-radius: 10px; height: 600px; border-color: #D8DBD1">

         <h1 class="mt-4 text-center">{{ $form_name }}</h1>
         <hr>

           {{ Form::open(['route'=>'admin.search']) }}

            <div class="form-group">

              {{ Form::label('Search By First Name:') }}
              {{ Form::text('first_name', null, ['class' => 'form-control input-lg', 'placeholder'=>'First Name']) }}
               
            </div>

            <div class="form-group">

              {{ Form::label('Search By Last Name:') }}
              {{ Form::text('last_name', null, ['class' => 'form-control input-lg', 'placeholder'=>'Last Name']) }}
               
            </div>

            <div class="form-group">

              {{ Form::label('Search By Phone:') }}
              {{ Form::number('phone', null, ['class' => 'form-control input-lg', 'placeholder'=>'Phone Number']) }}
               
            </div>

            <div class="form-group">

              {{ Form::label('Search By Email:') }}
              {{ Form::text('email', null, ['class' => 'form-control input-lg', 'placeholder'=>'Email']) }}
              
            </div>

            <div class="form-group">

              {{ Form::submit('Search', ['class' => 'btn btn-info btn-block mt-5']) }}
               
            </div>

        {{ Form::close() }}

       </div>

     </div>

</div>

@endsection