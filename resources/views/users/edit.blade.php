

@include('masters.header')


@include('updateUserCheck') 



<div id="signupbox" style="display; margin-top:50px" class="mainbox col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                    
@if(Session::has('message'))
        <div class="alert alert-success fade in">h
          
        <a href="#" class="close" data-dismiss="alert">X</a>
        {{ Session::get('message') }}
    </div>
@endif 

<script> 
$(document).ready(function(){

    
var enableSubmitUsername = 1;
var enableSubmitEmail = 1;

$('#btn-signup').prop('disabled', false);

    
});

</script>





                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">Update you details {{ $user->username }}</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"></div>
                        </div>  
                        <div class="panel-body" >

                              {{ Form::model($user, array('url'=>'users/store', 'class'=>'form-horizontal', 'id'=>'signupform', 'role'=>'form')) }}
                                
                                @if(Session::has('errors'))
                                <div id="signupalert" style="display" class="alert alert-danger">
                                  <strong>Please correct the following errors: </strong>
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
                                      {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email', 'id'=>'email')) }}

                                      @if(Auth::User()->confirmation_code)
                                       <div class="alert alert-warning">This email is not valididated. {{ HTML::linkRoute('users.resend', 'Click here')}} to validate it.</div>
                                    @endif

                                    </div>
                                    <div class="registrationFormAlert" id="divEmailValid"></div>
                                    

                                </div>
                                    
                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">Public name</label>
                                    <div class="col-md-6">
                                       {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Email', 'id'=>'username', 'autocomplete'=>'off')) }}
                                    </div>
                                    <div class="registrationFormAlert" id="divUsernamelValid"></div>
                                </div>
                                    


  
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First name</label>
                                    <div class="col-md-6">
                                      {{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'First name')) }}
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last name</label>
                                    <div class="col-md-6">
                                        {{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Last name')) }}
                                    </div>
                                </div>



                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="submit" class="btn btn-success"><i class="icon-hand-right"></i> &nbsp Update details</button>
                                    </div>
                                </div>
                              
                                
                                
                                
                            {{ Form::close() }}
                         </div>
                    </div>

               
               
                
         </div> 

          @include('masters.footerNoMenu') 