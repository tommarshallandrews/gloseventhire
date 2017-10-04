

<div class="green-back">

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
            <img src="{{ url('/') }}/img/gloucester-events-hire.png" width="350px" height="55px">
          </a>

{{--           <span class=" hidden-sm hidden-xs left">
          <a class="slush" href="{{ url('/') }}/products/details/126">
            <img src="{{ url('/') }}/img/slush-machines.png" width="235px" height="71px">
          </a>
          </span> --}}

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
              <a href="{{ url('/contact-us') }}" >Contact Us</a>
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



          <button type="button" class="navbar-toggle btn-xs" data-toggle="collapse" data-target="#productbar">
            <i class="fa fa-search" aria-hidden="true"></i> View products
          </button>
          <a href="{{ url('/quote') }}/{{ $getOrder->order() }}" type="button" class="navbar-toggle btn-xs" >
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Quote
          </a>

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
                            
                              @foreach($cat->ranges->sortBy('order') as $range)
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
            <li class="hidden-x ">
              
              <!-- Search toggle -->
       {!! Form::open(array('url'=>'products/search','class'=>'navbar-form','role'=>'search','method'=>'get')) !!}
        <div class="input-group">
            <input type="text" class="form-control" name="searchterm" placeholder="Search products"  id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="fa fa-search green"></i></button>
            </div>
        </div>
        </form>
           
            </li>
            <!-- / .navbar-search -->


            <!-- Shopping cart -->
            <li class="navbar__shopping-cart pull-right">
              <a href="{{ url('/quote') }}/{{ $getOrder->order() }}">
                <i class="fa fa-shopping-cart green"></i> 
                <span class="navbar__shopping-cart-items">{{ $getOrder->orderCount() }}<span class="visible-xs-inline">items</span></span>
              </a>

            </li>

          </ul> <!-- / .nav -->



          <!-- Navbar Search (mobile) -->
         {!! Form::open(array('url'=>'users/update', 'class'=>'navbar-form visible-xs', 'id'=>'signupform', 'role'=>'form')) !!}
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


