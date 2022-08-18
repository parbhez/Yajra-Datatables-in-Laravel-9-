<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Yajra Datatables</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>
<div class="container mt-3">
    <h1 class="text-center">Laravel 9 Yajra Datatables Tutorial</h1>
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-bordered user_datatable">
                <thead>
                    <tr class="text-center">
                        <th width="5%">ID</th>
                        <th width="30%">Name</th>
                        <th width="30%">Slug</th>
                        <th width="15%">Created At</th>
                        <th width="5%">Image</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('.user_datatable').DataTable({
        processing      : true,
        serverSide      : true,
        responsive      : true,
        lengthMenu      : [[10, 25, 50, 100, 500, -1], [10, 25, 50, 100, 500, 'All']],
        ajax: "{{ route('product.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'slug', name: 'slug'},
            {data: 'created_at', name: 'created_at'},
            {data: 'image', name: 'image', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });

</script>

</html>