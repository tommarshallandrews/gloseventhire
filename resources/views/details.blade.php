
@include('masters.header')

@include('masters.navigation')
    


    <!-- TOPIC HEADER
    ================================================== -->
    <div class="topic">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h3>Details: {{ $details->name}}</h3>
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
    @if($colour)
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
              @if($details->image2)
              <img src="{{ url('/images') }}/{{$details->image1}}" class="img-responsive active" alt="...">
              <img src="{{ url('/images') }}/{{$details->image2}}" class="img-responsive" alt="...">
              @endif
              @if($details->image3)
              <img src="{{ url('/images') }}/{{$details->image3}}" class="img-responsive" alt="...">
              @endif
              @if($details->image4)
              <img src="{{ url('/images') }}/{{$details->image4}}" class="img-responsive" alt="...">
              @endif
            </div>


            <div class="shop-item-img__main">
              @if($details->image1)
              <img src="{{ url('/images') }}/{{$details->image1}}" class="img-responsive" alt="..." style="opacity: 1;">
              @elseif($details->group->collection)
             <?php 
             $textcolour = 'white';
             if($colour->slug == 'white' || $colour->slug == 'vanilla-slice' || $colour->slug == 'banana-milkshake' || $colour->slug == 'candyfloss' || $colour->slug == 'custard-cream') { $colour = 'black'; } 
              ?>
            <span class="colorbox"  data-placement="top" style="background:{{ $colour->hex  }}">
              <div class="{{$textcolour}} huge">{{ $colour->name }} </div>
              <span class="{{$textcolour}}">{{ $colour->description }} </span>
            </span>

              @endif
            </div>
            <div class="clearfix"></div>
          </div>




<!-- Item Description -->   
@if($details->notes)       



          <div class="row">
            <div class="col-sm-12">

              <h3 class="headline">
                <span>Notes and usage</span>
              </h3>

              @if($details->document1) 
              <div class="section">
               <a href="{{ url('/documents') }}/{{$details->document1}}" class="btn btn-info block"><i class="fa fa-download"></i> Download Manual</a>
              </div>
              @endif

              <div class="section">
               <?php print($details->notes) ?>
              </div>

            </div>
          </div> 
@endif          
<!-- / .row -->


<!-- Item Description -->
@if($details->pack)
           
          <div class="row">
            <div class="col-sm-12">

              <h3 class="headline">
                <span>Pack size / Quantities</span>
              </h3>

              <div class="section">
               <?php print($details->pack) ?>
              </div>

            </div>
          </div> 
@endif
<!-- / .row -->



@if($similars)
          <!-- Similar products -->
          <div class="row">
            <div class="col-sm-12">

              <h3 class="headline">
                <span>Similar Products</span>
              </h3>

<div class="row">


@foreach($similars as $similar)

                <div class="col-sm-4">

                  <div class="shop__thumb">
                    <a href="#">

                      <div class="shop-thumb__img">
                        <a href="{{ url('/products/details') }}/{{$similar->id}}">
                        <img src="{{ url('/thumbs') }}/{{$similar->image1}}" class="img-responsive" alt="..." width="210" onerror="this.src='{{ url('/img') }}/no-image.jpg'">
                        </a>
                      </div>

                      <h5 class="shop-thumb__title">
                        <a href="{{ url('/products/details') }}/{{$similar->id}}">
                        {{$similar->name}}
                        </a>
                      </h5>

                      <div class="shop-thumb__price">
                        <span class="shop-thumb-price_new">£{{ number_format($similar->price / 100, 2)}} each</span>
                      </div>

                    </a>
                  </div>

                </div>
          
@endforeach


</div> <!-- / .row -->

              
            </div>
          </div> <!-- / .row -->
@endif

        </div>
      </div> <!-- / .row -->

    </div>

   


   @include('masters.footer')