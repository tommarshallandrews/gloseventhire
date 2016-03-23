


 <!-- FOOTER
    ================================================== -->
    <footer>

      

      <!-- Footer Bottom -->
      <div class="footer_bottom">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="footer__copyright">
                Copyright 2015 <a href="http://{{ Config::get('app.companyWebsite') }}">{{ Config::get('app.companyName') }}</a>. All Rights Reserved.
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <ul class="footer__social">
                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
          </div> <!-- / .row -->
        </div> <!-- / .container -->
      </div> <!-- / .footer_bottom -->
    </footer>


    <!-- JavaScript
    ================================================== -->
    
    <!-- JS Global -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{URL::to('/')}}/js/bootstrap.min.js"></script>
    
    <!-- JS Plugins -->
    <script src="{{URL::to('/')}}/js/scrolltopcontrols.js"></script>
    
    <!-- JS Custom -->
    <script src="{{URL::to('/')}}/js/custom.js"></script>



  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script>
    $('.input-group.date').datepicker({
    format: "dd-mm-yyyy",
    startDate: '+1d',
    endDate: "01-01-2018",
    todayBtn: "linked",
    autoclose: true,
    todayHighlight: true
    });
    </script>
  </script>


 <script>
  $(function() {
    $(".productThumb")
        .mouseover(function() { 
            var src = $(this).attr("src").replace("A.jpeg", "B.jpeg");
            $(this).attr("src", src);
        })
        .mouseout(function() {
            var src = $(this).attr("src").replace("B.jpeg", "A.jpeg");
            $(this).attr("src", src);
        });
});
</script>


  </body>
</html>