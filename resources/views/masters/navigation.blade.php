

<div class="container">
        <div class="navbar-header">

          <!-- Navbar toggle -->
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <!-- Navbar brand -->
          <a class="navbar-brand" href="index.html">
            <i class="fa fa-paperclip"></i> Gloucester Event Hire
          </a>

        </div> <!-- / .navbar-header -->
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">

            <!-- General links -->
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Home</a>
            </li>

            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us</a>
            </li>

            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">FAQ</a>
            </li>

            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact Us</a>
            </li>


            <li class="dropdown active">
              <a href="{{ url('/orders') }}" class="dropdown-toggle" data-toggle="dropdown">My orders</a>
            </li>





          </ul> <!-- / .nav -->



        </div><!--/.navbar-collapse -->
      </div>





















<!-- NAVIGATION
    ================================================== -->
    <div class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">


          


        </div> <!-- / .navbar-header -->
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">

            <!-- General links -->


@foreach($cats as $cat)

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$cat->name}} <b class="caret"></b></a>
              <ul class="dropdown-menu">

                               @foreach($cat->types as $type)
                                    <li><a href="{{ url('/products') }}/{{$cat->slug}}/{{$type->slug}}/0">{{$type->name}}</a></li>
                                @endforeach

              </ul>
            </li>

@endforeach

            <!-- Navbar Search -->
            <li class="hidden-xs">
              
              <!-- Search toggle -->
              <a href="#" class="navbar-search__toggle">
                <i class="fa fa-search"></i>
              </a>

              <!-- Search form -->
              <div class="navbar-search">
                <form>

                  <!-- Input -->
                  <div class="navbar-search__box">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Go!</button>
                      </span>
                    </div>
                    <div class="navbar-search-box__tips">
                      E.g. "Bootstrap templates"
                    </div>
                  </div>

                </form>
              </div> 
           
            </li>
                <!-- / .navbar-search -->




            <!-- Shopping cart -->
            <li class="navbar__shopping-cart">
              <a href="{{ url('/quote') }}/{{ $order }}">
                <i class="fa fa-shopping-cart"></i> 
                <span class="navbar__shopping-cart-items">3 <span class="visible-xs-inline">items</span></span>
              </a>
            </li>

          </ul> <!-- / .nav -->

          <!-- Navbar Search (mobile) -->
          <form class="navbar-form visible-xs">
            <div class="form-group">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary">Search!</button>
                </span>
              </div>
            </div>
          </form>






        </div><!--/.navbar-collapse -->
      </div>
    </div> <!-- / .navigation -->


