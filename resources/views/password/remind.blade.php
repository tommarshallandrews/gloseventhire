@include('masters.header')

@include('masters.navigation')


 <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">   




 @if(Session::has('message'))
<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>{{ Session::get('message') }}</strong> 
</div>
@endif 

    @if (Session::has('error'))
        <div class="alert alert-error fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>{{ Session::get('message') }}</strong> 
</div>
    @elseif (Session::has('status'))
        <div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>{{ Session::get('message') }}</strong> 
</div>
    @endif



            <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title">Need to reset your password?</div>
                     
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >







                            
                     {!! Form::open() !!}
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="Email">                                        
                                    </div>
                                
 
                                    

                                
   


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                     {!! Form::submit('Reset', array('class'=>'btn btn-success'))!!}
                    

                                    </div>
                                </div>


 
                           {!! Form::close() !!}   



                        </div>                     
                    </div>  
        </div>


 @include('masters.footer') 



















