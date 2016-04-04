
@include('masters.header')

@include('masters.navigation')
    


 <!-- MAIN CONTENT
    ================================================== -->

    <div class="container">
      <div class="row">
        <div class="col-sm-3">

          <!-- Search -->
          <form>
            <div class="well">
              <div class="row">
                <div class="col-sm-12">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter your question here...">
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

          

        </div>





        <div class="col-sm-9">

          <h3 class="headline">
            <span>{{$content->heading}}</span>
          </h3>

          <?php print($content->body) ?>

       







































          <!-- Paggination -->

          <div class="clearfix"></div>

        </div>

      </div> <!-- / .row -->
    </div> <!-- / .container -->

   


   @include('masters.footer')