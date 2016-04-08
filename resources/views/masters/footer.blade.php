


 <!-- FOOTER
    ================================================== -->
    <footer>



      <div class="footer_top">
        <div class="container">
          <div class="row">

            <!-- Contact Us -->
            <div class="col-xs-12 col-sm-4">
              <div class="footer__item">
                <h5 class="footer-item__title"><span>Contact Us</span></h5>
                <div class="footer-item__content" style="display: block;">
                  <p>
                    Do not hesitate to contact us if you have any queries:<br>
 
                      Gloucester Event Hire<br>
                      Unit A6 &amp; A7<br>
                      Churcham Business Park&nbsp;<br>
                      Churcham<br>
                      Gloucester<br>
                      GL2 8AX<br>
                      <br>
                      Tel: (01452) 750400<br>
                      Fax: (01452) 751294</p><br>
                      <p><strong>Email:&nbsp;</strong><a href="mailto:info@gloseventhire.co.uk">info@gloseventhire.co.uk</a>&nbsp;<br>






                </div>
              </div>
            </div>

            <!-- Recent Tweets -->
            <div class="col-xs-12 col-sm-4">
              <div class="footer__item">
                <h5 class="footer-item__title"><span>Recent Tweets</span></h5>
                <div class="footer-item__content" style="display: block;">
                  <div class="footer__tweet">
                    <div class="footer-tweet__icon">
                      <i class="fa fa-twitter"></i>
                    </div>
                    <div class="footer-tweet__content">
                      <p>
                        <a href="#">@wrapbootstrap</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi lorem, elementum sed.
                      </p>
                      <a href="#">1 hour ago</a>
                    </div>
                  </div>
                  <div class="footer__tweet">
                    <div class="footer-tweet__icon">
                      <i class="fa fa-twitter"></i>
                    </div>
                    <div class="footer-tweet__content">
                      <p>
                        <a href="#">@wrapbootstrap</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi lorem, elementum sed.
                      </p>
                      <a href="#">1 day ago</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <!-- Quick Links -->
            <div class="col-xs-12 col-sm-4">
              <div class="footer__item">
                <h5 class="footer-item__title"><span>Links</span></h5>
                <div class="footer-item__content" style="display: block;">
                  <ul class="footer__links">
                    <li><a href="{{ url('/page') }}/links">Useful links</a></li>
                    <li><a href="{{ url('/page') }}/terms-conditions">Terms & Conditions</a></li>
                    <li><a href="{{ url('/documents') }}/Brochure-2016.pdf">Latest Brochure</a></li>
                  </ul>
                </div>
              </div>            
            </div>

          </div> <!-- / .row -->
        </div> <!-- / .container -->
      </div>

      

      <!-- Footer Bottom -->
      <div class="footer_bottom">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="footer__copyright">
                Copyright 2016 <a href="http://{{ Config::get('app.companyWebsite') }}">{{ Config::get('app.companyName') }}</a>. All Rights Reserved.
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
    startDate: '+3d',
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


<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
function toggleChevron(e) {
    $(e.target)
        .prev('.faq-heading')
        .find("i.indicator")
        .toggleClass('fa-chevron-down fa-chevron-right');
}
$('#accordion').on('hidden.bs.collapse', toggleChevron);
$('#accordion').on('shown.bs.collapse', toggleChevron);
});//]]> 

</script>


  </body>
</html>