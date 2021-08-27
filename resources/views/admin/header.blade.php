    <header id="header" class="header">

        <div class="header-menu">
<div class="row">
            <div class="col-sm-7">

                <div class="header-left">




                    <div class="dropdown for-message">
                        <button class="btn btn-secondary dropdown-toggle" type="button"
                            id="message"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="count bg-primary">{{$commentscount}}</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have {{$commentscount}} Mails</p>
                            @foreach ($comments as $comment)
                            <form id="{!! $comment['id'] !!}" action="/readcomment" method="POST">
                                @csrf
                                <input type="text" name="id" value="{!! $comment['id'] !!}" id="id" hidden/>
                            </form>

                            <a class="dropdown-item media bg-flat-color-1" href="#" onclick="myFunction({!! $comment['id'] !!})">

                            <span class="message media-body" style="text-overflow: ellipsis;
                            overflow: hidden;">
                                <span class="name float-left">{!! $comment['fname'] !!}</span>
                                <hr>
                                <span class="time float-right">{!! $comment['created_at'] !!}</span>
                                    <p>{!! $comment['comments'] !!}</p>
                            </span>
                        </a>
                        @endforeach
                        <script>
                            function myFunction(id) {
                                var dataId = id;
                                document.getElementById(dataId ).submit();
                            }
                        </script>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="{{ asset('images/admin.jpg') }}" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">
                                     <a class="nav-link" href="admin-profile.php" data-toggle="modal" data-target="#profileModal" data-whatever="@getbootstrap"><i class="fa fa-user" ></i> My Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="nav-link" href="change-password.php" data-toggle="modal" data-target="#changeModal" data-whatever="@getbootstrap"><i class="fa fa-cog"></i> Change Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="nav-link"  href="/user_signOut"><i class="fa fa-power-off"></i>Logout</a>
                </div>
                </div>



            </div>
        </div>
    </div>
    </header><!-- /header -->
    <!-- Header-->

    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Admin profile details</h5>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
      <div class="container">

        <div class="row" id="adminp">
            <div class="col-sm-6">
                <p>First Name</p>
              <a>{{auth()->guard('adminauth')->user()->name}}</a><br>

          </div>
          <div class="col-sm-6">

            <p>Email</p>
            {{auth()->guard('adminauth')->user()->email}} <br>
        </div>
        </div>
      </div>




            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
          </div>
        </div>
      </div>



      <div class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Admin change Password</h5>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <div class="alert alert-message alert-dismissible fade show" id="success"></div>
                <form id="ajaxform">
                    @csrf <!-- {{ csrf_field() }} -->
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Enter old password:</label>
                    <input type="text" class="form-control" id="oldpassword" required>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Enter New Password:</label>
                    <input type="text" class="form-control" id="newpassword" required>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Repeat New Password:</label>
                    <input type="text" class="form-control" id="repeatpassword" required>
                    <div class="alert-message" id="nameError"></div>
                  </div>




              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="formSubmit">Save Category</button>
            </form>
            </div>
          </div>
        </div>
      </div>

     

      <script>
        $(document).ready(function(){
            $('#formSubmit').click(function(e){
                e.preventDefault();


                $.ajax({
                    url: "{{ url('/admin/change_password') }}",
                    method: 'post',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        oldpassword: $('#oldpassword').val(),
                        newpassword: $('#newpassword').val(),
                        newpassword_confirmation: $('#repeatpassword').val(),
                    },
                    success: function(data){
                        $('#success').show();
                        $('#success').text(data.success);
                        $("#ajaxform")[0].reset();

                        setTimeout(function() {


                        $('#success').hide();

                        }, 3000);
                    },
                    error: function(response) {
                        $('#nameError').show();
      $('#nameError').text(response.responseJSON.errors.newpassword);

   }
                });
            });
        });


</script>











