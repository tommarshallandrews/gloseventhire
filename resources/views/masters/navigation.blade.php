


















<div class="green">

<div class="container">
        <div class="navbar-header">

          <!-- Navbar toggle -->
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <!-- Navbar brand -->
          <a class="navbar-logo" href="{{ url('/') }}">
            <img src="{{ url('/') }}/images/gloucester-events-hire.png" width="350px">
          </a>

        </div> <!-- / .navbar-header -->
        <div class="collapse navbar-collapse" id="topbar">
          <ul class="nav navbar-nav navbar-right">

            <!-- General links -->
            <li >
              <a class="yellow" href="{{ url('/') }}" >Home</a>
            </li>

            <li >
              <a href="{{ url('/page/about-us') }}" >About Us</a>
            </li>

            <li >
              <a href="{{ url('/faq') }}" >FAQ</a>
            </li>

            <li >
              <a href="{{ url('/page/contact-us') }}" >Contact Us</a>
            </li>

            
            <li >
                @if(Auth::check())
                                      
                    @if(Auth::user()->email)
                      <li>
                          <a href="{{ url('/users/dashboard') }}" >Account </a>
                      </li>
                    @else
                       <li>
                          <a href="{{ url('/users/login') }}" >Login</a>
                      </li>
                       <li >
                        <a href="{{ url('/users/register') }}" >Register</a>
                      </li>
                    @endif
                
                @else  
                  <li>
                    <a href="{{ url('/users/login') }}" >Login</a>
                  </li>
                   <li >
                    <a href="{{ url('/users/register') }}" >Register</a>
                  </li>
                @endif
            

            


          </ul> <!-- / .nav -->



        </div><!--/.navbar-collapse -->
      </div>




     </div>
















<!-- NAVIGATION
    ================================================== -->
    <div class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">


          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#productbar">
            Click to view products
          </button>


        </div> <!-- / .navbar-header -->
        <div class="collapse navbar-collapse" id="productbar">
          <ul class="nav navbar-nav navbar-right">

            <!-- General links -->


@foreach($cats as $cat)

            <li class="dropdown">
              <a href="{{ url('/products') }}/{{$cat->slug}}/0/0"  >{{$cat->name}}</a>
              <ul class="dropdown-menu">

                <!-- check cat to show correct drops -->
                    @if($cat->id == 10 || $cat->id == 20 || $cat->id == 70)
                            
                              @foreach($cat->ranges as $range)
                                    <li><a href="{{ url('/products') }}/{{$cat->slug}}/0/{{$range->slug}}">{{$range->name}}</a></li>
                              @endforeach
                    
                    @elseif($cat->id !== 60)

                               @foreach($cat->groups as $group)
                                    <li><a href="{{ url('/products') }}/{{$cat->slug}}/{{$group->slug}}/0">{{$group->name}}</a></li>
                               @endforeach
                    @endif


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
              <a href="{{ url('/quote') }}/{{ $getOrder->order() }}">
                <i class="fa fa-shopping-cart"></i> 
                <span class="navbar__shopping-cart-items">{{ $getOrder->orderCount() }}<span class="visible-xs-inline">items</span></span>
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


