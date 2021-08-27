@include('header')
    <body>
<div class="row" id="checkout">
    <div class="col-sm-12">
        @if(Session::has('error'))
        <div class="alert  alert-error alert-dismissible" role="alert">
            <span class="badge badge-pill badge-error">Error</span> {{ Session::get('error') }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @php
            session()->forget('error');
        @endphp


        @endif

    </div>
    <div class="col-sm-12">
        @if(Session::has('success'))
        <div class="alert  alert-error alert-dismissible" role="alert">
            <span class="badge badge-pill badge-error">Error</span> {{ Session::get('success') }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @php
            session()->forget('success');
        @endphp


        @endif

    </div>
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirm Payment</h5>



        </div>
        <div class="modal-body">
            <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-12 p-0">
                <label for="recipient-name" class="col-form-label">Email Address:</label><br>
                {{$order->email}}<br>
                <label for="recipient-name" class="col-form-label">Full Names:</label><br>
                {{$order->name}}<br>
                <label for="recipient-name" class="col-form-label">Starus:</label><br>
                {{$order->status}}<br>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-12 p-0">
                <label for="recipient-name" class="col-form-label">Question:</label> <br>
                 {{$order->questions}}<br>
                <label for="recipient-name" class="col-form-label">Total Amonut:</label><br>
                {{$order->total}}<br>
                <label for="recipient-name" class="col-form-label">Order Number:</label><br>
                {{$order->order_number}}
            </div>
        </div>
        </div>
        <div class="modal-footer">
         
         <!--   <a href="/" style="color: #ffffff;;" id="btn" class="btn btn-primary">Pay Later</a>-->

          <form method="post" action="paypal">
            @csrf <!-- {{ csrf_field() }} -->
           <input type="text" value="{{$order->order_number}}" name="order" hidden>
         
              <button class="paypal-button" type="submit">
                <span class="paypal-button-title">
                  Buy now with
                </span>
                <span class="paypal-logo">
                  <i>Pay</i><i>Pal</i>
                </span>
              </button>
          </form>
      </form>
        </div>
      </div>



</div>

        </div>

        

    </body>


    @include('footer')
    @include('pagejs')
 
</html>

