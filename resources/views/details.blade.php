
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


 <div class="container">

      <div class="row">
        <div class="col-xs-12 col-md-4 col-md-push-8">

          <div class="shop-item__info affix-top" data-spy="affix" style="">

            <!-- Price -->
            <div class="shop-item-cart__price">
              £{{ number_format($details->price / 100, 2)}} each
            

            <button type="button" class="btn btn-default btn-sml" data-container="body" data-toggle="popover" data-placement="top" data-content="This charge is for aech item for one hire period. Normally a hire period is Friday-monday or 48 hours during the week." title="" data-original-title="Cost notes" aria-describedby="popover948211">
                info
            </button>
          </div>
            <!-- Title -->
            <h3 class="shop-item-cart__title">
              {{$details->name}}
            </h3>         
            
            <!-- Intro -->
            <div class="shop-item__intro">
              <p>
               {{$details->description}} 
              </p>
            </div>

            <!-- Add to cart -->


@if (Session::has('message'))
   <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('message') }}</div>
@endif


  {!! Form::open(array('url' => 'orders/edit', 'method' => 'post', 'class' => 'form-inline')) !!}
    <div class="form-group">
    <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity">
    </div>
    <input type="hidden" name="product_id" value="{{$details->id}}">
    @if($details->group->collection)
    <input type="hidden" name="colour_hex" value="{{$colour->hex}}">
    @endif
    <input type="hidden" name="action_id" value="add">

    <button type="submit" class="btn btn-secondary btn-lrg"><i class="fa fa-shopping-cart"></i> Add to quote</button>
  </form>


          </div> <!-- / .shop-item__info -->

        </div>
        <div class="col-xs-12 col-md-8 col-md-pull-4">
          
          <!-- Product image -->
          <div class="shop-item__img">
            <div class="shop-item-img__aside">
              @if($details->image1)
              <img src="http://madigital.co.uk/images/{{$details->image1}}" class="img-responsive active" alt="...">
              @endif
              @if($details->image2)
              <img src="http://madigital.co.uk/images/{{$details->image2}}" class="img-responsive" alt="...">
              @endif
              @if($details->image3)
              <img src="http://madigital.co.uk/images/{{$details->image3}}" class="img-responsive" alt="...">
              @endif
              @if($details->image4)
              <img src="http://madigital.co.uk/images/{{$details->image4}}" class="img-responsive" alt="...">
              @endif
            </div>
            <div class="shop-item-img__main">
              @if($details->image1)
              <img src="http://madigital.co.uk/images/{{$details->image1}}" class="img-responsive" alt="..." style="opacity: 1;">
              @elseif($details->group->collection)
              <span class="colorbox huge bold white " data-toggle="tooltip" data-placement="top" title="{{$colour->name}}" style="background:{{$colour->hex}}">{{$colour->name}} Linen {{$details->group->collection}}</span>
              @endif
            </div>
            <div class="clearfix"></div>
          </div>

          <!-- Item Description -->
          <div class="row">
            <div class="col-sm-12">

              <h3 class="headline">
                <span>Notes and usage</span>
              </h3>

              <div class="section">
                {{$details->notes}}
              </div>

            </div>
          </div> <!-- / .row -->

          <!-- Similar products -->
          <div class="row">
            <div class="col-sm-12">

              <h3 class="headline">
                <span>Similar Products</span>
              </h3>

              <div class="row">
                <div class="col-sm-4">

                  <div class="shop__thumb">
                    <a href="#">

                      <div class="shop-thumb__img">
                        <img src="assets/img/shop-item_1.jpg" class="img-responsive" alt="...">
                      </div>

                      <h5 class="shop-thumb__title">
                        Product Title
                      </h5>

                      <div class="shop-thumb__price">
                        <span class="shop-thumb-price_old">$80.99</span>
                        <span class="shop-thumb-price_new">$59.99</span>
                      </div>

                    </a>
                  </div>

                </div>
                <div class="col-sm-4">

                  <div class="shop__thumb">
                    <a href="#">

                      <div class="shop-thumb__img">
                        <img src="assets/img/shop-item_2.jpg" class="img-responsive" alt="...">
                      </div>

                      <h5 class="shop-thumb__title">
                        Product Title
                      </h5>

                      <div class="shop-thumb__price">
                        $59.99
                      </div>

                    </a>
                  </div>

                </div>
                <div class="col-sm-4">

                  <div class="shop__thumb">
                  <a href="#">

                    <div class="shop-thumb__img">
                      <img src="assets/img/shop-item_3.jpg" class="img-responsive" alt="...">
                    </div>

                    <h5 class="shop-thumb__title">
                      Product Title
                    </h5>

                    <div class="shop-thumb__price">
                      $59.99
                    </div>

                  </a>
                </div>

                </div>
              </div> <!-- / .row -->
            </div>
          </div> <!-- / .row -->

        </div>
      </div> <!-- / .row -->

    </div>

   


   @include('masters.footer')