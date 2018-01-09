
@include('masters.header')

@include('masters.navigation')




 <!-- MAIN CONTENT
    ================================================== -->
<div class="container">
    <div class="spacer40"></div>
</div>
  <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <div class="section">

            <h3 class="headline">
              <span>Contact Us</span>
            </h3>



       @if(Session::has('errors'))
      <div id="signupalert" style="display" class="alert alert-danger">
        <strong>You have some errors on the registration form.</strong>
            <ul>
                @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
                @endforeach
            </ul>
      </div>
      @endif 

            <!-- Alert message -->
       @if (Session::has('message'))
            <div class="spacer10"></div>
            <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('message') }}</div>
        @endif

            <!-- Please carefully read the README.txt file in order to setup
                 the PHP contact form properly -->
            {!! Form::open(array('url'=>'users/enquiry', 'id'=>'form_sendemail', 'role'=>'form', 'method' => 'post')) !!}
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="E-mail" value="{{ old('email') }}">
                <span class="help-block"></span>
              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" value="{{ old('name') }}">
                <span class="help-block"></span>
              </div>
              <div class="form-group">
                <label for="message">Enquiry</label>
                <textarea name="enquiry" class="form-control" rows="5" id="enquiry" placeholder="Message">{{ old('enquiry') }}</textarea>
                <span class="help-block"></span>
              </div>
              <!-- reCAPTCHA -->
              <div class="form-group">
              {!! Recaptcha::render() !!}
              </div>


              <!-- /reCAPTCHA -->
              <button type="submit" class="btn btn-lg btn-primary">Send Message</button>

            </form>


            
          
          </div> <!-- / .section -->
        </div>
        <div class="col-sm-4">
          <div class="section">

            <h3 class="headline">
              <span>Our Address</span>
            </h3>

                      Gloucester Event Hire<br>
                      Unit A6 &amp; A7<br>
                      Churcham Business Park&nbsp;<br>
                      Churcham<br>
                      Gloucester<br>
                      GL2 8AX<br>
                      <br>
                      Tel: (01452) 750400<br>
                      Fax: (01452) 751294</p><br>

          </div> <!-- / .section -->
          

<div class="section">

            <h3 class="headline">
              <span>Our warehouse</span>
            </h3>

            <div class="embed-responsive embed-responsive-4by3" id="map_canvas" style="position: relative; overflow: hidden; transform: translateZ(0px); background-color: rgb(229, 227, 223);">


          </div>
       




        </div>
      </div> <!-- / .row -->
    </div>






































          <!-- Paggination -->

          <div class="clearfix"></div>

        </div>

      </div> <!-- / .row -->
    </div> <!-- / .container -->

   
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

   @include('masters.footer')