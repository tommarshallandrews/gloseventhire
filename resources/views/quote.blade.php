
@include('masters.header')

@include('masters.navigation')
    


    <!-- TOPIC HEADER
    ================================================== -->
    <div class="topic">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <h3>Shop: Category</h3>
          </div>
          <div class="col-sm-8">
            <ol class="breadcrumb pull-right hidden-xs">
              <li><a href="index.html">Home</a></li>
              <li><a href="index_shop.html">Shop</a></li>
              <li class="active">Category</li>
            </ol>
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </div> <!-- / .topic -->


 
 <!-- MAIN CONTENT
    ================================================== -->
    <form>
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="checkout__block">

              <h3 class="headline">
                <span>Cart</span>
              </h3>



@foreach($order->product as $product)

              <div class="checkout-cart__item">
                <div class="checkout-cart-item__img">
                  <img src="assets/img/shop-item_1.jpg" class="img-responsive" alt="...">
                </div>
                <div class="checkout-cart-item__content">
                  <h5 class="checkout-cart-item__heading">
                    {{ $product->name }}
                  </h5>
                  <div class="checkout-cart-item__footer">
                    <div class="input_qty input_qty_sm pull-right">
                      <input type="text">{{ $product->pivot->quantity * $product->price}}p
                    </div>
                    <div class="checkout-cart-item__price pull-left">{{ $product->price }}p x {{ $product->pivot->quantity }}</div>
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
                <span>Shipping</span>
              </h3>

              <div class="form-group">
                <select name="checkout-shipping__country" id="checkout-shipping__country" class="form-control">
                  <option value="Australia" selected>Australia</option>
                  <option value="Belgium">Belgium</option>
                  <option value="Canada">Canada</option>
                  <option value="Denmark">Denmark</option>
                  <option value="France">France</option>
                  <option value="Gemany">Gemany</option>
                </select>
              </div>
              <div class="radio">
                <input type="radio" name="checkout__delivery" id="checkout-delivery__standart" checked>
                <label for="checkout-delivery__standart">Standart 10-15 days $10</label>
              </div>
              <div class="radio">
                <input type="radio" name="checkout__delivery" id="checkout-delivery__express">
                <label for="checkout-delivery__express">Express 2-5 days $30</label>
              </div>

            </div>
            <div class="checkout__block">
              
              <h3 class="headline">
                <span>Payment</span>
              </h3>

              <div class="radio">
                <input type="radio" name="checkout__payment" id="checkout-payment__credit-card" checked>
                <label for="checkout-payment__credit-card">Credit card</label>
              </div>
              <div class="radio">
                <input type="radio" name="checkout__payment" id="checkout-payment__paypal">
                <label for="checkout-payment__paypal">Paypal</label>
              </div>

            </div>
          </div>
          <div class="col-sm-4">
            <div class="checkout__block">
              
              <h3 class="headline">
                <span>Account</span>
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
          </div>
        </div> <!-- / .row -->
        <div class="checkout-total__block">
          <div class="row">
            <div class="col-sm-4">
              
              <h4 class="checkout-total__heading">Product Total:</h4>
              <div class="checkout-total__price">$197</div>
              <div class="clearfix"></div>

            </div>
            <div class="col-sm-4">
              
              <h4 class="checkout-total__heading">Total Tax:</h4>
              <div class="checkout-total__price">$20</div>
              <div class="clearfix"></div>

            </div>
            <div class="col-sm-4">
              
              <h4 class="checkout-total__heading">Grand Total:</h4>
              <div class="checkout-total__price">$217</div>
              <div class="clearfix"></div>

            </div>
          </div>  <!-- / .row -->
        </div> <!-- / .checkout-total__block -->
        <div class="row">
          <div class="col-sm-12 text-center">
            <a href="#" class="btn btn-secondary checkout__submit">Proceed to checkout</a>
          </div>
        </div>
      </div> <!-- / .container -->
    </form>
   


   @include('masters.footer')