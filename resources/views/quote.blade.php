
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
                  <?php 
                    if($product->image1)
                    {
                   ?>     
                  <img src="http://madigital.co.uk/images/{{$product->image1}}" class="img-responsive" alt="...">
                  <?php
                    }
                    else
                    {
                  ?>
                    <span class="colorbox-quote" data-toggle="tooltip" data-placement="top" title="" style="background:{{$product->pivot->colour}}"></span>
                  <?php
                    } 
                  ?>
                
                </div>
                <div class="checkout-cart-item__content">
                  <h5 class="checkout-cart-item__heading">
                    <?php 
                    if($product->group->collection)
                      {
                        echo($product->group->name . " - " . $product->group->collection);
                      }
                    else
                    {
                      echo($product->name . " - " . $product->range->name);
                    } 
                    ?>
               
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
              <p>Please select you prefered hire dates</p>




              {!! Form::open(array('url' => 'orders/updateDates', 'method' => 'post')) !!}

                    
        <span class="small">Start date</span>
        <div class="input-group date">
            <input type="text" name="start_date" class="form-control" value="<?php if(isset($order->start_date)){echo(date('d-m-Y', strtotime($order->start_date)));} ?>">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>

      <div class="spacer10"></div>
        <span class="small">End date</span>
        <div class="input-group date">
            <input type="text" name="end_date" class="form-control" value="<?php if(isset($order->start_date)){echo(date('d-m-Y', strtotime($order->end_date)));} ?>"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>

         @if (Session::has('datesMessage'))
            <div class="spacer10"></div>
            <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('datesMessage') }}</div>
        @endif

<div class="spacer10"></div>
        
              <button type="submit" class="btn btn-secondary btn-xs">Submit prefered dates</button>
              {!! Form::close() !!}

               <h3 class="headline">
                <span>Return</span>
              </h3>
              <p>Stock is expected to be returned clean. Id you would like us to clean it we chargs an additional 20%</p>
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
              <div class="left large grey">Delivery ({{ number_format($order->distance/1609 , 2) }} miles):</div>
              <div class="right large grey">£{{ number_format($order->distance * Config::get('app.poundsPerMile')/1609, 2) }}</div>
              @endif
              <div class="clearfix"></div>

               <div class="left large grey">VAT:</div>
              <div class="right large grey">£{{ number_format($totalvat/100, 2) }}</div>
              <div class="clearfix"></div>

              <div class="spacer10"></div>

              <div class="left large black bold ">Grand Total:</div>
              <div class="right large black bold">£{{ number_format($totaltotal/100, 2) }}</div>
              <div class="clearfix"></div>


<!-- checkout options only when a date is set -->
@if($order->end_date && $order->end_date)



         @if (Session::has('registerMessage'))
              <div class="spacer10"></div>
              <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('registerMessage') }}</div>
        @endif



        <!-- if user is logged in and confirmed -->
        @if(Auth::User()->confirmed == '1')
        <div class="spacer20"></div>
            {!! Form::open(array('url'=>'orders/getQuote', 'class'=>'form-horizontal', 'id'=>'signupform', 'role'=>'form')) !!}

                <button type="submit" name="submitType" value="contact" class="btn btn-success block">Save this quote and contact me at <br><strong>{{Auth::User()->email}}</strong></button>
                <div class="spacer10"></div>
                <a href="#" class="btn btn-info block">Order this stock and add addresses *</a>
                 <p>* Subject to availability and possible deposit<p>
           
            {!! Form::close() !!}

        @endif
        <!-- end if user is logged in and confirmed -->







        <!--  if user is has not registered -->         
        @if(!Auth::User()->email && Auth::Check())


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



                      @if (Session::has('registerMessage'))
                          <div class="spacer10"></div>
                          <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('registerMessage') }}</div>
                      @endif


            {!! Form::open(array('url'=>'users/store', 'class'=>'form-horizontal', 'id'=>'signupform', 'role'=>'form')) !!}


                      <div class="form-group">
                        <input type="text" name="firstname" placeholder="First name" class="form-control" value="{{ old('firstname') }}">
                      </div>

                      <div class="form-group">
                        <input type="text" name="lastname" placeholder="Last name" class="form-control" value="{{ old('lastname') }}">
                      </div>

                      <div class="form-group">
                        <input type="text" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
                      </div>

                      <div class="form-group">
                        <input type="text" name="phone" placeholder="Phone" class="form-control" value="{{ old('phone') }}">
                      </div>

                      <div class="form-group">
                        <input type="password" name="password" placeholder="Password  (minimum 6 characters)" class="form-control">
                      </div>

                      <div class="form-group">
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control">
                      </div>


                        <input type="hidden" name="status" value="quote">

                        <button type="submit" class="btn btn-secondary btn-xs">Add my details and send me a validation email</button>

              {!! Form::close() !!}

        @endif 
        <!--  if user is has not registered -->




        <!--  if user has registered but not validated their email address --> 
          @if(Auth::User()->email && Auth::User()->confirmed !== '1' && !Session::has('registerMessage'))
                <div class="spacer20"></div>
                <div class="alert alert-danger">It looks like you've registered but not validated your email address. <br><br> Please check you emails for the validation request or request it again <a href="{{URL::to('/users/resend')}}">here</a>.</div>
          @endif
        <!--  if user has registered but not validated their email address --> 


@endif
<!-- end checkout options only when a date is set -->






          </div>


        </div> <!-- / .row -->



      </div> <!-- / .container -->

   


   @include('masters.footer')