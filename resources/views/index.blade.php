
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
                      <h3 class="shop-slideshow__heading">
                        Register to use our new online ordering system
                      </h3>

                      <a href="{{URL::to('/')}}/users/register" class="btn btn-lg shop-slideshow__btn">Register</a>
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
                      <h1 class="shop-slideshow__heading">New ranges of china & cutlery available from May 2017</h1>
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
                      <h1 class="shop-slideshow__heading">High quality, professional grade kitchen equipment</h1>
                      <a href="{{URL::to('/')}}/products/kitchen_equipment/0/0" class="btn btn-lg shop-slideshow__btn">Show me</a>
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

  

    <!-- Featured collection -->


   


   @include('masters.footer')