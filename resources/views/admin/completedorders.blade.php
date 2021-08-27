<!doctype html>


<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="http://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>


    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css') }}">


    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/selectFX/css/cs-skin-elastic.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}">



    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">




    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>



@include('admin/sidebar')


<div id="right-panel" class="right-panel">


@include('admin/header')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard </h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard | Completed Orders</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">




    <div class="col-sm-12">

        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">

            <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Full Names</th>
            <th scope="col">Email</th>
            <th scope="col">Questions</th>
            <th scope="col">Total</th>
            <th scope="col">Order Number</th>
            <th scope="col">User Id</th>
            <th scope="col">Status</th>
            </tr>
            </thead>

<tbody>
    @php
    $n = 0;
    @endphp
    @foreach ($orders as $order)
    <tr>
    <th scope="row"> {!! $n =$n +1 !!} </th>
    <td>{!! $order['name'] !!}</td>
    <td>{!! $order['email'] !!}</td>
    <td>{!! $order['questions'] !!}</td>
    <td>{!! $order['total'] !!}</td>
    <td>{!! $order['order_number'] !!}</td>
    <td>{!! $order['orderid'] !!}</td>
    <td>{!! $order['status'] !!}</td>


    </tr>

    @endforeach


    </tbody>
    </table>
    <script>

$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
    </script>

    </div>














</div>



                </div>


@include('admin/footer')
