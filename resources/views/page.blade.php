
@include('masters.header')

@include('masters.navigation')
    


 <!-- MAIN CONTENT
    ================================================== -->

    <div class="container">
      <div class="row">





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