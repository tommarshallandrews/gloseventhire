
@include('masters.header')

@include('masters.navigation')

@include('userCheck')



<div class="container">

    <div class="row">
      <div class="col-sm-12">
    
    @if(!Auth::user()->confirmed && Session::get('messageType') != 'validate')
      <div class="alert alert-danger">It looks like you've registered but not validated your email address. <br><br> Please check you emails for the validation request or request it again <a href="{{URL::to('/users/resend')}}">here</a>.
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </div>
    @endif 

			@if (Session::has('message'))
   				<div class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          </div>
			@endif


      </div>
    </div> 


<div class="row">
      

<div class="col-sm-4">
          <div class="chart-title">
            <h3>Previous quotes</h3>
          </div>
        

<!-- list open makes  -->
@foreach($orders as $order)
<div class="box-wrapper">


<div class="checkout-cart__item">

                <div class="checkout-cart-item__content">
                  
                  <div class="checkout-cart-item__heading pull-left">
                   <h4> ORDER {{ $order->id }}</h4>
                  
                  Date Created : {{ $order->updated_at }} <br>
                  Postcode: {{ $order->postcode }}
                </DIV>

                    <div class="input_qty input_qty_sm pull-right">
                      <a href="{{ url('/quote') }}/{{ $order->id }}" class="btn btn-info" role="button">View</a>
                    </div>
                    <div class="clearfix"></div>

                </div>
              </div>

</div>

<div class="spacer10"></div>

 @endforeach
<!-- end list open makes  -->
<div class="spacer10"></div>
<div class="spacer10"></div>
<a href="{{ url('/quote/new') }}" class="btn btn-success" role="button">Start a new quote</a>
<div class="spacer10"></div>
<div class="spacer10"></div>
<a href="{{ url('/users/logout') }}" class="btn btn-danger" role="button">Logout </a>


</div>    


<!-- end of three -->


  
 
<!-- details form three -->
<div class="col-sm-8">

                                {!! Form::open(array('url'=>'users/update', 'class'=>'form-horizontal', 'id'=>'signupform', 'role'=>'form')) !!}

                                <div class="form-group">
                                    <div for="email" class="col-md-3 control-label"></div>
                                    <div class="col-md-9">
                                        <h3>Your details</h3>
                                    </div>
                                </div>

     

                              

                                
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

 

                                
                              
                             
                                
                                
                            {!! Form::close() !!}




</div>    
<!-- end of details form three -->


</div>
<!-- end of row -->


  </div>




 </div>
  </div>


@include('masters.footer')


