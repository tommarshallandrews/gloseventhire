


 <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">     

</div>


<div class="container">

    <div class="row">
      <div class="col-sm-12">

			@if (Session::has('message'))
   				<div class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</div>
			@endif


      </div>
    </div> 


    <div class="row">
      <div class="col-sm-8">
          <div class="chart-title">
            <h3>Previous quotes</h3>
          </div>
        

<!-- list open makes  -->
@foreach($orders as $order)
<div class="box-wrapper">

				
               <span class="h4"></span> <span class="grey">ORDER {{ $order->id }} - Created {{ $order->updated_at }}  <a href="{{ url('/quote') }}/{{ $order->id }}"> view / edit </a></span>
          
</div>
 @endforeach
<!-- end list open makes  -->

</div>    


    
<!-- end of three -->


  </div>
 </div>
  </div>
