

<script>


$(document).ready(function(){
$('#username').keyup(makename_check);
});
    
function username_check(){  
var username = $('#username').val();
if(username == "" || username.length < 4){
$('#username').css('border', '10px #CCC solid');
$('#tick').hide();

}else{

jQuery.ajax({
   type: "POST",
   url: "{{ URL::to('/') }}/usernameCheck",
   data: 'username='+ username,
   cache: false,
   success: function(response){
    
if(response == 1){
    $('#username').css('border', '3px #C33 solid'); 
    $('#btn-signup').prop('disabled', true);
    $('#tick').hide();
    $('#cross').fadeIn();
    }else{
    $('#username').css('border', '3px #090 solid');
    $('#btn-signup').prop('disabled', false);
    $('#cross').hide();
    $('#tick').fadeIn();
         }

}
});
}




}

</script>



<div id="signupbox" style="display; margin-top:50px" class="mainbox col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title"><h2>Great!</h2> We need to register you before you can save your beautiful creation.</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                        </div>  
                        <div class="panel-body" >

                              {{ Form::model($user, array('url'=>'users/new', 'class'=>'form-horizontal', 'id'=>'signupform', 'role'=>'form')) }}
                                
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
                                    <div class="col-md-9">
                                       {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email address')) }}
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">Your creator name</label>
                                    <div class="col-md-9">
                                    	{{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Other users will see this if you make any creations public')) }}
                                    </div>
                                </div>
  

             
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                       <input type="password" class="form-control" name="password" placeholder="Choose a password">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="password_confirmation" class="col-md-3 control-label">Confirm Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm your password">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="submit" class="btn btn-success"><i class="icon-hand-right"></i> &nbsp Create account</button>
                                    	<a id="btn-fblogin" href="{{ URL::previous() }}" class="btn btn-primary">Not now thanks</a>
                                    </div>
                                </div>
                              
                                
                                
                                
                            {{ Form::close() }}
                         </div>
                    </div>

               
               
                
         </div> 