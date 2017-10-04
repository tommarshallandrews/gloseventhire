

 @include('masters.header') 

@include('masters.navigation')

<!-- Google Code for Registration Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1067690033;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "GNZzCND_8nIQsdCO_QM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1067690033/?label=GNZzCND_8nIQsdCO_QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<div class="container">
 <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title">Thanks for registering!</div>

                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                                 <br>
                                 @if(session::has('order'))
                                 It looks like you were placing an order.<br><br>
                                 <a href="{{ url('/') }}/quote/{{session::get('order')}}" type="button" class="btn btn-success">Go to my order</a><br><br>
                                 @else
                                 Click on the items above to start creating an order.<br><br>
                                 <a href="{{ url('/') }}/users/dashboard" type="button" class="btn btn-info">Go to my account</a>
                                 @endif

                        </div>                     
                    </div>  
        </div>
  </div>      

 @include('masters.footer')