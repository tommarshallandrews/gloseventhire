
@include('masters.header')

@include('masters.navigation')
    


 <!-- MAIN CONTENT
    ================================================== -->

    <div class="container">
      <div class="row">
        <div class="col-sm-3">



          

        </div>
        <div class="col-sm-9">


       



<div class="section">

            <!-- Accordion -->
            <h2 class="headline" id="accordions">
              <span>FAQs</span>
            </h2>

            <?php $i=0 ?>

              @foreach($faqs as $faq)

            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo($i) ?>" aria-expanded="false" class="collapsed">
                    {{$faq->heading}}
                  </a>
                </div>
                <div id="collapse<?php echo($i) ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                  <div class="panel-body">
                    <?php print($faq->body) ?>
                  </div>
                </div>
              </div>


          </div>

          <?php $i++ ?>
@endforeach


</div>






































          <!-- Paggination -->

          <div class="clearfix"></div>

        </div>

      </div> <!-- / .row -->
    </div> <!-- / .container -->

   


   @include('masters.footer')