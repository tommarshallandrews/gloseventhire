
@include('masters.header')

@include('masters.navigation')
    


    <!-- TOPIC HEADER
    ================================================== -->
    <div class="topic">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h3>Product: {{$catName}} </h3>
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </div> <!-- / .topic -->


    <!-- MAIN CONTENT
    ================================================== -->
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-md-3">

          <!-- Search -->


          <!-- Filter -->
          <form class="shop__filter">

 



            @if($cat_id == 60)

                                  <!-- Checkboxes -->
                      <h3 class="headline">
                        <span>Linen Colours</span>
                      </h3>


                      @foreach($colours as $colour)

                       <div class="shop-filter__color">
                      <a href="{{ url('products/linen/0/') }}/{{$colour->slug}}"><span class="colorbox" data-toggle="tooltip" data-placement="top" title="{{$colour->name}}" style="background:{{$colour->hex}}"></span></a>
                    </div>

                      @endforeach


            @else

                                  <!-- Checkboxes -->
                      <h3 class="headline">
                        <span>Types</span>
                      </h3>

                      <div class="checkbox">
                        <!--<input type="checkbox" value="" id="shop-filter-checkbox_1" >-->
                        <label for="shop-filter-checkbox_1"><a href="{{ url('/products') }}/{{$cat}}/0/{{$rangeSlug}}" class="<?php if($groupSlug == '0'){ echo("blue"); }  ?>">[All]</a></label>
                      </div>

                      @foreach($groups as $group)
                      <div class="checkbox">
                        <!--<input type="checkbox" value="" id="shop-filter-checkbox_1" <?php if($groupSlug == $group->slug){ echo("checked"); }  ?>> -->
                        <label for="shop-filter-checkbox_1"><a href="{{ url('/products') }}/{{$cat}}/{{$group->slug}}/{{$rangeSlug}}" class="<?php if($groupSlug == $group->slug){ echo("blue"); }  ?>">{{$group->name}}</a></label>
                      </div>
                      @endforeach





                      <h3 class="headline">
                        <span>Range</span>
                      </h3>
                      <div class="checkbox">
                        <input type="checkbox" value="" id="shop-filter-checkbox_1">
                        <label for="shop-filter-checkbox_1"><a href="{{ url('/products') }}/{{$cat}}/{{$groupSlug}}/0" class="<?php if($rangeSlug == '0'){ echo("blue"); }  ?>">[All]</a></label>
                      </div>
                      @foreach($ranges as $range)
                      <div class="checkbox">
                        <label for="shop-filter-checkbox_1"><a href="{{ url('/products') }}/{{$cat}}/{{$groupSlug}}/{{$range->slug}}" class="<?php if($rangeSlug == $range->slug){ echo("blue"); }  ?>">{{$range->name}}</a></label>
                      </div>
                      @endforeach

          @endif

            <!-- Colors -->


          </form>

        </div>
        <div class="col-sm-8 col-md-9">


          <div class="row">




       @if($cat_id == 60)

             @if($results[0])

             <?php 
             $textcolour = 'white';
             if($colourId->slug == 'white' || $colourId->slug == 'vanilla-slice' || $colourId->slug == 'banana-milkshake' || $colourId->slug == 'candyfloss' || $colourId->slug == 'custard-cream') { $textcolour = 'black'; } 
              ?>

              
            <span class="colorbox"  data-placement="top" style="background:{{ $colourId->hex  }}">
              <div class="{{$textcolour}} huge">Linen available in {{ $colourId->name }} </div>
              <span class="{{$textcolour}}">{{ $colourId->description }} </span>
            </span>



                      <?php $collection = ''; ?>

  
            
                      @foreach($results[0]->product as $product)

                      

                            <div class="col-sm-12 col-md-8">

                              <?php if($collection !== $product->group->collection){ 
                                echo("<hr><h4>" . $product->group->collection . "(s)<h4>");
                              } ?>

                              <div class="">
                                <a href="#">
                                  <h5 >
                                    <a href="{{ url('/products/details') }}/{{$product->id}}/{{$colourId->slug}}" class="underline">{{$product->group->name}}</a>
                                  

                                    @if($colourId->slug == 'white')
                                    <span class="shop-thumb-price_new pull-right">£{{ number_format($product->price2 / 100, 2)}} each</span>
                                    @else
                                    <span class="shop-thumb-price_new pull-right">£{{ number_format($product->price / 100, 2)}} each</span>
                                    @endif

                               
                                  </h5>

                                </a>
                              </div>
                            </div>
                            <?php $collection = $product->group->collection ?>
                        @endforeach

                 @else
                        <span class="colorbox" style="background:#aaa">
                            <span class="white huge">Please select a colour range from the swatch</span>
                        </span>
                 @endif       
         
         @else  

                  @if($results[0])
        

                      @foreach($results as $result)
                            <div class="col-sm-6 col-md-4">
                              <div class="shop__thumb">
                                <a href="#">
                                  <div class="shop-thumb__img">
                                    <a href="{{ url('/products/details') }}/{{$result->id}}">
                                    <img src="{{ url('/thumbs') }}/{{$result->image1}}"  class="img-responsive productThumb" alt="image of {{$result->name}}" onerror="this.src='{{ url('/img') }}/no-image.jpg'">
                                    </a>
                                  </div>
                                  <h5 class="shop-thumb__title">
                                    <a href="{{ url('/products/details') }}/{{$result->id}}">{{$result->name}}</a><br>
                                     @if($cat_id !== 60 && $cat_id !== 70)
                                    ({{$result->range->name}})
                                     @endif
                                  </h5>
                                  <div class="shop-thumb__price">
                                    <span class="shop-thumb-price_new">£{{ number_format($result->price / 100, 2)}} each</span>
                                  </div>
                                </a>
                              </div>
                            </div>
                        @endforeach

                      
                 @else
                        <div class="col-sm-8 col-md-8 col-md-offset-2">

                       <?php
                          $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

                            if (strpos($url,'/new-range') !== false) {
                                echo '<p class="large">New Range - Available May 2016. </p>.';
                            } else {
                                echo '<p class="large">There are no products with this description.</p>';
                            }
                       ?>

                            <p>Please try and select another catagory or use the search below:</p>
                                      <!-- Search -->
                              {!! Form::open(array('url'=>'products/search','method'=>'get')) !!}

                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="input-group">
                                        <input type="text" class="form-control"  name="searchterm"  placeholder="Search again">
                                        <span class="input-group-btn">
                                          <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                          </button>
                                        </span>
                                      </div><!-- /input-group -->
                                    </div><!-- /.col-lg-6 -->
                                  </div><!-- /.row -->

                              </form>
                        </div>
                              <!-- Filter -->

                 @endif 



          @endif              


          </div> <!-- / .row -->

          <!-- Pagination -->
          <div class="row">
            <div class="col-sm-12">


              @include('pagination.default', ['paginator' => $results])

              
            </div>
          </div> <!-- / .row -->
          
        </div> <!-- / .col-sm-8 -->
      </div> <!-- / .row -->
    </div> <!-- / .container -->

   


   @include('masters.footer')