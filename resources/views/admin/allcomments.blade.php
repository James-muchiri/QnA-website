<!doctype html>


<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">



    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css') }}">


    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/selectFX/css/cs-skin-elastic.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}">



    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">




    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>



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
                    <li class="active">Dashboard | Messages</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">

    <div class="col-sm-12">



        <main class="content">
            <div class="container p-0">



                <h1 class="h3 mb-3">{{$comments->count()}} Unread Messages  </h1>
                <hr>


                <div class="card">
                    <div class="row g-0">
@if ($comments->count() > 0)



@foreach ($comments as  $comment)

                        <div class="col-12 col-lg-12 col-xl-12">
                            <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                <div class="d-flex align-items-center py-1">
                                    <div class="position-relative">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                    </div>
                                    <div class="flex-grow-1 pl-3">
                                        <strong> {{$comment->fname}}</strong>
                                        <div class="text-muted small"><em> {{$comment->email}}</em></div>
                                    </div>

                                </div>
                            </div>

                            <div class="position-relative">
                                <div class="chat-messages p-4">

                                    {{$comment->tel}}

                                    <div class="chat-message-left pb-4">

                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                            {{$comment->comments}}
                                             </div>
                                    </div>


                                    <div  style="text-align: right;">
                                        <a onclick="read({!! $comment['id'] !!})" class="btn btn-primary"> Mark as Read</a>

                                    </div>

                                </div>
                            </div>



                        </div>
                        @endforeach


                        @else


                        @endif
                    </div>
                </div>

                <hr>
                              <h1 class="h3 mb-3">{{$readcomments->count()}} Read Messages</h1>



                <div class="card">
                    <div class="row g-0">
                        @if ($readcomments->count() > 0)


@foreach ($readcomments as  $comment)

                        <div class="col-12 col-lg-12 col-xl-12">
                            <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                <div class="d-flex align-items-center py-1">
                                    <div class="position-relative">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                    </div>
                                    <div class="flex-grow-1 pl-3">
                                        <strong> {{$comment->fname}}</strong>
                                        <div class="text-muted small"><em> {{$comment->email}}</em></div>
                                    </div>

                                </div>
                            </div>

                            <div class="position-relative">
                                <div class="chat-messages p-4">

                                    {{$comment->tel}}

                                    <div class="chat-message-left pb-4">

                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                            {{$comment->comments}}
                                             </div>
                                    </div>

                                </div>
                            </div>



                        </div>
                        @endforeach
                        @else



                        @endif
                    </div>
                </div>

            </div>
        </main>

    </div>














</div>



                </div>
<script>

function read(id){
    console.log("Mark as read");

    var dataId = id;
    // console.log(dataId);


    $.ajax({
    type: 'get',
    data:  dataId,
    url: '/read/'+dataId,
    dataType: 'json',
    success:
        function(response){
             console.log(response);
             location.reload();


        }
    });
};
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@include('admin/footer')
