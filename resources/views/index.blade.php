@include('header')
<style>
    #snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  font-weight: bold;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  right: 2%;
  top: 30px;
  z-index: 99;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

#snackbar1 {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: rgb(44, 82, 10);
  color: #fff;
  font-weight: bold;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  right: 2%;
  top: 30px;
  z-index: 99;
  font-size: 17px;
}

#snackbar1.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {top: 0; opacity: 0;} 
  to {top: 30px; opacity: 1;}
}

@keyframes fadein {
  from {top: 0; opacity: 0;}
  to {top: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {top: 30px; opacity: 1;} 
  to {top: 0; opacity: 0;}
}

@keyframes fadeout {
  from {top: 30px; opacity: 1;}
  to {top: 0; opacity: 0;}
}
</style>

    <body>

            <div class="row" id="quiz">
<div class="col-md-12">
    <div class="tabs-warp question-tab">
        <div class="borderbottom">

<ul class="tabs nav nav-tabs">
<li class="active tab"><a data-toggle="tab" href="#home"><span>Recent Questions</span></a></li>
<li class="tab"><a data-toggle="tab" href="#menu1"><span>Frequent Asked Questions</span></a></li>


</ul>
                                            </div>


        </div>



    </div>
</div>
</div>


<div class="container">


   <div class="tab-content">
     <div id="home" class="tab-pane fade in active">

        <div id="home1">

     
            @foreach ($questions as $question)
            <div class="container" id="quiz">
            <div class="row"  >
                <div class="col-md-2 flex-center" id="desktop">
    
                    <div class="rotate">{!! $question['category'] !!}</div>
                </div>
    
                @php
               $question_files  =  \App\Questions_files::where('questionid', $question['questionid'])->get();
               
                   @endphp
                   
                <div class="col-md-7" id="col">
                    <h3><u>Question: {!! $question['description'] !!}</u></h3>
    
                    <div class="com-text">
                        <?php echo $question['html'];?>
                    </div>
    @if ($question_files->count() > 0)
        
    
    
                    
                    @foreach ($question_files as $question_file)
    @if( $question_file['type'] == 'image')
    <p>Question Image</p>
                    <a class="image-link" href="{{ asset('product') }}/{{$question_file->file}}"><img src="{{ asset('product') }}/{{$question_file->file}}" style="height: 150px;width: 100%;"></a>
    
    
    @elseif ($question_file['type'] == 'pdf')
    <p>Question Pdf</p>
                    <iframe src="{{ asset('product') }}/{{$question_file->file}}#toolbar=0" width="100%" height="250px">
                    </iframe>
    
    
    
    @endif
    @endforeach
    @endif
                    <h3><u>Answer preview</u></h3>
                    @php
                  $des =  \App\Answers::where('questionid', $question['questionid'])->first();
                 $p = $des->preview ;
                     @endphp
    
                    <p>{{ $p }}</p>
                         <a onclick="savequiz('{!! $question['id'] !!}')" style="margin-right: 5px;color: #fdfdfd;font-weight: bold;font-size: 16px;" type="button" class="btn btn-success">Save Question</a>
                         <a onclick="postRecord('{!! $question['id'] !!}')" style="color: white;color: #000;font-weight: bold;font-size: 16px;" type="button" class="btn btn-danger"><i class="fa fa-shopping-cart" ></i> Add Cart</a>
    
    
                        </div>
    
                                 <div class="col-md-3 ">
    
                            <div class="price">
                                price: $ {!! $des->price !!}
                                
                                <hr>
                                <div id="mobile">
                                    Category: {!! $question['category'] !!}
                                <hr>
                            </div>
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
</div>
     <div id="menu1" class="tab-pane fade">

        @foreach ($questions as $question)
        <div class="container" id="quiz">
        <div class="row"  >
            <div class="col-md-2 flex-center" id="desktop">

                <div class="rotate">{!! $question['category'] !!}</div>
            </div>

            @php
           $question_files  =  \App\Questions_files::where('questionid', $question['questionid'])->get();
           
               @endphp
               
            <div class="col-md-7" id="col">
                <h3><u>Question: {!! $question['description'] !!}</u></h3>

                <div class="com-text">
                    <?php echo $question['html'];?>
                </div>
@if ($question_files->count() > 0)
    


                
                @foreach ($question_files as $question_file)
@if( $question_file['type'] == 'image')
<p>Question Image</p>
                <a class="image-link" href="{{ asset('product') }}/{{$question_file->file}}"><img src="{{ asset('product') }}/{{$question_file->file}}" style="height: 150px;width: 100%;"></a>


@elseif ($question_file['type'] == 'pdf')
<p>Question Pdf</p>
                <iframe src="{{ asset('product') }}/{{$question_file->file}}#toolbar=0" width="100%" height="250px">
                </iframe>



@endif
@endforeach
@endif
                <h3><u>Answer preview</u></h3>
                @php
              $des =  \App\Answers::where('questionid', $question['questionid'])->first();
             $p = $des->preview ;
                 @endphp

                <p>{{ $p }}</p>
                <a onclick="savequiz('{!! $question['id'] !!}')" style="margin-right: 5px;color: #fdfdfd;font-weight: bold;font-size: 16px;" type="button" class="btn btn-success">Save Question</a>
                <a onclick="postRecord('{!! $question['id'] !!}')" style="color: white;color: #000;font-weight: bold;font-size: 16px;" type="button" class="btn btn-danger"><i class="fa fa-shopping-cart" ></i> Add Cart</a>



                    </div>

                             <div class="col-md-3 ">

                        <div class="price">
                            price: $ {!! $des->price !!}
                            
                            <hr>
                            <div id="mobile">
                                Category: {!! $question['category'] !!}
                            <hr>
                        </div>
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


   </div>
 </div>


    <div id="snackbar">   <span class="badge badge-pill badge-success">Success</span> Added to Cart.</div>
    <div id="snackbar1">   <span class="badge badge-pill badge-success">Success</span> Question Saved.</div>
          
 



    <script type="text/javascript">
     
        
        function myFunction() {
          var x = document.getElementById("snackbar");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
     
        
        function myFunction1() {
          var x = document.getElementById("snackbar1");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
        </script>

   
  


        <a class="img_basket popup_cart" id="cart" href="/checkoutcart" >
            <div class="dropdown divShopping" id="divShopping">

                <i class="fa fa-shopping-cart"></i>
                              <div class="qty"><span class="cart-basket d-flex align-items-center justify-content-center" id="counter"></span></div>
       </div>
    </a>

    </body>
    @include('footer')
    @include('pagejs')
   <script>



function savequiz(id){
    console.log("btn clicked1");

    var dataId = id;

    if(localStorage.getItem('myquestionsid')){
var myquestionsid = localStorage.getItem('myquestionsid');
console.log(myquestionsid);

    } else{
 //  var id = "id" + Math.random().toString(16).slice(2);
 var uniq = 'id' + (new Date()).getTime();
       // console.log(id);
        localStorage.setItem('myquestionsid', uniq);
        console.log(uniq);
        var myquestionsid = uniq;
      //  window.location.replace("/success");
    }

   
    $.ajax({
      url: '/savequiz',
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        dataId:dataId,
        myquestionsid:myquestionsid,
                },
      success:function(response){
        myFunction1();
       
      },
     });
  
};

</script>
</html>
