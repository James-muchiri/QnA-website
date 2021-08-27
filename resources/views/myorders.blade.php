@include('header')

    <body>
<style>
        @media only screen and (max-width: 991px) {
            .modal-content {
        width: 100%;
            }
        }
    </style>    
        <div class="row" id="quiz">
                <div class="col-md-12">
                    <div class="tabs-warp question-tab">
                        <div class="borderbottom">

                <ul class="tabs nav nav-tabs">
                <li class="active tab"><a data-toggle="tab" href="#home"><span>Pending Orders</span></a></li>
                <li class="tab"><a data-toggle="tab" href="#menu1"><span>Complete Orders</span></a></li>


                </ul>                        </div>

                    </div>

                    </div>
                </div>

                <div class="row" id="quiz">
                    <div class="col-md-12" id="">
                      <h2 style="text-align: center;">My Orders</h2>
                        </div>

                        </div>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <div class="row" id="checkout">
        <div class="col-md-12" id="questions">


        </div>
        </div>
      </div>
      <div id="menu1" class="tab-pane fade">
        <div class="row" id="checkout">
        <div class="col-md-12" id="orders">

   </div>
        </div>
    </div>
    </div>

</div>
        </div>



        <a class="img_basket popup_cart" id="cart" href="/checkoutcart" >
            <div class="dropdown divShopping" id="divShopping">

                <i class="fa fa-shopping-cart"></i>
                              <div class="qty"><span class="cart-basket d-flex align-items-center justify-content-center" id="counter"></span></div>



        </div>
    </a>














</body>


<script>



function pendingorders(){
console.log("pendingorders");

let order = "";
    if(localStorage.getItem('order')){
var orderid = localStorage.getItem('order');
console.log(orderid);


$.ajax({
      url: "/myorders",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        orderid:orderid,
                },
      success:function(response){
        console.log(response);
        $("#questions").html("");
        var t_data="";
        $.each(response, function(index, element) {

            if (element.status == 'unpaid') {





t_data=t_data+

'<div class="modal-content" style="margin-bottom:10px;">'+
    '  <div class="modal-header">'+
        '  <h5 class="modal-title" id="exampleModalLabel">'+element.updated_at+'</h5>'+



        ' </div>'+
'<div class="modal-body">'+
            '<div class="row">'+
            '<div class="col-lg-6 col-md-4 col-sm-12 p-0">'+
               '<label for="recipient-name" class="col-form-label">Email Address:</label><br>'+
               '<h4>'+element.email+'</h4>'+'<br>'+
                '<label for="recipient-name" class="col-form-label">Full Names:</label><br>'+
                '<h4>'+element.name+'</h4>'+'<br>'+
                '<label for="recipient-name" class="col-form-label">Starus:</label><br>'+
                '<h4>'+element.status+'</h4>'+'<br>'+
                '</div>'+
            '<div class="col-lg-6 col-md-4 col-sm-12 p-0">'+
                '<label for="recipient-name" class="col-form-label">Question:</label> <br>'+
                '<h4>'+element.questions+'</h4>'+'<br>'+
                '<label for="recipient-name" class="col-form-label">Total Amonut:</label><br>'+
                '<h4>'+element.total+'</h4>'+'<br>'+
                '<label for="recipient-name" class="col-form-label">Order Number:</label><br>'+
                '<h4>'+element.order_number+'</h4>'+'<br>'+
                '</div>'+
            '</div>'+
        '</div>'+
        '<div class="modal-footer">'+


            '</div>'+
        '</div>';



























}

$("#questions").append(t_data);





        });
              },
     });



    } else{


        $("#questions").html("");
    var t_data="";
    t_data=t_data+
    '<h3><u>Empty</u></h3>';
    $("#questions").append(t_data);

    }



};







function completeorders(){
console.log("completeorders");

let order = "";
    if(localStorage.getItem('order')){
var orderid = localStorage.getItem('order');
console.log(orderid);


$.ajax({
      url: "/myorders",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        orderid:orderid,
                },
      success:function(response){
        console.log(response);
        $("#orders").html("");
        var t_data="";
        $.each(response, function(index, element) {

            if (element.status == 'paid') {





t_data=t_data+
'<div class="modal-content" style="margin-bottom:10px;">'+
    '  <div class="modal-header">'+
        '  <h5 class="modal-title" id="exampleModalLabel">'+element.updated_at+'</h5>'+



        ' </div>'+
'<div class="modal-body">'+
            '<div class="row">'+
            '<div class="col-lg-6 col-md-4 col-sm-12 p-0">'+
               '<label for="recipient-name" class="col-form-label">Email Address:</label><br>'+
               '<h4>'+element.email+'</h4>'+'<br>'+
                '<label for="recipient-name" class="col-form-label">Full Names:</label><br>'+
                '<h4>'+element.name+'</h4>'+'<br>'+
                '<label for="recipient-name" class="col-form-label">Starus:</label><br>'+
                '<h4>'+element.status+'</h4>'+'<br>'+
                '</div>'+
            '<div class="col-lg-6 col-md-4 col-sm-12 p-0">'+
                '<label for="recipient-name" class="col-form-label">Question:</label> <br>'+
                '<h4>'+element.questions+'</h4>'+'<br>'+
                '<label for="recipient-name" class="col-form-label">Total Amonut:</label><br>'+
                '<h4>'+element.total+'</h4>'+'<br>'+
                '<label for="recipient-name" class="col-form-label">Order Number:</label><br>'+
                '<h4>'+element.order_number+'</h4>'+'<br>'+
                '</div>'+
            '</div>'+
        '</div>'+
        '<div class="modal-footer">'+
            '<a class="btn btn-success" href="/order/'+element.order_number+'" role="button">View Order</a>'+

            '</div>'+
        '</div>';




}

$("#orders").append(t_data);





        });
              },
     });



    } else{
        $("#orders").html("");
    var t_data="";
    t_data=t_data+
    '<h3><u>Empty</u></h3>';
    $("#orders").append(t_data);


    }



};
























$(document).ready(function(){

    pendingorders();
    completeorders();

});






</script>
    @include('footer')
    @include('pagejs')

</html>
