<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,500i,700" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
       <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
       <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .bg-image {
  filter: blur(8px);
  -webkit-filter: blur(8px);
}
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
border: 3px solid #f1f1f1;
position: absolute;
top: 83%;
left: 30%;
transform: translate(-50%, -50%);
z-index: 2;
width: 30%;
padding: 10px;
text-align: center;

}
 .modal-header h5{
text-align: center;
color: black;
font-weight: 700;

}

.flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
        </style>
    </head>
    <body>

        <div class="container-fluid">
            <div class="row header-1">

    <div class="col-md-12 header-juu" style="color: white;">




        <strong id="strip">

            @foreach ($category as $cat)

            <a href="{{ url('/coming-soon') }}">{!! $cat['name'] !!}</a>
                                         @endforeach


</strong>



</div>



        </div>


        <div class="row search"   style="padding-bottom: 60px;" >
            <a href="#"><img src="{{asset('images/logo1.png')}}" class="logo" alt="Logo"></a>



                <div class="content">
                    <div class="title m-b-md">
                       <h2>HAVE A QUESTION?</h2>
                   <P class="p"> If you have any question you can ask below or enter what you are looking for!</P>
                    </div>


                </div>

                    <form action="#" method="post" novalidate="novalidate" style="width: 80%;">

                            <div class="col-lg-12" style="padding-left: 20%;">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-12 p-0">
                                        <select class="form-control search-slt" id="exampleFormControlSelect1">
                                            <option>Select Category</option>
                                            @foreach ($category as $cat)

                                            <option value="{!! $cat['name'] !!}">{!! $cat['name'] !!}</option>
                                                                         @endforeach

                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-4 col-sm-12 p-0">
                                        <input type="text" class="form-control search-slt" placeholder="Search any question here">
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-12 p-0">
                                        <button type="button" class="btn btn-danger wrn-btn">Search</button>
                                    </div>
                                </div>

                        </div>
                    </form>



            </div>




<div class="row" id="quiz">
    <div class="col-md-2 flex-center">

        <div class="rotate">{!! $questions->category !!}</div>
    </div>


            <div class="col-md-8" id="col">
<h3><u>Question: {!! $questions['description'] !!}</u></h3>
<img style="height: 150px;" src="{{ asset('product') }}/{{$questions->file}}" alt="">
<h6 style=" float: right;top: -20px;">260 views</h6>
<h3><u>Answer preview</u></h3>
<p>I am a novice when it comes to Bootstrap and css in general. I would like a site with a fixed sidebar,
    fixed top nav and main content that scrolls.
     The navbar is fixed and works ok. The layout of the ...</p>
     <img class="bg-image" style="height: 150px;" src="{{ asset('product') }}/{{$questions->file}}" alt="">


     <div class="bg-text">
           <p>Pay to view Answer</p>
      </div>



    </div>

</div>
<div class="row" id="quiz" style="padding-left : 40px;padding-right : 40px;">


    <div class="modal-content" style="padding: 20px; ">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Enter Details to Pay </h5>


            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="/checkout" method="post">
              @csrf <!-- {{ csrf_field() }} -->
            <div class="form-group">
                <di class="col">
              <label for="recipient-name" class="col-form-label">Full Name:</label>
              <input type="text" class="form-control" id="recipient-name" name="names" required>
            </di>
            <di class="col">
                <label for="recipient-name" class="col-form-label">Email Address:</label>
                <input type="email" class="form-control" id="recipient-name" name="email" required>
              </di>
            </div>


        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-primary">Procceed to Pay</button>
          <button type="submit" class="btn btn-primary">Save Question</button>
      </form>
        </div>
      </div>



</div>

        </div>



    </body>
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
                <li><a href="http://scanfcode.com/about/">About Us</a></li>
                <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
                <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Search</a></li>

              </ul>
            </div>
          </div>
          <hr>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
              <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by
           <a href="#">Engineer Mwas</a>.
              </p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
              <ul class="social-icons">
                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
  </footer>
</html>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'demo_sandbox_client_id',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
  return actions.payment.create({
    transactions: [{
      amount: {
        total: '30.11',
        currency: 'USD',
        details: {
          subtotal: '30.00',
          tax: '0.07',
          shipping: '0.03',
          handling_fee: '1.00',
          shipping_discount: '-1.00',
          insurance: '0.01'
        }
      },
      description: 'The payment transaction description.',
      custom: '90048630024435',
      //invoice_number: '12345', Insert a unique invoice number
      payment_options: {
        allowed_payment_method: 'INSTANT_FUNDING_SOURCE'
      },
      soft_descriptor: 'ECHI5786786',
      item_list: {
        items: [
        {
          name: 'hat',
          description: 'Brown hat.',
          quantity: '5',
          price: '3',
          tax: '0.01',
          sku: '1',
          currency: 'USD'
        },
        {
          name: 'handbag',
          description: 'Black handbag.',
          quantity: '1',
          price: '15',
          tax: '0.02',
          sku: 'product34',
          currency: 'USD'
        }],
        shipping_address: {
          recipient_name: 'Brian Robinson',
          line1: '4th Floor',
          line2: 'Unit #34',
          city: 'San Jose',
          country_code: 'US',
          postal_code: '95131',
          phone: '011862212345678',
          state: 'CA'
        }
      }
    }],
    note_to_payer: 'Contact us for any questions on your order.'
  });
},

    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');
      });
    }
  }, '#paypal-button');

</script>
