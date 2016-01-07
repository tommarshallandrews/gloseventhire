 @include('masters.header') 


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
            <h3>Strings in your workshop</h3>
          </div>
          


<!-- list open makes  -->
@foreach($makesOpen as $makeOpen)
<div class="box-wrapper">

              <?php
              $beads = explode(',', $makeOpen->full_string);
              $real_length = ($makeOpen->real_length) * 2.5;
              ?>



				<a href="{{url('workshop', $secure = null);}}/{{$makeOpen->id}}" class="btn btn-sm btn-success pull-right"> edit </a>
               <span class="h4">{{ $makeOpen->name }}</span> <span class="grey">Created {{ $makeOpen->updated_at }}</span>



            <div class="holder" style="height: 50px; overflow: hidden;">
              <ul class="copy">
                <li class=f2{{ $makeOpen->finding_id }}></li>
                  @foreach($beads as $bead)
                    <li class=b{{ $bead }}></li>
                  @endforeach
                 <li class=f3{{ $makeOpen->finding_id }}></li>
              </ul>
          </div>
          

</div>
 @endforeach
<!-- end list open makes  -->


     </div>    


<div class="col-sm-3">
@if($ordersOpen->first())
      
      	<h3><a href="{{url()}}/orders/open"><span class="glyphicon glyphicon-shopping-cart"></span> Open cart</a></h3>
        <div class="box-wrapper">
        	@foreach($ordersOpen as $orderOpen)
        	<a href="{{url()}}/orders/open" class="btn btn-sm btn-info pull-right">View</a>{{$orderOpen->updated_at}} 
        	@endforeach

        </div>
@endif  

@if($ordersPaid->first())
        <h3><span class="glyphicon glyphicon glyphicon-send"></span> <a href="{{url()}}/orders/paid"> Paid orders</a></h3>

		@foreach($ordersPaid as $orderPaid)
        	<div class="box-wrapper">
        		<span class="btn btn-sm btn-info pull-right">View</span>{{$orderPaid->updated_at}} 
        	</div>
		@endforeach

@endif  

@if($ordersComplete->first())
<h3><span class="glyphicon glyphicon glyphicon-check"></span> <a href="{{url()}}/orders/complete"> Completed orders<a/></h3>
        <div class="box-wrapper">
        	@foreach($ordersComplete as $orderComplete)
        	<span class="btn btn-sm btn-info pull-right ">View</span>{{$orderComplete->updated_at}} 
        	@endforeach

        </div>
@endif  
      <a href="{{url('addresses', $secure = null);}}" class="col-sm-12 btn btn-info btn-lg top-buffer"><span class="glyphicon glyphicon glyphicon-home"></span> &nbsp;Addresses</a>

      <a href="{{url('cards', $secure = null);}}" class="col-sm-12 btn btn-info btn-lg top-buffer"><span class="glyphicon glyphicon glyphicon-credit-card"></span> &nbsp;Bank Cards</a>

      </div>
</div>

</div>



    
<!-- end of three -->


  </div>

<!-- end list open makes  -->

 @include('masters.footerNoMenu') 


               

        