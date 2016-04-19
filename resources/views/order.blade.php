
@include('masters.header')

@include('masters.navigation')
    


 <!-- MAIN CONTENT
    ================================================== -->

      <div class="container">



    <div class="row">
      <div class="col-sm-12">


    @if (Session::has('message'))
          <div class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          </div>
    @endif


      </div>
    </div> 







        <div class="row">
          <div class="col-sm-4">
            <div class="checkout__block">

              <h3 class="headline">
                <span>Order #{{$order->id}}</span>
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
                    <span class="colorbox-quote" data-toggle="tooltip" data-placement="top" title="" style="background:{{$product->pivot->hex}}"></span>
                  <?php
                    } 
                  ?>
                
                </div>
                <div class="checkout-cart-item__content">
                  <h5 class="checkout-cart-item__heading">
                    <?php 
                    if($product->cat_id == 60)
                    {
                        echo($product->group->name . " - " . $product->pivot->colour .' - '. $product->group->collection );
                    }
                    else
                    {
                      //echo($product->group_id);
                      echo($product->name . " - " . $product->range->name);
                    } 
                    ?>
               
                  </h5>
                  <div class="checkout-cart-item__footer">
                    <div class="input_qty input_qty_sm pull-right bold">
                      £{{ number_format($product->pivot->quantity * $product->price / 100, 2)}}
                    </div>
                    <div class="checkout-cart-item__price pull-left">

                      £{{ number_format($product->price / 100, 2) }} x {{ $product->pivot->quantity }}


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
              
              <h3 class="headline"><span>Delivery Postcode</span></h3>

              @if($order->address1)
              <div class="left large grey">Address 1:</div>
              <div class="right large grey">{{ $order->address1 }}</div>
              @endif
<div class="clearfix"></div>
              @if($order->address2)
              <div class="left large grey">Address 2:</div>
              <div class="right large grey">{{ $order->address2 }}</div>
              @endif
<div class="clearfix"></div>
              @if($order->town)
              <div class="left large grey">Town / City:</div>
              <div class="right large grey">{{ $order->town }}</div>
              @endif
<div class="clearfix"></div>
              @if($order->county)
              <div class="left large grey">County:</div>
              <div class="right large grey">{{ $order->county }}</div>
              @endif
<div class="clearfix"></div>
              <div class="left large grey">Postcode:</div>
              <div class="right large grey">{{ $order->postcode }}</div>

              
            <div class="spacer40"></div>



              <h3 class="headline"><span>Hire Period</span></h3>

              <div class="left large grey">Start date:</div>
              <div class="right large grey"><?php if(isset($order->start_date)){echo(date('d-m-Y', strtotime($order->start_date)));} ?></div>
                <div class="clearfix"></div>
              <div class="left large grey">End Ddate:</div>
              <div class="right large grey"><?php if(isset($order->end_date)){echo(date('d-m-Y', strtotime($order->end_date)));} ?></div>

              <div class="spacer40"></div>

              <h3 class="headline"><span>Terms</span></h3>

              <div class="left large grey">To be returned:</div>
              <div class="right large grey"> {{$order->return}}</div>


              <div class="spacer40"></div>

               <h3 class="headline"><span>Instructions</span></h3>

              @if($order->address1)
              <div class="left large grey">{{ $order->instructions }}</div>
              @endif



       

            </div>
          </div>
          




          <div class="col-sm-4">

            <div class="checkout__block">


              <h3 class="headline">
                <span>Your Order</span>
              </h3>




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
              <div class="left large grey">Delivery ({{ number_format($order->distance , 0) }} miles):</div>
              <div class="right large grey">£{{ number_format($order->distance * Config::get('app.poundsPerMile'), 0) }}.00</div>
              @endif
              <div class="clearfix"></div>

               <div class="left large grey">VAT:</div>
              <div class="right large grey">£{{ number_format($totalvat/100, 2) }}</div>
              <div class="clearfix"></div>

              <div class="spacer10"></div>

              <div class="left large black bold ">Grand Total:</div>
              <div class="right large black bold">£{{ number_format($totaltotal/100, 2) }}</div>
              <div class="clearfix"></div>





              <div class="spacer40"></div>

<div class="alert alert-info">

              <div class="left large grey">Order status:</div>
              <div class="right large black"> {{$order->status}}</div>
              <div class="spacer20"></div>
</div>


          </div>

           </div>


        </div> <!-- / .row -->



      </div> <!-- / .container -->

   


   @include('masters.footer')