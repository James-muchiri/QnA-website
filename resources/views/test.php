$(document).ready(function () {
    var typingTimer;                //timer identifier
    var doneTypingInterval = 300;  //time in ms (5 seconds)

    $("#searchbox").on('keyup', function () {
        clearTimeout(typingTimer);
        if ($('#searchbox').val()) {
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
        }
    });
});

//user is "finished typing," do something
function doneTyping() {
    var key = $('#searchbox').val();

    if (key.length >= 2) {
        $.ajax({
            url: "/api/search",
            type: 'POST',
            data:{
                key:key,
                "_token": "{{ csrf_token() }}",

                },
            beforeSend: function () {
                $("#results").slideUp('fast');
            },
            success: function (data) {
                $("#results").html(data);
                $("#results").slideDown('fast');
            }
        });

}
}




<div id="popup" style="display: none;">
    <div id="backgroundOverlay"></div>
<div id="content">
   <!-- <input type="search" name="keyword" placeholder="Search Names" id="searchbox">
   -->
    <div id="results"></div>
 </div>
</div>













<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,500i,700" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.magnific-popup/1.0.0/magnific-popup.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
       <link rel="stylesheet" href="{{ asset('css/style.css') }}">
       <link rel="stylesheet" href="{{ asset('css/sty.css') }}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
    .price{

    color: #1c1a1a;
    margin-top: 100px;
    border-left: 1px solid #dedede;
    padding: 50px;
    font-weight: bold;
    font-size: 24px;
}
}
    }
    .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }



.modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: .3rem;
    outline: 0;
    padding-right: 5px !important;
    width: 800px !important;
    border-radius: 2%;
}
.cart_modal_header {
    display: flex !important;
    padding-left: 240px;
}
.modal-body {
    padding-left: 50px;
}
#remove_item {
    box-shadow: inset 0px 1px 0px 0px #ffffff;
    background: linear-gradient(to bottom, #f9f9f9 5%, #e9e9e9 100%);
    background-color: #f9f9f9;
    border-radius: 6px;
    border: 1px solid #dcdcdc;
    display: inline-block;
    cursor: pointer;
    color: #666666;
    font-family: Arial;
    font-size: 15px;
    font-weight: bold;
    padding: 6px;
    text-decoration: none;
    text-shadow: 0px 1px 0px #ffffff;
    line-height: 15px;
}
.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
    color: #555;
    cursor: default;
    background-color: #fff;
    border: 1px solid #f00;
        border-bottom-color: rgb(255, 0, 0);
    border-bottom-color: transparent;
}
.flex-center {
    padding-top: 120px;
            }

    .form {
    position: relative;
    padding: 1rem;
    margin: 1rem -.75rem 0;
    border: solid #006cd8;
    border-width: 1px 1px 1px;
}
.ptb--40 {
    padding: 40px 0;
}
.ptb--20 {
    padding: 20px 0;
}
.section__title--call h2 {
    color: #545454;
    font-size: 26px;
    margin-bottom: 15px;
    margin-top: 4px;
    padding-bottom: 20px;
    position: relative;
}
.section__title--call p {
    font-size: 16px;
    line-height: 27px;
    margin: 0;
    color: #545454;
}

.section__title--call h3 {
    color: #545454;
    font-size: 26px;
    /* margin-bottom: 35px; */
    margin-top: 4px;
    /* padding-bottom: 40px; */
    position: relative;
}

button.call_back_btn {
    display: inline-block;
    font-size: 10px;
    position: relative;
    transition: all 0.5s ease 0s;
    z-index: 1;
    -webkit-border-radius: 2px;
    font-weight: 700;
    padding: 15px 15px !important;
    /* margin: 12px; */
    max-width: 240px;
    line-height: 20px;
    height: 50px;
    background: #074578 none repeat scroll 0 0 !important;
    color: #ffffff !important;
    border: none;
}
.form-group{
    padding: 20px
}



.divShopping {
 width: 100px;
    position: fixed;

        -moz-border-radius: 50px;
    -webkit-border-radius: 50px;
      height: 100px;

    text-align: center;
    	bottom:30px;
	right:20px;
    background: #2c3dcf;
	color:#FFF;
	border-radius:50px;
    z-index: 99;
	box-shadow: 2px 2px 3px #999;





}

.divShopping:hover {
  animation: shake 0.82s cubic-bezier(.36,.07,.19,.97) both;
  transform: translate3d(0, 0, 0);
  perspective: 1000px;
}

@keyframes shake {
  10%, 90% {
    transform: translate3d(-1px, 0, 0);
  }
  20%, 80% {
    transform: translate3d(2px, 0, 0);
  }

  30%, 50%, 70% {
    transform: translate3d(-2px, 0, 0);
  }
  40%, 60% {
    transform: translate3d(2px, 0, 0);
}

}
.divShopping .fa-shopping-cart{
    margin-top: 30px;
    font-size: 50px;
}
.cart-basket {
    font-weight: 500;
    font-size: 12px;
    letter-spacing: 1.5px;
    width: 18px;
    height: 18px;
    position: absolute;
    top: -6px;
    right: 22px;

    color: #fff;
    background-color: #eb8541;
    border-radius: 50%;
}

#results {
    position: absolute;
top: 0px;
background-color: white;
box-shadow: 0 4px 8px 0 rgba(0,0,0,0.15);

}

#item  {
      width: 590px;
    padding-left: 16px;
    padding-top: 8px;
    padding-bottom: 8px;
    color: #67003c;
    font-weight: 800;
    font-size: 14px;
}


#backgroundOverlay{
    background-color:transparent;
    position:fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    display:block;
}
#popup {

    width: 600px;
    height: 180px;
    position: absolute;
    margin-left: 15vw;
    overflow-y: auto;
    overflow-x: hidden;
}
#callbackbtn{
    display: inline-block;
    font-size: 10px;
    position: relative;
    transition: all 0.5s ease 0s;
    z-index: 1;
    -webkit-border-radius: 2px;
    font-weight: 700;
    padding: 15px 15px !important;
    /* margin: 12px; */
   width: 100px;

    background: #074578 none repeat scroll 0 0;
    color: #ffffff !important;
    border: none;
}

.popup{
    width: 900px;
    margin: auto;
    text-align: center
}
.popup img{
    width: 200px;
    height: 200px;
    cursor: pointer
}
.show{
    z-index: 999;
    display: none;
}
.show .overlay{
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.66);
    position: absolute;
    top: 0;
    left: 0;
}
.show .img-show{
    width: 600px;
    height: 400px;
    background: #FFF;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    overflow: hidden
}
.img-show span{
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 99;
    cursor: pointer;
}
.img-show img{
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
}

ul.pagination li a.current {
    background-color: #4CAF50;
    color: white;
}

    </style>
    </head>
    <body>

        <div class="container-fluid">
            <div class="row header-1">

    <div class="col-md-12 header-juu" style="color: white;">




        <strong id="strip">

            @foreach ($category as $cat)

            <a href="{{ url('/coming-soon') }}">{!! $cat['name'] !!}</a>
                                         @endforeach


</strong>

<strong id="strip" style="float:right;">



    <a href="{{ url('/coming-soon') }}">My Questions</a>




</strong>

</div>



        </div>


        <div class="row search"   style="padding-bottom: 60px;" >
            <a href="/"><img src="{{asset('images/logo1.png')}}" class="logo" alt="Logo"></a>



                <div class="content">
                    <div class="title m-b-md">
                       <h2>HAVE A QUESTION?</h2>
                   <P class="p"> If you have any question you can ask below or enter what you are looking for!</P>
                    </div>


                </div>

                    <form action="api/search1" method="post" style="width: 80%;" autocomplete="off">

                            <div class="col-lg-12" style="padding-left: 20%;">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-12 p-0" style="padding-right: 0px;padding-left:0px;">
                                        <select class="form-control search-slt" name="categories">
                                            <option value="all">Select Category</option>
                                            @foreach ($category as $cat)

                                            <option value="{!! $cat['name'] !!}">{!! $cat['name'] !!}</option>
                                                                         @endforeach

                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-4 col-sm-12 p-0" style="padding-right: 0px;padding-left:0px;">
                                        <input type="text" name="data" class="form-control search-slt" placeholder="Search any question here" id="searchbox" required>
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-12 p-0" style="padding-right: 0px;padding-left:0px;">
                                        <button type="submit" name="submit" class="btn btn-danger wrn-btn">Search</button>
                                    </div>
                                </div>

                        </div>
                    </form>



            </div>



            <div class="row" id="quiz">
<div class="col-md-12">
    <div class="tabs-warp question-tab">
        <div class="borderbottom">

<ul class="tabs nav nav-tabs">
<li class="active tab"><a data-toggle="tab" href="#home"><span>Recent Questions</span></a></li>
<li class="tab"><a data-toggle="tab" href="#menu1"><span>Frequent Asked Questions</span></a></li>
<li class="tab"><a data-toggle="tab" href="#menu2"><span>Recent Questions</span></a></li>
<li class="tab"><a data-toggle="tab" href="#menu3"><span>Recent Questions</span></a></li>
</ul>
                                            </div>


        </div>



    </div>
</div>


<div class="container">


   <div class="tab-content">
     <div id="home" class="tab-pane fade in active">



        @foreach ($questions as $question)
        <div class="container" id="quiz">
        <div class="row" >
            <div class="col-md-2 flex-center">

                <div class="rotate">{!! $question['category'] !!}</div>
            </div>


            <div class="col-md-7" id="col">
                <h3><u>Question: {!! $question['description'] !!}</u></h3>
@if( $question['type'] == 'image')
                <a class="image-link" href="{{ asset('product') }}/{{$question->file}}"><img src="{{ asset('product') }}/{{$question->file}}" style="height: 150px;"></a>


@elseif ($question['type'] == 'pdf')
                <iframe src="/uploads/media/default/0001/01/540cb75550adf33f281f29132dddd14fded85bfc.pdf#toolbar=0" width="100%" height="500px">
                </iframe>

@elseif ($question['type'] == 'text')


@endif
                <h6 style=" float: right;top: -20px;">260 views</h6>
                <h3><u>Answer preview</u></h3>
                @php
                $des = DB::table('answers')
                             ->where('questionid', $question['questionid'])->first();

                 @endphp

                <p>{!! $des->preview !!}</p>
                     <a onclick="savequiz('{!! $question['id'] !!}')" style="margin-right: 5px;" type="button" class="btn btn-success">Save Question</a>
                     <a onclick="postRecord('{!! $question['id'] !!}')" style="color: white;" type="button" class="btn btn-danger"><i class="fa fa-shopping-cart" ></i> Add Cart</a>


                    </div>

                             <div class="col-md-3 ">

                        <div class="price">
                            price: $ {!! $des->price !!}
                            <hr>
                            <h6>260 views</h6>
                            <h6> last updated: 03/08/22</h6>

                        </div>
                    </div>

        </div>
        <div class="row">
            <hr>
        </div>
    </div>
        @endforeach


    </div>
     <div id="menu1" class="tab-pane fade">
       <h3>Menu 1</h3>
       <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
     </div>
     <div id="menu2" class="tab-pane fade">
       <h3>Menu 2</h3>
       <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
     </div>
     <div id="menu3" class="tab-pane fade">
       <h3>Menu 3</h3>
       <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.magnific-popup/1.0.0/jquery.magnific-popup.js"></script>
    <script>
           $(document).ready(function ($)  {
  $('.image-link').magnificPopup({type:'image'});
});
    function postRecord(id){
    console.log("btn clicked1");

    var dataId = id;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    console.log(dataId);

    $.ajax({
    type: 'get',
    data:  dataId,
    url: '/addToCart/'+dataId,
    success:
        function( response ){

            cartCount();

        }
    });
};


function cartCount(){
    console.log("count record");

    $.ajax({
    type: 'get',
    url: '/getCart',
    dataType: 'json',
    success:
        function( data ){
            //localStorage.clear();
            var count=0;
            $.each(data, function(index, element) {


                count = count + 1;
            });
            // console.log(count);
            // if(count==0){
            //     $("span #counter").hide();
            // }else{
            //     $("#counter").text(count);
            // }
            // $("#tec_cart").html('<span class="cart-basket d-flex align-items-center justify-content-center" id="counter">'+'</span>');
            $("#counter").text(count);
        }
    });
};


function savequiz(id){
    console.log("btn clicked1");

    var dataId = id;
   var quizs = JSON.parse(localStorage.getItem("quiz"));

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    console.log(dataId);
    console.log(quizs);
    $.ajax({
    type: 'post',
    data:{
                         "_token": "{{ csrf_token() }}",
                         dataId:dataId,
                         quizs:quizs,
                                 },
    url: '/savequiz',
    success:
        function( response ){
            console.log(response);
const person = {
    name: "Obaseki Nosa",
    location: "Lagos",
}
//window.localStorage.setItem('user', JSON.stringify(person));
window.localStorage.setItem('quiz', JSON.stringify(person));
            cartCount();

        }
    });
};
$(function () {
    "use strict";

    $(".popup img").click(function () {
        var $src = $(this).attr("src");
        $(".show").fadeIn();
        $(".img-show img").attr("src", $src);
    });

    $("span, .overlay").click(function () {
        $(".show").fadeOut();
    });

});
$(document).ready(function(){

    cartCount();



    });




function removeItem(id){
    console.log("Remove from cart");

    var dataId = id;
    // console.log(dataId);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
    type: 'get',
    data:  dataId,
    url: '/remove/'+dataId,
    dataType: 'json',
    success:
        function( data ){
            // console.log(data);
            fetchRecord();
            $('#t_data').remove();
        }
    });
};

</script>
<div class="row" id="" style="padding:50px;">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 text-center">
        <div class="about__inner ptb--40">
            <div class="section__title--call">
                <h2>Burning Issue</h2>
                <p>Give us a shout out <br>
                    <i class="fa fa-phone" style="color: #f7a220"></i>&nbsp;0718360109 <br>
                    <i class="fa fa-phone" style="color: #f7a220"></i>&nbsp;0718360109 <br>
                     </p>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 mt--20" >
    </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt--20" style="background: #ebebeb">
        <div class="about__inner ptb--20 pl-3">
            <div class="section__title--call">
                <h3>Have any question reach us at</h3>
                <form id="contactForm">
                    <div class="col-12">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" name="fname" style="width: 100%;" class="form-control" id="fname" placeholder="Full Names">
                            </div>

                            <div class="form-group col-md-4">
                                <input type="email" name="email" style="width: 100%;" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" name="tel" style="width: 100%;" class="form-control" id="tel" placeholder="Phone Number">
                            </div>
                        </div>
                        <br>
                        <div class="form-row">


                            <div class="form-group col-md-8">

                                <textarea name="comment" style="width: 100%;" class="form-control" id="comment" placeholder="Enter Message"></textarea>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="contact-btn" style="padding:10px;text-align:center;">
                                                <button id="callbackbtn" type="submit" class="btn btn-dark">Submit</button>
                                                                 </div>
                                <span id="output"></span>
                            </div>
                        </div>
                        <br>


                    </div>
                </form>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

                <script type="text/javascript">

                 $('#contactForm').on('submit',function(e){
                     e.preventDefault();

                     let name = $('#fname').val();
                     let email = $('#email').val();
                     let mobile_number = $('#tel').val();
                     let subject = $('#comment').val();


                     $.ajax({
                       url: "/comments",
                       type:"POST",
                       data:{
                         "_token": "{{ csrf_token() }}",
                         fname:name,
                         email:email,
                         tel:mobile_number,
                        comment:subject,
                                 },
                       success:function(response){
                         console.log(response.success);
                         alert(response.success);
                       },
                      });
                     });
                   </script>
            </div>
        </div>
    </div>
    </div>

    <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <h6>About</h6>
              <p class="text-justify">Q&a <i>Ask Us</i> is an initiative  to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code wants to be simple. We will help programmers build up concepts in different programming languages that include C, C++, Java, HTML, CSS,
                 Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
            </div>

            <div class="col-xs-6 col-md-3">
              <h6>Categories</h6>
              <ul class="footer-links">

                @foreach ($category as $cat)

                <li> <a href="{{ url('/coming-soon') }}">{!! $cat['name'] !!}</a></li>
                                             @endforeach


              </ul>
            </div>

            <div class="col-xs-6 col-md-3">
              <h6>Quick Links</h6>
              <ul class="footer-links">
                <li><a href="http://scanfcode.com/about/">About Us</a></li>
                <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
                <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Search</a></li>

              </ul>
            </div>
          </div>
          <hr>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
              <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by
           <a href="#">Engineer Mwas</a>.
              </p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
              <ul class="social-icons">
                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
  </footer>
</html>
<script>



    window.onload = function(){
	var popup = document.getElementById('popup');
    var overlay = document.getElementById('backgroundOverlay');
    var openButton = document.getElementById('searchbox');
    document.onclick = function(e){
        if(e.target.id == 'backgroundOverlay'){
            popup.style.display = 'none';
            overlay.style.display = 'none';
        }
        if(e.target === openButton){
         	popup.style.display = 'block';
            overlay.style.display = 'block';
        }
    };
};





(function($) {
	var pagify = {
		items: {},
		container: null,
		totalPages: 1,
		perPage: 3,
		currentPage: 0,
		createNavigation: function() {
			this.totalPages = Math.ceil(this.items.length / this.perPage);

			$('.pagination', this.container.parent()).remove();
			var pagination = $('<ul class="pagination" justify-content-center"></nav>').append(' <li class="page-item"><a class="nav prev page-link disabled" data-next="false">Previous</a></li>');

			for (var i = 0; i < this.totalPages; i++) {
				var pageElClass = "page";
				if (!i)
					pageElClass = "page current";
				var pageEl = '<li class="page-item "><a class="' + pageElClass + '" data-page="' + (
				i + 1) + '">' + (
				i + 1) + "</a></li>";
				pagination.append(pageEl);
			}
			pagination.append('<li class="page-item "><a class="nav page-link next" data-next="true">Next</a></li>');

			this.container.after(pagination);

			var that = this;
			$("body").off("click", ".nav");
			this.navigator = $("body").on("click", ".nav", function() {
				var el = $(this);
				that.navigate(el.data("next"));
			});

			$("body").off("click", ".page");
			this.pageNavigator = $("body").on("click", ".page", function() {
				var el = $(this);
				that.goToPage(el.data("page"));
			});
		},
		navigate: function(next) {
			// default perPage to 5
			if (isNaN(next) || next === undefined) {
				next = true;
			}
			$(".pagination .nav").removeClass("disabled");
			if (next) {
				this.currentPage++;
				if (this.currentPage > (this.totalPages - 1))
					this.currentPage = (this.totalPages - 1);
				if (this.currentPage == (this.totalPages - 1))
					$(".pagination .nav.next").addClass("disabled");
				}
			else {
				this.currentPage--;
				if (this.currentPage < 0)
					this.currentPage = 0;
				if (this.currentPage == 0)
					$(".pagination .nav.prev").addClass("disabled");
				}

			this.showItems();
		},
		updateNavigation: function() {

			var pages = $(".pagination .page");
			pages.removeClass("current");
			$('.pagination .page[data-page="' + (
			this.currentPage + 1) + '"]').addClass("current");
		},
		goToPage: function(page) {

			this.currentPage = page - 1;

			$(".pagination .nav").removeClass("disabled");
			if (this.currentPage == (this.totalPages - 1))
				$(".pagination .nav.next").addClass("disabled");

			if (this.currentPage == 0)
				$(".pagination .nav.prev").addClass("disabled");
			this.showItems();
		},
		showItems: function() {
			this.items.hide();
			var base = this.perPage * this.currentPage;
			this.items.slice(base, base + this.perPage).show();

			this.updateNavigation();
		},
		init: function(container, items, perPage) {
			this.container = container;
			this.currentPage = 0;
			this.totalPages = 1;
			this.perPage = perPage;
			this.items = items;
			this.createNavigation();
			this.showItems();
		}
	};

	// stuff it all into a jQuery method!
	$.fn.pagify = function(perPage, itemSelector) {
		var el = $(this);
		var items = $(itemSelector, el);

		// default perPage to 5
		if (isNaN(perPage) || perPage === undefined) {
			perPage = 3;
		}

		// don't fire if fewer items than perPage
		if (items.length <= perPage) {
			return true;
		}

		pagify.init(el, items, perPage);
	};
})(jQuery);

$("#home").pagify(6, "#quiz");

        </script>























function previewImages() {

var preview = document.querySelector('#preview');

if (this.files) {
  [].forEach.call(this.files, readAndPreview);
}

function readAndPreview(file) {

 // Make sure `file.name` matches our extensions criteria
 if (!/\.(jpe?g|png|gif|pdf)$/i.test(file.name)) {
    return alert(file.name + " is not an image");
  } // else...
  var pdfjsLib = window['pdfjs-dist/build/pdf'];
// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';


	if(file.type == "application/pdf"){
		var fileReader = new FileReader();  
		fileReader.onload = function() {
			var pdfData = new Uint8Array(this.result);
			// Using DocumentInitParameters object to load binary data.
			var loadingTask = pdfjsLib.getDocument({data: pdfData});
			loadingTask.promise.then(function(pdf) {
			  console.log('PDF loaded');
			  
			  // Fetch the first page
			  var pageNumber = 1;
			  pdf.getPage(pageNumber).then(function(page) {
				console.log('Page loaded');
				
				var scale = 1.5;
				var viewport = page.getViewport({scale: scale});

				// Prepare canvas using PDF page dimensions
				var canvas = $("#pdfViewer")[0];
				var context = canvas.getContext('2d');
				canvas.height = viewport.height;
				canvas.width = viewport.width;

				// Render PDF page into canvas context
				var renderContext = {
				  canvasContext: context,
				  viewport: viewport
				};
				var renderTask = page.render(renderContext);
				renderTask.promise.then(function () {
				  console.log('Page rendered');
				});
			  });
			}, function (reason) {
			  // PDF loading error
			  console.error(reason);
			});
		};
		fileReader.readAsArrayBuffer(file);
	}

else{



 
  var reader = new FileReader();
  
  reader.addEventListener("load", function() {
    var image = new Image();
    image.height = 100;
    image.title  = file.name;
    image.src    = this.result;
    preview.appendChild(image);
  });
  
  reader.readAsDataURL(file);
}
}

}

document.querySelector('#fileInput_0').addEventListener("change", previewImages);













<div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Upload questions files here:</label>
                      <input id="file-input" type="file" class="form-control" name="question_file[]" multiple>
                      <div id="fileList">
                        <div>
                            <input id="fileInput_0" type="file" name="file[]" />
                            <label for="fileInput_0">+</label>      
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group" >
                            <div>
                              <label for="exampleInputEmail1" class="form-label">Questions here:</label>
                       
                              
                          </div>
      
                            </div>
                      <div id="preview"></div>
                    </div>
                    <div class="col-sm-6">
                     
                      <canvas id="pdfViewer" style="width: 400px; height: 200px;"></canvas>
                    </div>
                    </div>
                    </div>