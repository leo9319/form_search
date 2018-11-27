<!DOCTYPE html>
<html lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="https://getbootstrap.com/favicon.ico">
  <title>Result</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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

</head>

<body>

<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{ url('/') }}">GIC Forms</a>
  </nav>
</header>

<main role="main" class="container">

  <div class="jumbotron" style="background-color: white; border: 1px solid black; border-radius: 10px">

    <h1 class="text-center mt-4">Search result for: {{ $variable }}</h1>
    <hr>

    <table id="results" class="table" style="width:100%">

      <thead>
        <tr>
          <th scope="col">Form Name</th>
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
          <td>{{ $data['phones'] }}</td>
          @if(!empty($data['emails']))
            <td>{{ $data['emails'] }}</td>
          @else
            <td>No email id found!</td>
          @endif
          
          <td>{{ $data['dates'] }}</td>
          <td><a href="{{ url('http://gicclients.com/forms/view_entry.php?form_id=' . $data['form_id'] . '&entry_id=' . $data['id']) }}" class="btn btn-success btn-sm">View Entry</a></td>
        </tr>

        @empty

        <tr>
          <td>No Result Found!</td>
        </tr>

        @endforelse

      </tbody>

    </table>

    <a href="{{ url('/') }}" class="btn btn-primary btn-block">Go Back</a>
    
  </div>

</main>
    
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  
</body>
</html>