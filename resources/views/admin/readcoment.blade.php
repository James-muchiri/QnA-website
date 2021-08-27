@include('admin/head')
@include('admin/sidebar')


<div id="right-panel" class="right-panel">


@include('admin/header')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">

    <div class="col-sm-12">
        @if (1==2)
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

    </div>

    <div class="col-sm-12">


        <main class="content">
            <div class="container p-0">

                <h1 class="h3 mb-3">Messages</h1>

                <div class="card">
                    <div class="row g-0">

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



                                    <div class="chat-message-left pb-4">

                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                            {{$comment->comments}}
                                             </div>
                                    </div>


                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>


</div>



                </div>
                <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
@include('admin/footer')
