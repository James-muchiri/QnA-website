


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
            <li><a href="/">About Us</a></li>
            <li><a href="/">Search</a></li>
            <li><a href="/admin">Admin</a></li>
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by
       <a href="#">QnA</a>.
          </p>
        </div>


      </div>
    </div>
</footer>
<script>
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
        document.getElementById('contactForm').reset();
      },
     });
    });
</script>