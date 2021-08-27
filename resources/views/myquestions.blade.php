@include('header')

    <body>

        <div class="row">

            <hr>
        </div>



        <div class="row">

            <h3 style="padding-left:30%;">My questions</h3>
        </div>



        <div class="row">

            <hr>
        </div>
        @php
        $n = 0;

@endphp
          
            <div class="row" id="quiz">
                @if(count($myquestions) >0)
                @foreach ($myquestions as $item)

                @php
                $question  =  \App\Questions::where('id', $item)->first();
                
                    @endphp
                <div class="container" id="quiz">
                <div class="row"  >
                    <div class="col-md-2 flex-center" id="desktop">
        
                        <div class="rotate">{!! $question['category'] !!}</div>
                    </div>
        
                    @php
                   $question_files  =  \App\Questions_files::where('questionid', $question['questionid'])->get();
                   
                       @endphp
                       
                    <div class="col-md-7" id="col">
                        <h3>Question {!! $n =$n +1 !!}. <u> {!! $question['description'] !!}</u></h3>
        
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
                             <a onclick="remove('{!! $question['id'] !!}')" style="margin-right: 5px;" type="button" class="btn btn-success">remove Question</a>
                             <a onclick="postRecord('{!! $question['id'] !!}')" style="color: white;" type="button" class="btn btn-danger"><i class="fa fa-shopping-cart" ></i> Add Cart</a>
        
        
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
             
                @else
                    Empty
                @endif
    

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
@include('footer')
@include('pagejs')

<script>




function remove(id){
    console.log("btn clicked1");

    var dataId = id;


var myquestionsid = localStorage.getItem('myquestionsid');
console.log(myquestionsid);

   
    $.ajax({
      url: '/remove',
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        dataId:dataId,
        myquestionsid:myquestionsid,
                },
      success:function(response){
        window.alert(response.success);

      },
     });
  
};

function deleteItem() {
  localStorage.removeItem("questions");
  myquestions();
};
</script>


</html>
