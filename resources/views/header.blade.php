<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    </head>


	<!-- ACCOUNT -->
    <div class="col-md-3 clearfix">
        <div class="header-ctn">

            <strong id="supp" >



                <a href="{{ url('/myquestions') }}">My Questions</a>
                <a href="{{ url('/myorders') }}">My Orders</a>




            </strong>


            <!-- Menu Toogle -->
            <div class="menu-toggle">
                <a href="#">
                    <i class="fa fa-bars"></i>
                  
                </a>
            </div>
            <!-- /Menu Toogle -->
        </div>
    </div>
    <!-- /ACCOUNT -->
	<!-- NAVIGATION -->
    <div id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->

                <strong id="strip">

                    @foreach ($category as $cat)

                    <a href="/searchbycat/{!! $cat['name'] !!}">{!! $cat['name'] !!}</a>
                    <hr>
                                                 @endforeach
                                                </strong>
                                                 <strong id="strip" style="float: right">                         
                  
            <a id="myButton" >My Questions</a>
            <hr>
            <a href="{{ url('/myorders') }}" >My Orders</a>

        
            <script type="text/javascript">
                document.getElementById("myButton").onclick = function () {
                    if(localStorage.getItem('myquestionsid')){
var myquestionsid = localStorage.getItem('myquestionsid');
location.href = "/quiz?quizId="+myquestionsid;
    } else{
 var uniq = 'id' + (new Date()).getTime();
              localStorage.setItem('myquestionsid', uniq);
        var myquestionsid = uniq;
        location.href = "/quiz?quizId="+myquestionsid;
         }
 
                
                };
            </script>


        </strong>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NAVIGATION -->

<script>

(function($) {
	"use strict"

	// Mobile Nav toggle
	$('.menu-toggle > a').on('click', function (e) {
		e.preventDefault();
		$('#responsive-nav').toggleClass('active');
	})

})(jQuery);

</script>






<div class="row search"   style="padding-bottom: 60px;" >
  


        <div class="content">
            <a href="/"><img src="{{asset('images/logo1.png')}}" class="logo" alt="Logo"></a>

            <div class="title m-b-md">
               <h2>HAVE A QUESTION?</h2>
           <P class="p"> If you have any question you can ask below or enter what you are looking for!</P>
            </div>


        </div>

            <form action="api/search1" method="post" style="width: 80%;" id="desktop" autocomplete="off" >

                    <div class="col-lg-12" style="padding-left: 20%;">
                        <div class="row">
                            <div class="col-lg-3 col-md-4  p-0" style="padding-right: 0px;padding-left:0px;">
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
            <form action="api/search1" method="post" autocomplete="off" id="mobile">

            <div class="form-group">
                <select class="form-control input-sm input-10" name="categories">
                    <option value="all">Select Category</option>
                    @foreach ($category as $cat)

                    <option value="{!! $cat['name'] !!}">{!! $cat['name'] !!}</option>
                                                 @endforeach

                </select>
                <input type="text" name="data" class="form-control input-sm input-32" placeholder="Search any question here" id="searchbox" required>

                 <button type="submit" name="submit" class="btn btn-danger input-sc">Search</button>
         </div>
        </form>
    </div>
