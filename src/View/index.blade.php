<!DOCTYPE html>
<html lang="{{ config("app.locale") }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ env("APP_NAME") }} - Problem Alert</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body class="bg-dark">

  <div class="container my-3">
    <div class="card card-body table-responsive">
      {!! $table->table(['class' => 'table table-responsive table-bordered table-hover table-striped text-sm']) !!}
    </div>
  </div>
  
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{!! $table->scripts() !!}
</html>