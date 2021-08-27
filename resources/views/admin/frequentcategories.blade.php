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
        @if (Session::has('success'))
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span>   {{ Session::get('success') }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

    </div>
    <div class="col-sm-12">
        <a style="margin: 19px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">New Category</a>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New category</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form action="/admin/post_category" method="post">
                    @csrf <!-- {{ csrf_field() }} -->
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Category Name:</label>
                    <input type="text" class="form-control" id="recipient-name" name="name" required>
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














</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function fetchcat(id){
    console.log("add by one");

    var catid = id;
    // console.log(dataId);


    let _token   = $('meta[name="csrf-token"]').attr('content');

$.ajax({
  url: "/api/fetchcat",
  type:"POST",
  data:{
    catid,
    _token: _token
  },

    success:
    function(data){

$('#cat').html(data);

},
    });
};


     setTimeout(function() {

// Do something after 3 seconds
// This can be direct code, or call to some other function

$('#alert').hide();

}, 3000);
</script>


                </div>
@include('admin/footer')
