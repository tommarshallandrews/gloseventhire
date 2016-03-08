
@include('masters.header')

@include('masters.navigation')
    


 
 <!-- MAIN CONTENT
    ================================================== -->
    <form>
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
                <span>Delivery</span>
              </h3>
              <p>Please enter you postcode an click the button do calculate the delivery charge. It's free to collect you order form out Gloucester warehouse.</p>

              <div class="form-group">
                <input type="text" id="checkout-account__first-name" placeholder="Enter postcode" class="form-control">
              </div>

              <a href="#" class="btn btn-secondary btn-xs">Calculate delivery</a>
              


              <h3 class="headline">
                <span>Hire Period</span>
              </h3>
              <p>Please select you prefered hire start date</p>


              <div class="input-group date" id="datetimepicker1">
                    <input type="text" name="startDate" class="form-control" id="datepicker1" placeholder="Start date">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>

                <div class="spacer10"></div>

              <div class="input-group date" id="datetimepicker1">
                    <input type="text" name="endDate" class="form-control" id="datepicker2" placeholder="End date">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>
<div class="spacer10"></div>
              <a href="#" class="btn btn-secondary btn-xs">Submit prefered dates</a>


               <h3 class="headline">
                <span>Return</span>
              </h3>
              <p>Stock is expected tobe returned clean. Id you would like us to clean it we chargs an additional 20%</p>
              <div class="radio">
                <input type="radio" name="checkout__delivery" id="checkout-delivery__standart" checked>
                <label for="checkout-delivery__standart">Return Clean</label>
              </div>
              <div class="radio">
                <input type="radio" name="checkout__delivery" id="checkout-delivery__express">
                <label for="checkout-delivery__express">Return Dirty (additional 20%)</label>
              </div>

              <a href="#" class="btn btn-secondary btn-xs">Update return condition</a>


            </div>





            <div class="checkout__block">
              



            </div>
          </div>
          <div class="col-sm-4">
            <div class="checkout__block">
              
              <h3 class="headline">
                <span>Your details</span>
              </h3>

              <div class="form-group">
                <input type="text" id="checkout-account__first-name" placeholder="First name" class="form-control">
              </div>
              <div class="form-group">
                <input type="text" id="checkout-account__last-name" placeholder="Last name" class="form-control">
              </div>
              <div class="form-group">
                <input type="tel" id="checkout-account__phone" placeholder="Phone" class="form-control">
              </div>
              <div class="form-group">
                <input type="text" id="checkout-account__city" placeholder="City" class="form-control">
              </div>
              <div class="form-group">
                <input type="text" id="checkout-account__street-address" placeholder="Street Address" class="form-control">
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" id="checkout-account__zip" placeholder="ZIP Code" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" id="checkout-account__state" placeholder="State" class="form-control">
                  </div>
                </div>
              </div>

            </div>






              <h3 class="headline">
                <span>Your Quote</span>
              </h3>

              <p>This is indicitave and subject to confirmation</p>


              <h4 class="checkout-total__heading grey">Product Total:</h4>
              <div class="checkout-total__price grey">£{{ number_format($productcost/100, 2) }}</div>
              <div class="clearfix"></div>



              <h4 class="checkout-total__heading grey">VAT:</h4>
              <div class="checkout-total__price grey">£{{ number_format($productcost/500, 2) }}</div>
              <div class="clearfix"></div>


              <h4 class="checkout-total__heading grey">Delivery:</h4>
              <div class="checkout-total__price grey">Free (Collection)</div>
              <div class="clearfix"></div>


              <h4 class="checkout-total__heading grey">Return:</h4>
              <div class="checkout-total__price grey">Free (Clean)</div>
              <div class="clearfix"></div>


              <h4 class="checkout-total__heading black bold">Grand Total:</h4>
              <div class="checkout-total__price black bold">£{{ number_format(6*$productcost/500, 2) }}</div>
              <div class="clearfix"></div>


 <a href="#" class="btn btn-secondary checkout__submit pull-right">Save quote and contact me</a>

          </div>
        </div> <!-- / .row -->



      </div> <!-- / .container -->
    </form>
   


   @include('masters.footer')