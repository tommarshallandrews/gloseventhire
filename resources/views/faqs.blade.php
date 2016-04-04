
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
            <span>FAQs</span>
          </h3>

       



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





 <div class="panel-group" id="accordion">
<?php $i=0 ?>

@foreach($faqs as $faq)

  <div class="panel panel-default">
    <div class="faq-heading">
      <h4 class="faq-panel-title">
        <i class="indicator fa fa-chevron-right pull-left red"></i>
        <a class="faq-questions" data-toggle="collapse" data-parent="#accordion" href="#collapse2<?php echo($i) ?>">
          {{$faq->heading}}
        </a>
      </h4>
    </div>

    <div id="collapse2<?php echo($i) ?>" class="panel-collapse collapse">
      <div class="indicator">
        <?php print($faq->body) ?>
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