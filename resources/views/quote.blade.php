
@include('masters.header')

@include('masters.navigation')
    
<script src="{{URL::to('/')}}/js/quoteValidation.js"></script>

 <!-- MAIN CONTENT
    ================================================== -->

      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="checkout__block">

              <h3 class="headline">
                <span>Your requirements</span>
              </h3>



@foreach($order->product as $product)

              <div class="checkout-cart__item">
                <div class="checkout-cart-item__img">
                  <img src="http://madigital.co.uk/images/{{$product->image1}}" class="img-responsive" alt="...">
                </div>
                <div class="checkout-cart-item__content">
                  <h5 class="checkout-cart-item__heading">
                    {{ $product->name }} - {{ $product->range->name }}
                  </h5>
                  <div class="checkout-cart-item__footer">
                    <div class="input_qty input_qty_sm pull-right bold">
                      £{{ number_format($product->pivot->quantity * $product->price / 100, 2)}}
                    </div>
                    <div class="checkout-cart-item__price pull-left">
                      {!! Form::open(array('url' => 'orders/edit', 'method' => 'post', 'class' => 'form-inline')) !!}
                      £{{ number_format($product->price / 100, 2) }} x <input type="text" class="quantity_form" name="quantity" id="quantity" value="{{ $product->pivot->quantity }}">
                      <input type="hidden" name="action_id" value="update">
                      <button type="submit" class="btn btn-default btn-xs">update</button>
                      <input type="hidden" name="product_id" value="{{$product->id}}">

                    </form>

                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div> <!-- / .checkout-cart__item -->


@endforeach





            </div>
          </div>


          <div class="col-sm-4">
            <div class="checkout__block">
              
              <h3 class="headline">
                
                <span>Delivery Postcode</span>
              </h3>

              <p>Please enter you postcode an click the button do calculate the delivery charge. It's free to collect you order form out Gloucester warehouse.</p>
              {!! Form::open(array('url' => 'orders/updateDelivery', 'method' => 'post')) !!}
              <div class="form-group">
                <input type="text" id="checkout-account__first-name" name="postcode" value="{{ $order->postcode }}" placeholder="Enter postcode" class="form-control">
              </div>

              @if (Session::has('postcodeMessage'))
                <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('postcodeMessage') }}</div>
              @endif

              <button type="submit" class="btn btn-secondary btn-xs">Calculate delivery</button>
              {!! Form::close() !!}
<div class="spacer5"></div>
              {!! Form::open(array('url' => 'orders/updateDelivery', 'method' => 'post')) !!}
<input type="hidden" name="postcode" value="Collected" >

              <button type="submit" class="btn btn-default btn-xs">Collect and return from Gloucester</button>
              {!! Form::close() !!}
              


              <h3 class="headline">
                <span>Hire Period</span>
              </h3>
              <p>Please select you prefered hire start date</p>




              {!! Form::open(array('url' => 'orders/updateDates', 'method' => 'post')) !!}

                    
                      <div class="input-group date">
            <input type="text" name="end_date" class="form-control"><span class="input-group-addon"><i class="fa fa-calendar"></i></i></span>
        </div>


                <div class="spacer10"></div>

   
                    
                      <div class="input-group date">
            <input type="text" name="end_date" class="form-control"><span class="input-group-addon"><i class="fa fa-calendar"></i></i></span>

                </div>
<div class="spacer10"></div>
        
              <button type="submit" class="btn btn-secondary btn-xs">Submit prefered dates</button>
              {!! Form::close() !!}

               <h3 class="headline">
                <span>Return</span>
              </h3>
              <p>Stock is expected tobe returned clean. Id you would like us to clean it we chargs an additional 20%</p>
              {!! Form::open(array('url' => 'orders/updateReturn', 'method' => 'post')) !!}
              <div class="radio">
                <input type="radio" name="return" value="clean" id="checkout-delivery__standart" <?php if($order->return == 'clean'){echo('checked');} ?>>
                <label for="checkout-delivery__standart">Return Clean</label>
              </div>
              <div class="radio">
                <input type="radio" name="return" value="dirty" id="checkout-delivery__express" <?php if($order->return == 'dirty'){echo('checked');} ?>>
                <label for="checkout-delivery__express">Return Dirty (additional 20%)</label>
              </div>
              <button type="submit" class="btn btn-secondary btn-xs">Update return condition</button>
              {!! Form::close() !!}

            </div>
          </div>
          




          <div class="col-sm-4">

            <div class="checkout__block">


              <h3 class="headline">
                <span>Your Quote</span>
              </h3>

              <p>This is indicitave and subject to confirmation</p>


              <div class="left large grey">Product Total:</div>
              <div class="right large grey">£{{ number_format($totalproduct/100, 2) }}</div>
              <div class="clearfix"></div>


              @if($order->return == 'clean')
              <div class="left large grey">Return - Clean:</div>
              <div class="right large grey">Free</div>
              @else
              <div class="left large grey">Return - Dirty:</div>
              <div class="right large grey">£{{ number_format($totaldirty/100, 2) }}</div>
              @endif
              <div class="clearfix"></div>

               @if($order->distance == 0)
              <div class="left large grey">Delivery - none:</div>
              <div class="right large grey">Free</div>
              @else
              <div class="left large grey">Delivery {{ number_format($order->distance/1000, 2) }}km:</div>
              <div class="right large grey">£{{ number_format($order->distance/1000, 2) }}</div>
              @endif
              <div class="clearfix"></div>

               <div class="left large grey">VAT:</div>
              <div class="right large grey">£{{ number_format($totalvat/100, 2) }}</div>
              <div class="clearfix"></div>

              <div class="spacer10"></div>

              <div class="left large black bold ">Grand Total:</div>
              <div class="right large black bold">£{{ number_format($totaltotal/100, 2) }}</div>
              <div class="clearfix"></div>





{!! Form::open(array('url'=>'users/store', 'class'=>'form-horizontal', 'id'=>'signupform', 'role'=>'form')) !!}

              <h3 class="headline">
                <span>Your details</span>
              </h3>

                               @if(Session::has('errors'))
                                <div id="signupalert" style="display" class="alert alert-danger">
                                  <strong>You have some errors on the registration form.</strong>
                                      <ul>
                                          @foreach($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                </div>
                                @endif  


              @if (Session::has('exists'))
                <div class="alert alert-danger">Seems that emails already registered. Please <a href="{{URL::to('/users/login')}}">login</a> to attach this order to your account of ue another email</div>
              @endif


@if(Auth::User()->confirmed == '1')

<button type="submit" href="#" name="submitType" value="contact" class="btn btn-success block">Save quote and contact me at <br><strong>{{Auth::User()->email}}</strong></button>
<div class="spacer10"></div>
 <a href="#" class="btn btn-info block">Order this stock and add addresses *</a>
  <div class="spacer10"></div>
 <p>* Subject to availability and possible deposit<p>


@elseif(!Auth::User()->email)

              <div class="form-group">
                <input type="text" name="firstname" placeholder="First name" class="form-control">
              </div>

              <div class="form-group">
                <input type="text" name="lastname" placeholder="Last name" class="form-control">
              </div>

              <div class="form-group">
                <input type="text" name="email" placeholder="Email" class="form-control">
              </div>

              <div class="form-group">
                <input type="text" name="phone" placeholder="Phone" class="form-control">
              </div>

              <div class="form-group">
                <input type="password" name="password" placeholder="Password  (minimum 6 characters)" class="form-control">
              </div>

              <div class="form-group">
                <input type="password" name="password_confirm" placeholder="Confirm Password" class="form-control">
              </div>



 <button type="submit" href="#" name="submitType" value="contact" class="btn btn-success block">Save quote and contact me</button>
<div class="spacer10"></div>
 <a href="#" class="btn btn-info block">Order this stock and add addresses *</a>
 <div class="spacer10"></div>
 <p>* Subject to availability and possible deposit<p>


@else

<div class="alert alert-danger">It looks like you've registered but not validated your email address. <br><br> Please check you emails for the validation request or 


  request it again <a href="{{URL::to('/users/resend')}}">here</a>.</div>

@endif


{!! Form::close() !!}

          </div>


        </div> <!-- / .row -->



      </div> <!-- / .container -->

   
 <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script>
    $('.input-group.date').datepicker({
    format: "dd/mm/yyyy",
    startDate: "01-01-2006",
    endDate: "01-01-2016",
    todayBtn: "linked",
    autoclose: true,
    todayHighlight: true
    });
    </script>

   @include('masters.footer')