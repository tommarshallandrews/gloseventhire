




@if (!Auth::User('email'))
@include('masters.unregistered') 
@else
@include('masters.header') 
@endif

 <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">   


@if(Session::has('message'))
                        <div style="display" id="login-alert" class="alert alert-success col-sm-12">{{ Session::get('message') }}</div>
@endif 


    @if (Session::has('error'))
        <div style="display" id="login-alert" class="alert alert-warning col-sm-12">{{ Session::get('error') }}</div>
    @elseif (Session::has('status'))
        <div style="display" id="login-alert" class="alert alert-success col-sm-12">{{ Session::get('status') }}</div>
    @endif



            <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title">Resend your email validation message to:</div>
                     
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >







                            
                     {!! Form::open(array('url'=>'users/resend', 'class'=>'form-horizontal', 'id'=>'signupform', 'role'=>'form')) !!}

                    
                                @if (!Auth::User('email'))
                                <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="Email">                                        
                                    </div>
                                @else
                                <h2>{{Auth::User()->email}}</h2>
                                @endif
                                
 
                                    

                                
   


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                     {!! Form::submit('Reseend', array('class'=>'btn btn-success'))!!}
                    

                                    </div>
                                </div>


 
                           {!! Form::close() !!}   



                        </div>                     
                    </div>  
        </div>


 @include('masters.footerNoMenu') 




















