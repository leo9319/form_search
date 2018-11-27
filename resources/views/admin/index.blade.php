@extends('layouts.master')

@section('title', 'Dashboard')

@section('header_scripts')

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>

$(document).ready( function () {

  $('#tables').DataTable({

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

			<h2 class="text-center">:: List of form tables ::</h2>



		</div>

		<div class="panel-body">

			<a href="{{ route('admin.update.forms') }}" class="pull-right btn btn-success" style="margin-bottom: 20px; width: 190px">Update Forms</a>

			<table id="tables" class="table table-striped table-bordered" style="width:100%">

	        <thead>

	          <tr>

	            <th>SL.</th>

	            <th>Table Name</th>

	            <th>Form Name</th>

	            <th class="text-center">Action</th>

	          </tr>

	        </thead>

	        <tbody>

	          @foreach($tables as $index => $table)

	          <tr>

	          	<td>{{ $index + 1 }}</td>

	            <td><a href="{{ route('admin.show', $table->id) }}">{{ $table->form_id }}</a></td>

	            <td>{{ $table->form_name }}</td>

	            <td>
	            	
	            	<a href="#" id="{{ $table->form_id }}" name="{{ $table->form_name }}" class="btn btn-info btn-block btn-sm" onclick="editForm(this)">Edit</a>

	            </td>

	          </tr>

	          @endforeach

	        </tbody>

	        <tfoot>

	        <tr>

				<th>SL.</th>

				<th>Table Name</th>

				<th>Form Name</th>

				<th class="text-center">Action</th>

	        </tr>

	        </tfoot>

	      </table>
			
		</div>

	</div>

</div>	

<!-- Modal -->
<div id="formEditModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Form</h4>
			</div>

			<form action="{{ route('admin.edit.form') }}" method="post">



			<div class="modal-body">

				<div class="form-group">

					{{ csrf_field() }}

					<label class="form-label">Form Name:</label>
					<input type="text" name="form_name" id="form-name" class="form-control">
					<input type="hidden" name="form_id" id="form-id" class="form-control">
					
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
	
	function editForm(elem) {

		document.getElementById('form-name').value = elem.name;
		document.getElementById('form-id').value = elem.id;

		$("#formEditModal").modal();

	}

</script>



@endsection

@endsection