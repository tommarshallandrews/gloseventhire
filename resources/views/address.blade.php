
@include('masters.header')

@include('masters.navigation')
    


 <!-- MAIN CONTENT
    ================================================== -->

      <div class="container">
        <div class="row">
          


          <div class="col-sm-5">

            <div class="checkout__block">


        <!--  if user is has not registered -->         



                      <h3 class="headline"><span>Delivery address</span></h3>


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




            {!! Form::open(array('url'=>'orders/updateAddress', 'class'=>'form-horizontal', 'id'=>'signupform', 'role'=>'form', 'method' => 'post')) !!}

            @if($order->postcode !== 'Collected')

                      <div class="form-group">
                        <input type="text" name="address1" placeholder="Address Line 1" class="form-control" value="<?php 
                        if($order->county)
                        {
                          echo($order->address1);
                        }
                        else
                        {?>{{ old('address1') }}<?php } ?>">
                      </div>


                      <div class="form-group">
                        <input type="text" name="address2" placeholder="Address Line 1" class="form-control" value="<?php 
                        if($order->address2)
                        {
                          echo($order->address2);
                        }
                        else
                        {?>{{ old('address2') }}<?php } ?>">
                      </div>


                      <div class="form-group">
                        <input type="text" name="town" placeholder="Town/City: " class="form-control" value="<?php 
                        if($order->county)
                        {
                          echo($order->town);
                        }
                        else
                        {?>{{ old('town') }}<?php } ?>">
                      </div>


                      <div class="form-group">
                        <input type="text" name="county" placeholder="County" class="form-control" value="<?php 
                        if($order->county)
                        {
                          echo($order->county);
                        }
                        else
                        {?>{{ old('county') }}<?php } ?>">
                      </div>

                      <div class="form-group">
                        <input type="text" name="postcode" placeholder="Postcode" class="form-control" value="{{ $order->postcode }}">
                        <p>Updating this postcode will change the delivety charge. Please set the correct postcode in the order page <a href"<a href="{{ url('/quote') }}/{{ $order->id }}"><span class="bold underline">here</span></a>
                      </div>


@else

<h3 class="red">This order does not include delivery and collection.</h3>You will need to collect the items form our Gloucester Warehouse in a suitable sized vehicle. Our warehouse opening times are 8am to 5.30pm
 <div class="spacer20"></div>

              <div class="left large grey">Start date:</div>
              <div class="right large "><?php if(isset($order->start_date)){echo(date('d-m-Y', strtotime($order->start_date)));} ?></div>
                <div class="clearfix"></div>
              <div class="left large grey">End Ddate:</div>
              <div class="right large "><?php if(isset($order->end_date)){echo(date('d-m-Y', strtotime($order->end_date)));} ?></div>

 <div class="spacer40"></div>
<h3>Warehouse Address:</h3>
 <div class="spacer20"></div>
Gloucester Event Hire<br>
Unit A6 &amp; A7<br>
Churcham Business Park&nbsp;<br>
Churcham<br>
Gloucester<br>
GL2 8AX<br>


<input type="hidden" name="postcode" value="Collected">


@endif



   
        <!--  if user is has not registered -->



          </div>


        </div> <!-- / .row -->





          <div class="col-sm-7">

            <div class="checkout__block">


        <!--  if user is has not registered -->         



                      <h3 class="headline"><span>Instructions and additional information</span></h3>






                      <div class="form-group">
                        <textarea class="form-control" name="instructions" placeholder="Special instructions and requests" class="form-control" value="{{ old('instructions') }}" rows="8
                        "></textarea>
                      </div>


                        <input type="hidden" name="status" value="quote">

                        <button type="submit" class="btn btn-success pull-right">Place conditional order</button>

              {!! Form::close() !!}

   
        <!--  if user is has not registered -->




        <!--  if user has registered but not validated their email address --> 
          @if(Auth::User()->email && Auth::User()->confirmed !== '1' && !Session::has('registerMessage'))
                <div class="spacer20"></div>
                <div class="alert alert-danger">It looks like you've registered but not validated your email address. <br><br> Please check you emails for the validation request or request it again <a href="{{URL::to('/users/resend')}}">here</a>.</div>
          @endif
        <!--  if user has registered but not validated their email address --> 



<!-- end checkout options only when a date is set -->






          </div>


        </div> <!-- / .row -->

























      </div> <!-- / .container -->

   </div> 


   @include('masters.footer')