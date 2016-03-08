
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
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-md-3">

          <!-- Search -->


          <!-- Filter -->
          <form class="shop__filter">

 

            <!-- Checkboxes -->
            <h3 class="headline">
              <span>Types</span>
            </h3>

            <div class="checkbox">
              <input type="checkbox" value="" id="shop-filter-checkbox_1" >
              <label for="shop-filter-checkbox_1"><a href="{{ url('/products') }}/{{$cat}}/0/{{$rangeSlug}}">[All]</a></label>
            </div>
            @foreach($types as $type)
            <div class="checkbox">
              <input type="checkbox" value="" id="shop-filter-checkbox_1" <?php if($typeSlug == $type->slug){ echo("checked"); }  ?>>
              <label for="shop-filter-checkbox_1"><a href="{{ url('/products') }}/{{$cat}}/{{$type->slug}}/{{$rangeSlug}}">{{$type->name}}</a></label>
            </div>
            @endforeach

            <h3 class="headline">
              <span>Range</span>
            </h3>
            <div class="checkbox">
              <input type="checkbox" value="" id="shop-filter-checkbox_1">
              <label for="shop-filter-checkbox_1"><a href="{{ url('/products') }}/{{$cat}}/{{$typeSlug}}/0">[All]</a></label>
            </div>
            @foreach($ranges as $range)
            <div class="checkbox">
              <input type="checkbox" value="" id="shop-filter-checkbox_1" <?php if($rangeSlug == $range->slug){ echo("checked"); }  ?>>
              <label for="shop-filter-checkbox_1"><a href="{{ url('/products') }}/{{$cat}}/{{$typeSlug}}/{{$range->slug}}">{{$range->name}}</a></label>
            </div>
            @endforeach

          

            <!-- Colors -->
            <h3 class="headline">
              <span>Colors</span>
            </h3>
            <div class="shop-filter__color">
              <input type="text" id="shop-filter-color_1" value="" data-input-color="black">
              <label for="shop-filter-color_1"></label>
            </div>
            <div class="shop-filter__color">
              <input type="text" id="shop-filter-color_2" value="" data-input-color="gray">
              <label for="shop-filter-color_2"></label>
            </div>
            <div class="shop-filter__color">
              <input type="text" id="shop-filter-color_3" value="" data-input-color="brown">
              <label for="shop-filter-color_3"></label>
            </div>
            <div class="shop-filter__color">
              <input type="text" id="shop-filter-color_4" value="" data-input-color="beige">
              <label for="shop-filter-color_4"></label>
            </div>
            <div class="shop-filter__color">
              <input type="text" id="shop-filter-color_5" value="" data-input-color="white">
              <label for="shop-filter-color_5"></label>
            </div>

          </form>

        </div>
        <div class="col-sm-8 col-md-9">



          <div class="row">
            
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
                    ({{$result->range->name}})
                  </h5>
                  <div class="shop-thumb__price">
                    <span class="shop-thumb-price_new">{{$result->price}}p each</span>
                  </div>
                </a>
              </div>
            </div>
        @endforeach


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