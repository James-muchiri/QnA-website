@include('admin/head')

@include('admin/sidebar')


<div id="right-panel" class="right-panel">


@include('admin/header')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">


    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">

                <h4 class="mb-0">
                    <span class="count">{{$quizcount}}</span>
                </h4>
                <p class="text-light">Questions</p>



            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">

                <h4 class="mb-0">
                    <span class="count">{{$orderscount}}</span>
                </h4>
                <p class="text-light">Orders</p>

            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">

                <h4 class="mb-0">
                    <span class="count">{{$catcount}}</span>
                </h4>
                <p class="text-light">Categories</p>
            </div>


        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">{{$quizcount}}</span>
                </h4>
                <p class="text-light">Questions</p>


            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-12">

        <h3><u>Missing Searched Questions</u></h3>

    </div>
    <div class="col-sm-12">

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="" style="text-align: center;" > Missed Searches</h5>

          </div>
          <div class="modal-body">



<table class="table table-striped">
<thead>
    <tr>
        <th>#</th>
        <th>Missing questions</th>

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



                </div>
@include('admin/footer')
