<!-- resources/views/auth/password.blade.php -->

 @include('masters.header') 

@include('masters.navigation')








<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-default" >


                    <div style="padding-top:30px" class="panel-body" >

@if(Session::has('status'))
                        <div style="display" id="login-alert" class="alert alert-success col-sm-12">{{ Session::get('status') }}</div>
@endif   
                            
                      {!! Form::open(array('url' => 'password/email', 'method' => 'post', 'class'=>'form-horizontal')) !!}



    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="email">                                        
                                    </div>
                                                        




                                <div style="margin-top:10px" class="input-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                     {!! Form::submit('Login', array('class'=>'btn btn-success btn-lg"'))!!}
             

                                    </div>
                                </div>


  
                           {!! Form::close() !!}   



                        </div>                     
                    </div>  
        </div>


