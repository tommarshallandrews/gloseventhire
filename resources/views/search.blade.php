
@include('masters.header')

@include('masters.navigation')
    


    <!-- TOPIC HEADER
    ================================================== -->
    <div class="topic">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <h3>Results for <strong>{{$q}}</strong> </h3>
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
          {!! Form::open(array('url'=>'products/search','method'=>'get')) !!}
            <div class="well">
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
            </div>
          </form>

          <!-- Filter -->


        </div>
        <div class="col-sm-12 col-md-9">



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
                                     @if($result->range)
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