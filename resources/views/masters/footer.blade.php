


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


            <!-- Quick Links -->
            <div class="col-xs-12 col-sm-4">
              <div class="footer__item">
      <a class="twitter-timeline" href="https://twitter.com/gloseventhire" data-widget-id="719824613371457536">Tweets by @gloseventhire</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
              </div>            
            </div>





          </div> <!-- / .row -->
        </div> <!-- / .container -->
      </div>


            <div class="col-xs-12 col-sm-4">
              <div class="footer__item">


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
                <li class="twitter"><a href="https://twitter.com/gloseventhire" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li class="facebook"><a href="https://www.facebook.com/gloseventhire/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li class="linkedin"><a href="https://www.linkedin.com/company/gloucester-event-hire-ltd" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
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


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56e944092b749792"></script>





  </body>
</html>