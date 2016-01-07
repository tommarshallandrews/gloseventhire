<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Rock on Silver</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- CSS -->
    {{URL::to('/')}}css/bootswatch.min.css
    {{URL::to('/')}}css/bootstrap.css
    {{URL::to('/')}}css/workshop.css

    {{URL::to('/')}}css/styles.css
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <link href='http://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>

    {{URL::to('/')}}js/jquery.min.js
    {{URL::to('/')}}js/jquery-ui.min.js


</styles>


<script type="text/javascript">
  jQuery(function($) {
    //var slide = false;
    var height = $('#footer_content').height();
    $('.footer_button').click(function() {
     // var docHeight = $(document).height();
      //var windowHeight = $(window).height();
      //var scrollPos = docHeight - windowHeight + height;
      $('#footer_content').animate({ height: 200}, 500);
      $("#footer_content").show();
      //if(slide == false) {
        //if($.browser.opera) {
         // $('html').animate({scrollTop: scrollPos+'px'}, 400);
       // } else {
        //  $('html, body').animate({scrollTop: scrollPos+'px'}, 400);
        //}
       // slide = true;
      //} else {
       // slide = false;
      //}
    });
  });
</script>


<script type="text/javascript">
  jQuery(function($) {
    $( ".dropdown-toggle" ).mousedown(function() {
      $('#footer_content').animate({ height:0}, 200);
    });
  });
</script>








<script type="text/javascript">
jQuery(function() {
    jQuery('.sort').sortable({
        tolerance: 'pointer',
        cursor: 'pointer',
        dropOnEmpty: true,
        connectWith: '.sort',
        update: function(event, ui) {
            if(this.id == 'sortable-delete') {
                jQuery('#'+ui.item.attr('id')).remove();
            } else {
                // Update code for the actual sortable lists
            }          
        }            
    });

//change name of dragged bead to pendand for storage
    $("#pendant").droppable({
        drop: function(event, ui) {
        //var id = ui.draggable.find('input:hidden').attr("id");
        ui.draggable.find('input:hidden').attr('name', 'pendant_id[]');
      }
    });

});
</script>




<script>
$(document).ready(function(){
  $(".colour_id,.type_id").click(function(){
  var filter = $(this).attr("class"); 
  var pid = $(this).attr("id"); 
   $("#beadSlider").load("{{ URL::to('/') }}/bead/"+ filter + "/"+ pid + "",function(data){
    //  make selector draggable again
        $('.drag > li').draggable({helper:'clone',connectToSortable:'.sort'})
      });
  });
});




</script>


<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){


var outer=document.getElementById('mydiv').offsetWidth
var inner=document.getElementById('im').offsetWidth;
console.log(inner);
$('.scrolls').scrollLeft((inner-outer)/2)
  
 
});//]]>  

</script>







                     
                   
  </head>

  <body>
  



    <!-- Part 1: Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
          <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../" class="navbar-brand logo"></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>



        
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            


             <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Workshop<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                
                
                <li role="presentation" class="divider"></li>


               @if(Auth::check())
                <li class="dropdown-submenu"><a href="#">Zoom</a>

                    <ul class="dropdown-menu">
                     <li><a href="{{ URL::to('/') }}/users/scale/80">80</a></li>
                     <li><a href="{{ URL::to('/') }}/users/scale/90">90</a></li>
                     <li><a href="{{ URL::to('/') }}/users/scale/100">100</a></li>
                     <li><a href="{{ URL::to('/') }}/users/scale/120">120</a></li>
                      <li><a href="{{ URL::to('/') }}/users/scale/150">150</a></li>
                    </ul>
                    
              </li>
              @endif


              </ul>
            </li>



            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Gallery<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">





               @if(Auth::check())
                <li class="dropdown-submenu"><a href="#">Zoom</a>

                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::to('/') }}/users/galleryscale/50">50</a></li>
                        <li><a href="{{ URL::to('/') }}/users/galleryscale/60">60</a></li>
                        <li><a href="{{ URL::to('/') }}/users/galleryscale/70">70</a></li>
                       <li><a href="{{ URL::to('/') }}/users/galleryscale/80">80</a></li>
                       <li><a href="{{ URL::to('/') }}/users/galleryscale/90">90</a></li>
                       <li><a href="{{ URL::to('/') }}/users/galleryscale/100">100</a></li>
                       <li><a href="{{ URL::to('/') }}/users/galleryscale/120">120</a></li>
                        <li><a href="{{ URL::to('/') }}/users/galleryscale/150">150</a></li>
                    </ul>
                    
              </li>
              @endif

              </ul>
            </li>
          </ul>








    <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">You <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">

                <li class="divider"></li>





              </ul>
            </li>
          </ul>


        </div>
      </div>
    

    
    </div>








	   


