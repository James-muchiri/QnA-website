@include('admin/head')
@include('admin/sidebar')

<style>
    #question{

    color: #FFF;

    z-index: 99;
    box-shadow: 2px 2px 3px #999;
    padding: 30px;
    margin-bottom: 20px;
}
.answer{

       color: #FFF;

       z-index: 99;
       box-shadow: 2px 2px 3px #999;
       padding: 30px;
   }
   .linkk {

       color: #FFF;

       z-index: 99;
       box-shadow: 2px 2px 3px #999;
       padding-top: 60px;
       padding-bottom: 60px;

   }
.quiz-header{
       border-bottom: 1px solid rgb(14, 14, 17);
       font-weight: 700;

   }
   .linkk > .btn{
       width: 150px;
       background-color: rgb(221, 216, 216);
       margin-top: 15px;

   }
   .btn:hover{
       background-color: blue;
   }
   .answer > h3{
       color: black;
   }
   .answer{
       margin-top: 10px;
       padding: 10px;
   }
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
                    <li class="active">Dashboard | Questions</li>
                </ol>
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
        <a style="margin: 19px;" type="button" class="btn btn-primary"  href="/addquestions">New Question</a>

        <a style="margin: 19px;" type="button" class="btn btn-primary"  href="/categories">New Categories</a>

    </div>


  @php
    $n = 0;
    @endphp
    @if($questions->count() > 0)
    @foreach ($questions as $question)
    <div class="col-sm-12" id="question">
      <div class="col-sm-9">
  <p class="quiz-header">{!! $n =$n +1 !!}. {!! $question['description'] !!}</p>

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
  <div class="answer">

      <h3><u>Answer preview</u></h3>
                  @php
                  $des = DB::table('answers')
                               ->where('questionid', $question['questionid'])->first();
                               $answer_files  =  \App\Answers_files::where('answerid', $des->answerid)->get();
  
                   @endphp

                  <p>{!! $des->preview !!}</p>
                  <div class="com-text">
                    <?php echo $des->html;?>
                </div>
       
                @if ($answer_files->count() > 0) 
                    
                @foreach ($answer_files as $answer_file)
            @if( $answer_file['type'] == 'image')
            <p>Question Image</p>
                <a class="image-link" href="{{ asset('product') }}/{{$answer_file->file}}"><img src="{{ asset('product') }}/{{$answer_file->file}}" style="height: 150px;width: 100%;"></a>
            
            
            @elseif ($answer_file['type'] == 'pdf')
            <p>Question Pdf</p>
                <iframe src="{{ asset('product') }}/{{$answer_file->file}}#toolbar=0" width="100%" height="250px">
                </iframe>
            
            
            
            @endif
            @endforeach
            @endif
  </div>
      </div>

      <div class="col-sm-3 linkk">

          <a href="/delete_product/{!! $question['id'] !!}" class="btn"><i class="fa fa-trash-o"></i> Delete</a><br>
          <form id="my_form" action="/edit_product" method="POST">
            @csrf
              <input name="id" value="{!! $question['id'] !!}" hidden>
          </form>
        
          <a type="button"  href="javascript:{}" onclick="document.getElementById('my_form').submit();"  class="btn " ><i class="fa fa-pencil"></i> Edit</a><br>
        @if ( $question['is_hidden'] == 'yes')
        <a href="/show_product/{!! $question['id'] !!}" class="btn"><i class="fa fa-check"> </i> Show</a><br>
        @else
        <a href="/hide_product/{!! $question['id'] !!}" class="btn"><i class="fa fa-remove"> </i> Hide</a><br>
        @endif

  </div>
    </div>
    @endforeach

    @else
    <div class="col-sm-12" id="question">
        <div class="col-sm-9">
<h3 style="color: black;">No Questions</h3>
        </div>
    </div>

    @endif






</div>



                </div>

                <script>

                    function yesnoCheck(that) {
                        if (that.value == "image") {

                            document.getElementById("ifYes").style.display = "block";
                            document.getElementById("ifpdf").style.display = "none";
                            document.getElementById("iftext").style.display = "none";
                        }
                         else if(that.value == "pdf")
                        {
                            document.getElementById("ifYes").style.display = "none";
                            document.getElementById("ifpdf").style.display = "block";
                            document.getElementById("iftext").style.display = "none";
                        }
                        else if(that.value == "text")
                        {
                            document.getElementById("ifYes").style.display = "none";
                            document.getElementById("iftext").style.display = "block";
                            document.getElementById("ifpdf").style.display = "none";
                        }
                        else{
                            document.getElementById("ifYes").style.display = "none";
                            document.getElementById("ifpdf").style.display = "none";
                            document.getElementById("iftext").style.display = "none";
                        }
                    }
                    </script>
@include('admin/footer')
