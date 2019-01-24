@extends('layouts.alternate')

@section('header_scripts')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection

@section('content')

<div class="container">

     <div class="row">

       <div class="col-lg-6 offset-lg-3 mt-3" style="border: 0.5px solid black; border-radius: 10px; height: 600px; border-color: #D8DBD1">

         <h1 class="mt-4 text-center">Form To Form</h1>
         <hr>

         @if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

           {{ Form::open(['route'=>'search.form.to.form.results']) }}

            <div class="form-group">

              {{ Form::label('Form 1:') }}
              {{ Form::select('id_1', $forms->pluck('form_name', 'id'), null, ['class' => 'select2 form-control']) }}
               
            </div>

            <div class="form-group">

              {{ Form::label('Form 2:') }}
              {{ Form::select('id_2', $forms->pluck('form_name', 'id'), null, ['class' => 'select2 form-control']) }}
               
            </div>

            	<div class="row">

            		<div class="col-md-6">

            			<p>Form 1:</p>
            			<hr>

            			<div class="form-group">

			              {{ Form::label('From:') }}
			              {{ Form::date('from_1', null, ['class' => 'form-control input-sm']) }}
			              
			            </div>

			            <div class="form-group">

			              {{ Form::label('To:') }}
			              {{ Form::date('to_1', null, ['class' => 'form-control input-sm']) }}
			              
			            </div>
            			
            		</div>

            		<div class="col-md-6">

            			<p>Form 2:</p>
            			<hr>

            			<div class="form-group">

			              {{ Form::label('From:') }}
			              {{ Form::date('from_2', null, ['class' => 'form-control input-sm']) }}
			              
			            </div>

			            <div class="form-group">

			              {{ Form::label('To:') }}
			              {{ Form::date('to_2', null, ['class' => 'form-control input-sm']) }}
			              
			            </div>
            			
            		</div>
            		
            	</div>

            <div class="form-group">

              {{ Form::submit('Search', ['class' => 'btn btn-info btn-block mt-5']) }}
               
            </div>

        {{ Form::close() }}

       </div>

     </div>

</div>

@section('footer_scripts')
<script type="text/javascript">
	$(document).ready(function() {
		
		$(".select2").select2({
			placeholder: 'Select a value', 
			allowClear: true
		});
		
	});
</script>
@endsection
@endsection