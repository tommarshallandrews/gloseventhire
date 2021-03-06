
@include('masters.header')

@include('masters.navigation')

@include('userCheck')

@include('passwordCheck')






 <div id="signupbox" style="display; margin-top:50px" class="mainbox col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">Update your details - Mr {{ Auth::user()->id }}</div>
                            
                        </div>  
                        <div class="panel-body" >


                                @if (Session::has('message'))
                                  <div class="alert alert-info">{{ Session::get('message') }}</div>
                                @endif

                              {!! Form::open(array('url'=>'users/update', 'class'=>'form-horizontal', 'id'=>'signupform', 'role'=>'form')) !!}

                                
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




                                    
                                
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Your email Address" value="{{ $user->email }}">
                                    </div>
                                    <div class="registrationFormAlert" id="divEmailValid"></div>

                                </div>
                                    

                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First name</label>
                                    <div class="col-md-6 ">

                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" value="{{ $user->firstname }}">
                                    </div>
                                    <div class="registrationFormAlert" id="divUsernamelValid"></div>
                                </div>


                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">Last name</label>
                                    <div class="col-md-6 ">

                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name"  value="{{ $user->lastname }}">
                                    </div>
                                    <div class="registrationFormAlert" id="divUsernamelValid"></div>
                                </div>


                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">Telephone</label>
                                    <div class="col-md-6 ">

                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Telephone" value="{{ $user->phone }}">
                                    </div>
                                    <div class="registrationFormAlert" id="divUsernamelValid"></div>
                                </div>  


                                

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup-REMOVE-THIS-TO-DISABLE-DURING-VALIDATION " type="submit" class="btn btn-success"><i class="icon-hand-right"></i> &nbsp Sign Up</button>

                                    </div>
                                </div>

                                 <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                       <div style="float:right; font-size: 100%; position: relative; top:-10px">Already registered? <a id="signinlink" href="{{URL::to('/users/login')}}">Sign in here</a></div>
                                        
                                    </div>
                                </div>

                                
                              
                             
                                
                                
                            {!! Form::close() !!}
                         </div>
                    </div>

               
               
                
         </div> 

   @include('masters.footer')
