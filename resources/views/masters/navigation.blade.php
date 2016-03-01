<!-- NAVIGATION
    ================================================== -->
    <div class="navbar navbar-default" role="navigation">
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
            <i class="fa fa-paperclip"></i> Glos Event Hire
          </a>

        </div> <!-- / .navbar-header -->
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">

            <!-- General links -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Home <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="index_shop.html">Home: Shop</a></li>
                <li><a href="index_app-landing.html">Home: App Landing</a></li>
                <li><a href="index_version-3.html">Home: Version 3</a></li>
                <li><a href="index_version-2_slider.html">Home: Version 2 - Slider</a></li>
                <li><a href="index_version-2_fullpage.html">Home: Version 2 - Fullpage</a></li>
                <li><a href="index_version-1_slider.html">Home: Version 1 - Slider</a></li>
                <li><a href="index_version-1_parallax.html">Home: Version 1 - Parallax</a></li>
              </ul>
            </li>
            <li class="dropdown mega-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
              <div class="dropdown-menu">
                <div class="row">
                  <div class="row-sm-height">

                  @foreach($cats as $cat)
                     <div class="col-sm-3 col-sm-height col-sm-top">
                      <div class="inside">
                        <h4 class="mega-menu__heading"><a href="{{ url('/products') }}/{{$cat->slug}}/0/0">{{$cat->name}}</a></h4>
                        <ul class="mega-menu__menu">
                                 @foreach($cat->types as $type)
                                    <li><a href="{{ url('/products') }}/{{$cat->slug}}/{{$type->slug}}/0">{{$type->name}}</a></li>
                                @endforeach
                        </ul>
                      </div>
                    </div>
                  @endforeach




                  </div> <!-- / .row-height -->
                </div> <!-- / .row -->
              </div> <!-- / .dropdown-menu -->
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="portfolio-item.html">Portfolio Item</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-submenu">
                  <a href="javascript:void(0);">Blog</a>
                  <ul class="dropdown-menu">
                    <li><a href="blog_sidebar-right.html">Sidebar Right</a></li>
                    <li><a href="blog_sidebar-left.html">Sidebar Left</a></li>
                    <li><a href="blog_sidebar-no.html">No Sidebar</a></li>
                  </ul>
                </li>
                <li class="dropdown-submenu">
                  <a href="javascript:void(0);">Blog Post</a>
                  <ul class="dropdown-menu">
                    <li><a href="blog-post_sidebar-right.html">Sidebar Right</a></li>
                    <li><a href="blog-post_sidebar-left.html">Sidebar Left</a></li>
                    <li><a href="blog-post_sidebar-no.html">No Sidebar</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="index_shop.html">Shop: Index</a></li>
                <li><a href="shop_category.html">Shop: Category</a></li>
                <li><a href="shop_product.html">Shop: Product</a></li>
                <li><a href="shop_checkout.html">Shop: Checkout</a></li>
                <li><a href="shop_order-confirmation.html">Shop: Order Confirmation</a></li>
              </ul>
            </li>

            <!-- Mega menu -->
            <li>
              <a href="ui-elements.html">UI Elements</a>
            </li>

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
              </div> <!-- / .navbar-search -->

            </li>

            <!-- Shopping cart -->
            <li class="navbar__shopping-cart">
              <a href="shop_checkout.html">
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