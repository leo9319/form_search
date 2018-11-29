@extends('layouts.alternate')

@section('header_scripts')

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>

   $(document).ready( function () {

       $('#results').DataTable({

       	'columnDefs' : [

       		{

       		}

       	]

       });

   });

</script>

@endsection

@section('content')

<div class="container">

	<div class="row">

		<div class="col-lg-10 offset-lg-1 mt-3 p-3" style="border: 0.5px solid black; border-radius: 10px; border-color: #D8DBD1">

		<table id="results" class="table table-striped table-bordered" style="width:100%">

            <thead>

               <tr>

                  <th>SL.</th>

                  <th>Form Name</th>

                  <th>Number of Matches</th>

                  <th>Not Matched</th>

               </tr>

            </thead>

            <tbody>
            	<tr>
            		<td>{{ 1 }}</td>
            		<td>{{ $result['form_name'] }}</td>
                <td>{{ $result['count'] }}</td>
            		<td>{{ $result['not_matched'] }}</td>
	            </tr>
            </tbody>

            <tfoot>

            	<tr>

                  <th>SL.</th>

                  <th>Form Name</th>

                  <th>Number of Matches</th>

                  <th>Not Matched</th>

               </tr>
            	
            </tfoot>
        </table>

		</div>

	</div>

</div>

@endsection