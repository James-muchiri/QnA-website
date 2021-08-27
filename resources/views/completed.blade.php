@include('header')

    <body>
        <div class="row">

            <hr>
        </div>



        <div class="row">

            <h3 style="padding-left:30px;">My questions for order_number: {{$quizs->order_number}}</h3>
        </div>



        <div class="row">

            <hr>
        </div>


        @php
        $n = 0;
   
    $orders =  unserialize($quizs->question);
@endphp

        @foreach ($orders as $question)
        <div class="container-fluid" id="quiz">
        <div class="row" >
            <div class="col-md-2 flex-center">

                <div class="rotate">{!! $question['category'] !!}</div>
            </div>


            <div class="col-md-7" id="col">
                <h3><u>Question {!! $n =$n +1 !!}. : {!! $question['description'] !!}</u></h3>
                @php
                $question_files  =  \App\Questions_files::where('questionid', $question['questionid'])->get();
                
                    @endphp
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

                <h3><u>Answer</u></h3>
                @php
                $des = DB::table('answers')
                             ->where('questionid', $question['questionid'])->first();
                             $answer_files  =  \App\Answers_files::where('answerid', $des->answerid)->get();

                 @endphp
  <p>{!! $des->preview !!}</p>
  <div class="com-text">
    <?php echo $des->html;
    $text = base64_encode($des->html);

    ?>
    <br><br>
    <h6>download your answer</h6>
    <br>
    <a class="btn btn-danger" style="color: white;font-weight: bold;font-size: 16px;"  role="button"  onclick="sav('NAME.html', '{!! $text !!}')"><i class="fa fa-download"></i>
    Download
    </a>
</div>

@if ($answer_files->count() > 0) 
    
@foreach ($answer_files as $answer_file)
@if( $answer_file['type'] == 'image')
<p>Question Image</p>
<a class="image-link" href="{{ asset('product') }}/{{$answer_file->file}}"><img src="{{ asset('product') }}/{{$answer_file->file}}" style="height: 150px;width: 100%;"></a>
<br><br>
<h6>download your answer</h6>
<br>
<a id="btnn" style="color: rgb(0, 0, 0);font-weight: bold;font-size: 16px;"  href="{{ asset('product') }}/{{ $answer_file->file }}" download="Answer"><i class="fa fa-download"></i> Download </a>


@elseif ($answer_file['type'] == 'pdf')
<p>Question Pdf</p>
<iframe src="{{ asset('product') }}/{{$answer_file->file}}#toolbar=0" width="100%" height="250px">
</iframe>

<br><br>
<h6>download your answer</h6>
<br>
<a class="btn btn-danger" style="color: white;font-weight: bold;font-size: 16px;"   role="button" href="{{ asset('product') }}/{{ $answer_file->file }}"
download="Answer.pdf"><i class="fa fa-download"></i>
Download
</a>

@endif
@endforeach
@endif


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










</body>

@include('footer')
@include('pagejs')
</html>
<script>




function sav(filename, html) {
var html =  atob(html);

  var el = document.createElement('a');
  el.setAttribute('href', 'data:text/html;charset=utf-8,' + encodeURIComponent(html));
  el.setAttribute('download', filename);
  el.style.display = 'none';
  document.body.appendChild(el);
  el.click();
  document.body.removeChild(el);
  setTimeout(function() { URL.revokeObjectURL(a.href); }, 1500);
}
$(document).ready(function(){


removeorder('{{$quizs->order_number}}')
});


function removeorder(id){
console.log("Remove from cart");
var index = -1;
  var obj = JSON.parse(localStorage.getItem("orders")) || {}; //fetch cart from storage
  var items = obj.length; //get the products

console.log(items);
  for (var i = 0; i < obj.length; i++) { //loop over the collection
    //console.log(obj[i].order_number);
    if (obj[i].order_number = "6117cb882ecac") { //see if ids match
        obj[i].status = "paid";

      break; //exit loop
    };

  };
  localStorage.setItem("orders", JSON.stringify(obj));
  console.log(obj);
};
</script>
