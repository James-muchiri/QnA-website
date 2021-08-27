@include('admin/head')
@include('admin/sidebar')

<style>


</style>
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
  
        </div>
    </div>
</div>
<div class="content mt-3">

    <div class="col-sm-12">
   
        
        <div id="snackbar">   <span class="badge badge-pill badge-success">Success</span>   {{ Session::get('success') }}.</div>
       
    </div>
    <div class="col-sm-12">

            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Paypal Account</h5>
                
              </div>
              <div class="modal-body">

                <form action="/account" method="post" >
                    @csrf <!-- {{ csrf_field() }} -->
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Client Id:</label>
                    <input type="text" class="form-control" id="recipient-name" name="client" required>
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Secret Id:</label>
                    <input type="text" class="form-control" id="recipient-name" name="secret" required>
                  </div>


              </div>
              <div class="modal-footer">
                <input type="text" class="form-control" id="recipient-name" name="id" value="{{$account->id}}" hidden>
                <button type="submit" class="btn btn-primary">Change</button>
            </form>
              </div>
            </div>

    </div>

    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
            <tr>
          
            <th scope="col">Client Id</th>
            <th scope="col">Secrete Id</th>
        
            </tr>
            </thead>

<tbody>
    @if (!$account)
    <tr>           
       
       
        <td>No Account Added</td>
    
        </tr>
    @else
    <tr>
   
   
        
   
    <td>{{$account->client_id}}</td>
    <td>{{$account->secret_id}}</td>

    </tr>

    @endif


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
 
   
@endif











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
