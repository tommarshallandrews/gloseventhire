
@include('masters.header')

@include('masters.navigation')
    


    <!-- TOPIC HEADER
    ================================================== -->
    <div class="topic">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <h3>Product: Category {{$catSlug}}</h3>
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
                        <input type="checkbox" value="" id="shop-filter-checkbox_1" >
                        <label for="shop-filter-checkbox_1"><a href="{{ url('/products') }}/{{$cat}}/0/{{$rangeSlug}}">[All]</a></label>
                      </div>

                      @foreach($groups as $group)
                      <div class="checkbox">
                        <input type="checkbox" value="" id="shop-filter-checkbox_1" <?php if($groupSlug == $group->slug){ echo("checked"); }  ?>>
                        <label for="shop-filter-checkbox_1"><a href="{{ url('/products') }}/{{$cat}}/{{$group->slug}}/{{$rangeSlug}}">{{$group->name}}</a></label>
                      </div>
                      @endforeach





                      <h3 class="headline">
                        <span>Range</span>
                      </h3>
                      <div class="checkbox">
                        <input type="checkbox" value="" id="shop-filter-checkbox_1">
                        <label for="shop-filter-checkbox_1"><a href="{{ url('/products') }}/{{$cat}}/{{$groupSlug}}/0">[All]</a></label>
                      </div>
                      @foreach($ranges as $range)
                      <div class="checkbox">
                        <input type="checkbox" value="" id="shop-filter-checkbox_1" <?php if($rangeSlug == $range->slug){ echo("checked"); }  ?>>
                        <label for="shop-filter-checkbox_1"><a href="{{ url('/products') }}/{{$cat}}/{{$groupSlug}}/{{$range->slug}}">{{$range->name}}</a></label>
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
              
            <span class="colorbox" data-toggle="tooltip" data-placement="top" style="background:{{ $colourId->hex  }}">
              <span class="white huge">Linen available in {{ $colourId->name }} </span>
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
                                    <a href="{{ url('/products/details') }}/{{$product->id}}/{{$colourId->slug}}">{{$product->group->name}}</a>
                                  


                                    <span class="shop-thumb-price_new pull-right">£{{ number_format($product->price / 100, 2)}} each</span>


                               
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
                                    <img src="http://madigital.co.uk/images/{{$result->image1}}"  class="img-responsive productThumb" alt="...">
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
                            <p class="large">There's nothing fitting that description. </p><p>Please try and select another catagory or use the search below:</p>
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