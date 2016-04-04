
@include('masters.header')

@include('masters.navigation')
    


   <!-- SLIDESHOW
    ================================================== -->
    <div class="shop__slideshow">
      <div id="shop__slideshow" class="carousel carousel-fade slide" data-ride="carousel">
        
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item item_1 active">
            <div class="item__container">
              <div class="item-container__inner">

                <div class="container">
                  <div class="row">
                    <div class="col-sm-8 col-md-6 col-lg-5">
                      <h1 class="shop-slideshow__heading">
                        Special offer <br />
                        50% off everything
                      </h1>
                      <p class="shop-slideshow__subheading">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea cum, reiciendis nemo recusandae quos consectetur
                      </p>
                      <a href="#" class="btn btn-lg shop-slideshow__btn">Find out more</a>
                    </div>
                  </div>
                </div>

              </div> <!-- / .item-container__inner -->
            </div> <!-- / .item__container -->
          </div> <!-- / .item -->
          <div class="item item_2">
            <div class="item__container">
              <div class="item-container__inner">

                <div class="container">
                  <div class="row">
                    <div class="col-sm-8 col-md-6 col-lg-5">
                      <h1 class="shop-slideshow__heading">Free shipping</h1>
                      <p class="shop-slideshow__subheading">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et vero, velit itaque hic tempore porro quisquam deserunt, minima veritatis
                      </p>
                      <a href="#" class="btn btn-lg shop-slideshow__btn">Find out more</a>
                    </div>
                  </div>
                </div>

              </div> <!-- / .item-container__inner -->
            </div> <!-- / .item__container -->
          </div> <!-- / .item -->
          <div class="item item_3">
            <div class="item__container">
              <div class="item-container__inner">

                <div class="container">
                  <div class="row">
                    <div class="col-sm-8 col-md-6 col-lg-5">
                      <h1 class="shop-slideshow__heading">Free returns</h1>
                      <p class="shop-slideshow__subheading">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et vero, velit itaque hic tempore porro quisquam deserunt, minima veritatis
                      </p>
                      <a href="#" class="btn btn-lg shop-slideshow__btn">Find out more</a>
                    </div>
                  </div>
                </div>

              </div> <!-- / .item-container__inner -->
            </div> <!-- / .item__container -->
          </div> <!-- / .item -->
        </div> <!-- / .carousel-inner -->
      
        <!-- Controls -->
        <a href="#shop__slideshow" class="shop-slideshow__control" role="button" data-slide="prev">
          <img src="assets/img/arrow_left.svg" alt="Prev">
        </a>
        <a href="#shop__slideshow" class="shop-slideshow__control" role="button" data-slide="next">
          <img src="assets/img/arrow_right.svg" alt="Next">
        </a>

        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#shop__slideshow" data-slide-to="0" class="active"></li>
          <li data-target="#shop__slideshow" data-slide-to="1"></li>
          <li data-target="#shop__slideshow" data-slide-to="2"></li>
        </ol>
      
      </div> <!-- / .carousel -->
    </div>


    <!-- MAIN CONTENT
    ================================================== -->

    <!-- Features -->
    <section class="shop-index__section">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">

            <h2 class="shop-index__heading text-center">
              Present your products in a beautiful way
            </h2>
            <p class="text-center">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            </p>

          </div>
        </div> <!-- / .row -->
        <div class="row">
          <div class="col-sm-4">
            
            <div class="shop-index-features__item">
              <div class="shop-index-features__icon">
                <i class="fa fa-truck"></i>
              </div>

              <h4 class="shop-index-features__heading">
                Free 3-day shipping
              </h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, perferendis et nostrum.
              </p>
            </div> <!-- / .shop-index-features__item -->

          </div>
          <div class="col-sm-4">
            
            <div class="shop-index-features__item">
              <div class="shop-index-features__icon">
                <i class="fa fa-shopping-bag"></i>
              </div>

              <h4 class="shop-index-features__heading">
                Free returns
              </h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, perferendis et nostrum.
              </p>
            </div> <!-- / .shop-index-features__item -->

          </div>
          <div class="col-sm-4">
            
            <div class="shop-index-features__item">
              <div class="shop-index-features__icon">
                <i class="fa fa-gift"></i>
              </div>

              <h4 class="shop-index-features__heading">
                Gift cards
              </h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, perferendis et nostrum.
              </p>
            </div> <!-- / .shop-index-features__item -->

          </div>
        </div>
      </div> <!-- / .container -->
    </section>

    <!-- Featured collection -->
    <section class="shop-index__section">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            
            <h2 class="shop-index__heading text-center">
              Popular this week
            </h2>

          </div>
        </div> <!-- / .row -->
        <div class="row">
          <div class="col-sm-3">

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
          <div class="col-sm-3">

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
          <div class="col-sm-3">

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
          <div class="col-sm-3">

            <div class="shop__thumb">
              <a href="#">

                <div class="shop-thumb__img">
                  <img src="assets/img/shop-item_4.jpg" class="img-responsive" alt="...">
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
      </div> <!-- / .container -->
    </section>

   


   @include('masters.footer')