@extends('layouts.master')

@section('title', 'Columns')

@section('header_scripts')

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>

$(document).ready( function () {

  $('#columns').DataTable({

    'columnDefs' : [

      {

        'searchable' : false,

        'targets' : []

      }

    ],
    
    aLengthMenu: [

        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "All"]

    ],

    iDisplayLength: -1

  });

} );

</script>

@stop

@section('content')

<div class="container-fluid">

	<div class="panel">

		<div class="panel-header">

			<h2 class="text-center">:: {{ $table->form_name }} ::</h2>

		</div>

		<div class="panel-body">

			<a href="{{ route('admin.reset.column', $table->id) }}" class="btn btn-danger pull-right" style="margin-bottom: 10px; width: 192px">Reset All</a>

			<table id="columns" class="table table-striped table-bordered" style="width:100%">

	        <thead>

	          <tr>

	            <th>Raw Name</th>

	            <th>Column Data</th>

	            <th>Alias</th>

	            <th class="text-center">Action</th>

	          </tr>

	        </thead>

	        <tbody>

	        	@foreach($column_values as $index => $column_value)
	        		@foreach($column_value as $column => $data)

		        	<tr>

			            <td>{{ $column }}</td>

			            <td>{{ $data }}</td>

			            <td>
			            	@if($table->phone == $column)
			            		Phone
		            		@elseif($table->email == $column)
		            			Email
	            			@elseif($table->date == $column)
		            			Date
			            	@endif

			            </td>

			            <td>
			            	
			            	<a href="#" id="{{ $column }}" name="{{ $table->id }}" class="btn btn-info btn-block" onclick="changeColumn(this)">Change</a>

			            </td>

		         	 </tr>

	         	 	@endforeach
	         	 @endforeach

	        </tbody>

	        <tfoot>

	        <tr>

	            <th>Raw Name</th>

	            <th>Column Data</th>

	            <th>Alias</th>

	            <th class="text-center">Action</th>

	        </tr>

	        </tfoot>

	      </table>
			
		</div>

	</div>

</div>	

<!-- Modal -->
<div id="formColumnModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Form</h4>
			</div>

			<form action="{{ route('admin.change.column') }}" method="post">



			<div class="modal-body">

				<div class="form-group">

					{{ csrf_field() }}

					<label class="form-label">Column Name:</label>

					<select name="alias" class="form-control">
						<option value="phone">Phone</option>
						<option value="email">Email</option>
						<option value="date">Date</option>
					</select>
					<input type="hidden" name="column_name" id="column-name" class="form-control">
					<input type="hidden" name="table_id" id="table-id" class="form-control">
					
				</div>

			</div>

			<div class="modal-footer">

				<button type="submit" class="btn btn-primary">Save</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>

			</form>

		</div>

	</div>

</div>

@section('footer_scripts')

<script type="text/javascript">
	
	function changeColumn(elem) {

		document.getElementById('column-name').value = elem.id;
		document.getElementById('table-id').value = elem.name;

		$("#formColumnModal").modal();

	}

</script>

@endsection

@endsection