@include('admin/head')
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
                    <li class="active">Dashboard | Searches</li>
                </ol>
            </div>
            <div class="col-sm-12">

                @if (Session::has('show.hide'))
  <div class="alert alert-success">
    {{ Session::get('show.hide') }}
  </div>
@endif
</div>
        </div>
    </div>
</div>
<div class="content mt-3">

    <div class="col-sm-12">

            <div class="modal-content">
              <div class="modal-header">
                <h5 class="" style="text-align: center;" >Searches</h5>

              </div>
              <div class="modal-body">



<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Search</th>
            <th>Browser</th>
            <th>IP</th>
        </tr>
    </thead>
    <tbody>
        @php
        $n = 0;
    @endphp
    @foreach ($searches as $search)

    <tr>
        <td>{{$n = $n + 1}}</td>
            <td>{{$search->search}}</td>
            <td>{{$search->browser}}</td>
            <td>{{$search->Ip}}</td>
        </tr>
        @endforeach
    </tbody>
</table>





              </div>
              <div class="modal-footer">


              </div>
            </div>

    </div>














</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>


     setTimeout(function() {

// Do something after 3 seconds
// This can be direct code, or call to some other function

$('#alert').hide();

}, 3000);
</script>


                </div>
@include('admin/footer')
