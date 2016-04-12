@include('masters.header')

@include('masters.navigation')


    


  <!-- MAIN CONTENT
    ================================================== -->

    <!-- Google Map -->
    <div id="map_canvas" class="contact-us__google-map_big"></div>

    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <div class="section">

            <h3 class="headline">
              <span>Contact Us</span>
            </h3>

            <p class="contact-us__intro">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin congue tellus ut velit mollis condimentum. Nulla egestas neque sed odio varius facilisis. Donec ac metus gravida leo dictum porttitor.
            </p>

            <!-- Alert message -->
            <div class="alert" id="form_message" role="alert"></div>

            <!-- Please carefully read the README.txt file in order to setup
                 the PHP contact form properly -->
            <form id="form_sendemail">
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="E-mail" data-original-title="" title="">
                <span class="help-block"></span>
              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" data-original-title="" title="">
                <span class="help-block"></span>
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" class="form-control" rows="3" id="message" placeholder="Message"></textarea>
                <span class="help-block"></span>
              </div>
              <!-- reCAPTCHA -->
              <div class="form-group" id="form-captcha">
                
                <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
                <span class="help-block"></span>
              </div>
              <!-- /reCAPTCHA -->
              <button type="submit" class="btn btn-lg btn-primary">Send Message</button>
            </form>
          
          </div> <!-- / .section -->
        </div>
        <div class="col-sm-4">
          <div class="section">

            <h3 class="headline">
              <span>Contact Info</span>
            </h3>

            <ul class="contact-info">
              <li>
                <i class="fa fa-map-marker"></i>
                <div class="contact-info__content">
                  <div class="title">Address:</div>
                  <div class="description">Vivamus posuere in erat ut posuere. Nulla ullamcorper felis in turpis euismod.</div>
                </div>
              </li>
              <li>
                <i class="fa fa-phone"></i>
                <div class="contact-info__content">
                  <div class="title">Telephone:</div>
                  <div class="description">+123456789</div>
                </div>
              </li>
              <li>
                <i class="fa fa-fax"></i>
                <div class="contact-info__content">
                  <div class="title">Fax:</div>
                  <div class="description">+123456789</div>
                </div>
              </li>
              <li>
                <i class="fa fa-twitter"></i>
                <div class="contact-info__content">
                  <div class="title">Twitter:</div>
                  <div class="description">https://www.twitter.com/example</div>
                </div>
              </li>
            </ul>

            <!-- Social links -->
            <div class="social">
              <ul class="list-inline">
                <li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="plus"><i class="fa fa-plus"></i></a></li>
                <li><a href="#" class="vk"><i class="fa fa-vk"></i></a></li>
              </ul>
            </div>

          </div> <!-- / .section -->
        </div>
      </div> <!-- / .row -->
    </div> <!-- / .container -->


    <!-- FOOTER
    ================================================== -->
    <footer>

      <!-- Footer Top -->
      <div class="footer_top">
        <div class="container">
          <div class="row">

            <!-- Contact Us -->
            <div class="col-xs-12 col-sm-3">
              <div class="footer__item">
                <h5 class="footer-item__title"><span>Contact Us</span></h5>
                <div class="footer-item__content">
                  <p>
                    Do not hesitate to contact us if you have any questions or feature requests:
                  </p><p>
                    Lorem ipsum dolor sit amet,<br>
                    Consectetur adipiscing elit
                  </p><p>
                    Phone: +0 000 000 00 00<br>
                    Fax: +0 000 000 00 00
                  </p><p>
                    Email: <a href="#">support@example.com</a>
                  </p>
                </div>
              </div>
            </div>

            <!-- Recent Tweets -->
            <div class="col-xs-12 col-sm-3">
              <div class="footer__item">
                <h5 class="footer-item__title"><span>Recent Tweets</span></h5>
                <div class="footer-item__content">
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

            <!-- Recent Posts -->
            <div class="col-xs-12 col-sm-3">
              <div class="footer__item">
                <h5 class="footer-item__title"><span>Recent Posts</span></h5>
                <div class="footer-item__content">
                  <div class="footer__post">
                    <div class="footer-post__img">
                      <img src="assets/img/photo-2.jpg" alt="...">
                    </div>
                    <div class="footer-post__content">
                      <p><a href="#">Lorem ipsum dolor sit amet</a></p>
                      <time datetime="2015-01-01">2015/01/01</time>
                    </div>
                  </div>
                  <div class="footer__post">
                    <div class="footer-post__img">
                      <img src="assets/img/photo-3.jpg" alt="...">
                    </div>
                    <div class="footer-post__content">
                      <p><a href="#">Lorem ipsum dolor sit amet</a></p>
                      <time datetime="2015-01-01">2015/01/01</time>
                    </div>
                  </div>
                  <div class="footer__post">
                    <div class="footer-post__img">
                      <img src="assets/img/photo-6.jpg" alt="...">
                    </div>
                    <div class="footer-post__content">
                      <p><a href="#">Lorem ipsum dolor sit amet</a></p>
                      <time datetime="2015-01-01">2015/01/01</time>
                    </div>
                  </div>
                </div>
              </div>            
            </div>

            <!-- Quick Links -->
            <div class="col-xs-12 col-sm-3">
              <div class="footer__item">
                <h5 class="footer-item__title"><span>Quick Links</span></h5>
                <div class="footer-item__content">
                  <ul class="footer__links">
                    <li><a href="#">Donec commodo turpis eget orci</a></li>
                    <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                    <li><a href="#">Aenean rhoncus vel nisi sed</a></li>
                    <li><a href="#">Aenean accumsan volutpat libero</a></li>
                    <li><a href="#">Vestibulum lacinia erat massa</a></li>
                  </ul>
                </div>
              </div>            
            </div>

          </div> <!-- / .row -->
        </div> <!-- / .container -->
      </div> <!-- / .footer_top -->

      <!-- Footer Bottom -->
      <div class="footer_bottom">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="footer__copyright">
                Copyright 2015 <a href="http://simpleqode.com/">Simpleqode.com</a>. All Rights Reserved.
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

   


   @include('masters.footer')