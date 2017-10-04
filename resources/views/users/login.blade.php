

 @include('masters.header') 

@include('masters.navigation')

<div class="container">
 <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 90%; position: relative; top:-10px"><a href="{{ url('/password/email') }}">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                    @if(Session::has('message'))
                        <div style="display" id="login-alert" class="alert alert-danger col-sm-12">{{ Session::get('message') }}</div>
                    @endif   
                            
                       {!! Form::open(array('url'=>'users/signin', 'class'=>'form-horizontal')) !!}
                                    
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Your email Address" value="{{ old('email') }}">
                                    </div>

                                </div>
                                
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" id="email" placeholder="Your password" value="">
                                    </div>

                                </div>
                                    

                                



                                <div class="form-group">
                                    <!-- Button -->
                                    <span class="col-md-3"></span>
                                    <div class="col-sm-9 controls">
                                     {!! Form::submit('Login', array('class'=>'btn btn-success btn-lg"'))!!}
             

                                    </div>
                                </div>


                                <div style="margin-top:10px" class="input-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:100%" >
                                            Don't have an account?
                                        <a href="{{ url('/users/register') }}">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                           {!! Form::close() !!}   



                        </div>                     
                    </div>  
        </div>
  </div>      

 @include('masters.footer')