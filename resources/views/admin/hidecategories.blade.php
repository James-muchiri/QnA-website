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
                    <li class="active">Dashboard | Categories</li>
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
    
        <div id="snackbar">   <span class="badge badge-pill badge-success">Success</span>   {{ Session::get('success') }}.</div>
       
            
    </div>
    <div class="col-sm-12">
        <a href="/categories" tyle="margin: 19px;" type="button" class="btn btn-primary" >New Category</a>


    </div>


<!-- Edit categories -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="/admin/edit_category" method="post">
              @csrf <!-- {{ csrf_field() }} -->
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Category Name:</label>

            </div>
            <div class="form-group" id="cat">
            </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Category</button>
      </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Edit categories -->

    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Is Hidden</th>
            <th scope="col">action</th>
            </tr>
            </thead>

<tbody>
    @php
    $n = 0;
    @endphp
    @foreach ($category as $category)
    <tr>
    <th scope="row"> {!! $n =$n +1 !!} </th>
    <td>{!! $category['name'] !!}</td>
    <td>{!! $category['is_hidden'] !!}</td>

    <td>

    <a href="/delete_cartegories/{!! $category['id'] !!}" class="btn btn-danger">Delete</a>
      <a style="margin: 19px;" type="button" onclick="fetchcat({!! $category['id'] !!})" class="btn btn-primary" data-toggle="modal" data-target="#editModal" data-whatever="@getbootstrap">Edit</a>
    @if ( $category['is_hidden'] == 'yes')
    <a href="/show_cartegories/{!! $category['id'] !!}" class="btn btn-success">Show</a>
    @else
    <a href="/hide_cartegories/{!! $category['id'] !!}" class="btn btn-success">Hide</a>
    @endif

    </td>
    </tr>

    @endforeach


    </tbody>
    </table>
    </div>





    <script type="text/javascript">
      function jsFunction(){
      alert('Execute Javascript Function Through PHP');
      }
      
      function myFunction() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
      }
       
      </script>

@if (Session::has('success'))

<?php
echo '<script type="text/javascript">myFunction();</script>';
?>
 
    <div id="snackbar">   <span class="badge badge-pill badge-success">Success</span>   {{ Session::get('success') }}.</div>
       
@endif



   


</div>






                </div>
@include('admin/footer')
