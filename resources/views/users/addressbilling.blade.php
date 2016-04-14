
@include('masters.header')

@include('masters.navigation')
    


 <!-- MAIN CONTENT
    ================================================== -->

      <div class="container">
        <div class="row">
          


          <div class="col-sm-12">

            <div class="checkout__block">


        <!--  if user is has not registered -->         



                      <h3 class="headline"><span>Billing address</span></h3>


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




            {!! Form::open(array('url'=>'users/addressbilling', 'class'=>'form-horizontal', 'id'=>'signupform', 'role'=>'form', 'method' => 'post')) !!}




                    <div class="form-group">
                                    <label for="address1" class="col-md-2 control-label">Address 1</label>
                                    <div class="col-md-6">
                                        <input type="text" name="address1" placeholder="Address Line 1" class="form-control" value="<?php 
                        if($user->address1)
                        {
                          echo($user->address1);
                        }
                        else
                        {?>{{ old('address1') }}<?php } ?>">
                                    </div>

                   </div>


                   <div class="form-group">
                                    <label for="address2" class="col-md-2 control-label">Address 2</label>
                                    <div class="col-md-6">
                                        <input type="text" name="address2" placeholder="Address Line 2" class="form-control" value="<?php 
                        if($user->address2)
                        {
                          echo($user->address2);
                        }
                        else
                        {?>{{ old('address2') }}<?php } ?>">
                                    </div>


                   </div>



                   <div class="form-group">
                                    <label for="town" class="col-md-2 control-label">Town / City</label>
                                    <div class="col-md-6">
                                        <input type="text" name="town" placeholder="Town/City: " class="form-control" value="<?php 
                        if($user->town)
                        {
                          echo($user->town);
                        }
                        else
                        {?>{{ old('town') }}<?php } ?>">
                                    </div>


                   </div>


                     <div class="form-group">
                                    <label for="county" class="col-md-2 control-label">County</label>
                                    <div class="col-md-6">
                                        <input type="text" name="county" placeholder="Town/City: " class="form-control" value="<?php 
                        if($user->county)
                        {
                          echo($user->county);
                        }
                        else
                        {?>{{ old('county') }}<?php } ?>">
                                    </div>

                   </div>



                   <div class="form-group">
                                    <label for="postcode" class="col-md-2 control-label">Postcode</label>
                                    <div class="col-md-6">
                                        <input type="text" name="postcode" placeholder="Postcode" class="form-control" value="<?php 
                        if($user->postcode)
                        {
                          echo($user->postcode);
                        }
                        else
                        {?>{{ old('postcode') }}<?php } ?>">
                                    </div>

                   </div>


                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-2 col-md-6">
                                        <button id="btn-signup" type="submit" class="btn btn-success"><i class="icon-hand-right"></i> &nbsp Save billing address</button>

                                    </div>
                                </div>


                                <input type="hidden" name="action" value="order">

                    </form>
   
        <!--  if user is has not registered -->



          </div>


        </div> <!-- / .row -->




        </div> <!-- / .row -->

        </div> <!-- / .row -->

























      </div> <!-- / .container -->

   </div> 


   @include('masters.footer')