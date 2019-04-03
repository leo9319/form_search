@extends('layouts.alternate')

@section('header_scripts')

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>

   $(document).ready( function () {
   
    $('#results').DataTable({
   
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

@endsection

@section('content')

<div class="container">
   <div class="row">
      <div class="col-lg-10 offset-lg-1 mt-3 p-3" style="border: 0.5px solid black; border-radius: 10px; border-color: #D8DBD1">
         <table id="results" class="table table-striped table-bordered" style="width:100%">
            <thead>
               <tr>
                  <th scope="col">Form Name</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Email</th>
                  <th scope="col">Date</th>
                  <th scope="col">Action</th>
               </tr>
            </thead>
            <tbody>
               @forelse($datas as $data)
               <tr>
                  <td>{{ $data['form_names'] }}</td>
                  @if(!empty($data['first_name']))
                  <td>{{ $data['first_name'] }}</td>
                  @else
                  <td>N/A</td>
                  @endif
                  @if(!empty($data['last_name']))
                  <td>{{ $data['last_name'] }}</td>
                  @else
                  <td>N/A</td>
                  @endif
                  <td>{{ $data['phones'] }}</td>
                  @if(!empty($data['emails']))
                  <td>{{ $data['emails'] }}</td>
                  @else
                  <td>No email id found!</td>
                  @endif
                  <td>{{ Carbon\Carbon::parse($data['dates'])->format('jS M, Y h:i:sa') }}</td>
                  <td><a href="{{ url('http://gicclients.com/forms/view_entry.php?form_id=' . $data['form_id'] . '&entry_id=' . $data['id']) }}" class="btn btn-success btn-sm btn-block">View Entry</a></td>
               </tr>
               @empty
               <tr>
                  <td>No Result Found!</td>
               </tr>
               @endforelse
            </tbody>
            <tfoot>
               <tr>
                  <th scope="col">Form Name</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Email</th>
                  <th scope="col">Date</th>
                  <th scope="col">Action</th>
               </tr>
            </tfoot>
         </table>
      </div>
   </div>
</div>

@endsection