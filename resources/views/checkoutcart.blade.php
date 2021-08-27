@include('header')

    <body>

      <div class="row">

        <hr>
    </div>



    <div class="row">

        <h3 style="padding-left:30%;">Checkout</h3>
    </div>



    <div class="row">

        <hr>
    </div>


        <div class="container" id="quiz">
            <div class="row" >



            @foreach ($cart as $question)

  
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
                    <a onclick="savequiz('{!! $question['id'] !!}')" style="color: white;font-weight: bold;font-size: 16px;"  type="button" class="btn btn-success">Save Question</a>
                    <a href="/remove/{!! $question['id'] !!}" style="color: #000;font-weight: bold;font-size: 16px;"  type="button" class="btn btn-danger">Remove Question</a>
                

    
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
<div class="row" id="quiz" style=";">

<div class="col-sm-2"> </div>
    <div class="modal-content" style="padding: 20px; ">
        <div class="modal-header">
          <h5 class="modal-title" style="text-align: center;"">Enter Details to Pay </h5>
        </div>
        <div class="modal-body">

          <form  id="orderform">
              @csrf <!-- {{ csrf_field() }} -->
            <div class="form-group">
                <div class="col">
              <label for="recipient-name" class="col-form-label">Full Name:</label>
              <input type="text" class="form-control" id="names" name="names" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col">
                <label for="recipient-name" class="col-form-label">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col">
                <label for="recipient-name" class="col-form-label">Phone Number:</label>
                <input type="text" class="form-control" id="tel" name="phonenumber" required>
              </div>
            </div>


        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-primary">Procceed to Pay</button>
               </form>
        </div>
      </div>



</div>

        </div>



    </body>
    @include('footer')
    @include('pagejs')
   <script>

$('#orderform').on('submit',function(e){
    e.preventDefault();

    let order = "";
    if(localStorage.getItem('order')){
var orderid = localStorage.getItem('order');
console.log(orderid);

    } else{
 //  var id = "id" + Math.random().toString(16).slice(2);
 var uniq = 'id' + (new Date()).getTime();
       // console.log(id);
        localStorage.setItem('order', uniq);
        console.log(uniq);
        var orderid = uniq;
      //  window.location.replace("/success");
    }


    let name = $('#names').val();
    let email = $('#email').val();
    let mobile_number = $('#tel').val();


    $.ajax({
      url: "/checkout",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        names:name,
        email:email,
        phonenumber:mobile_number,
        orderid:orderid,
                },
      success:function(response){
   window.location.replace("/success");

      },
     });
    });


   </script>
</html>
