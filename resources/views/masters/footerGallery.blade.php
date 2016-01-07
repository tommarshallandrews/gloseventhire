



<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
    <!-- Your Footer Content -->



<div class="container">
 


	
	

<div id="footer_higher">
	<div id="footer_content">






@if (isset($make->id))



<div id="beadSlider"><ul class=drag><?php
  foreach($stock as $item)
      echo "<li class=b$item->id ui-draggable><input type=hidden name=bead_id[] value=$item->id><div class=price>£0.$item->price</div></li>";
?></ul></div>


<ul class=drag>
<?php
  foreach($stockFindings as $findingItem)
   //  echo "<li class=f1$findingItem->id ui-draggable><input type=hidden name=finding_id[] value=$findingItem->id><div class=price>£0.$findingItem->price</div></li>";
?>
</ul>
@endif



		<div class="clear"></div>
	</div>
</div>


 <div id="footer">
      <div class="container">


<div class="holder">

<!-- {{ $gallery = Session::get('gallery') }}
{{ $colour = Session::get('colour') }}  
{{ $zodiac = Session::get('zodiac') }}   -->
	  
	  
        <p class="text-muted credit">
            
    <div class="btn-group" > 
      
      <?php if (Session::get('colour')){ ?>
          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
          
        <?php
        echo Session::get('colour');
      } else {
        ?>
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
         Colour
        <?php
      }
      ?>

          
          
       


      <span class="caret caret-up"></span> </button>
      <ul class="dropdown-menu drop-up" role="menu">
  <?php
    echo "<li><a href='" . URL::to('/') . "/gallery/$gallery/0/$zodiac/$type/$shape/$size'>All</a></li>";
    echo "<li class=''divider'></li>";

  foreach($beadColours as $beadColour)

    echo "<li><a href='" . URL::to('/') . "/gallery/$gallery/$beadColour->name/$zodiac/$type/$shape/$size'>$beadColour->name</a></li>";
  if ($beadColour->name = "silver"){
    echo "<li class='divider'></li>";
  }
  ?>
    </ul>
    </div>
            

    <div class="btn-group"> 
        <?php if (Session::get('zodiac')){ ?>
          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
          
        <?php
        echo Session::get('zodiac');
      } else {
        ?>
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
         Birth sign
        <?php
      }
      ?>
     <span class="caret caret-up"></span> </button>

      <ul class="dropdown-menu drop-up" role="menu">
      
    <?php
    echo "<li><a href='" . URL::to('/') . "/gallery/$gallery/$colour/0/$type/$shape/$size'>All</a></li>";
  foreach($beadZodiacs as $beadZodiac)
    echo "<li><a href='" . URL::to('/') . "/gallery/$gallery/$colour/$beadZodiac->name/$type/$shape/$size'>$beadZodiac->name</a></li>";
  ?>
    </ul>
    </div>




    <div class="btn-group"> 
        <?php if (Session::get('type')){ ?>
          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
          
        <?php
        echo Session::get('type');
      } else {
        ?>
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
         Type
        <?php
      }
      ?>
     <span class="caret caret-up"></span> </button>

      <ul class="dropdown-menu drop-up" role="menu">
      
    <?php
    echo "<li><a href='" . URL::to('/') . "/gallery/$gallery/$colour/$zodiac/0/$shape/$size'>All</a></li>";
  foreach($beadTypes as $beadType)
    echo "<li><a href='" . URL::to('/') . "/gallery/$gallery/$colour/$zodiac/$beadType->name/$shape/$size'>$beadType->name</a></li>";
  ?>
    </ul>
    </div>








    <div class="btn-group"> 
        <?php if (Session::get('shape')){ ?>
          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
          
        <?php
        echo Session::get('shape');
      } else {
        ?>
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
         Shape
        <?php
      }
      ?>
     <span class="caret caret-up"></span> </button>

      <ul class="dropdown-menu drop-up" role="menu">
      
    <?php
    echo "<li><a href='" . URL::to('/') . "/gallery/$gallery/$colour/$zodiac/$type/0/$size'>All</a></li>";
  foreach($beadShapes as $beadShape)
    echo "<li><a href='" . URL::to('/') . "/gallery/$gallery/$colour/$zodiac/$type/$beadShape->name/$size'>$beadShape->name</a></li>";
  ?>
    </ul>
    </div>


         






            
  


@if (isset($make->id))
    &nbsp&nbsp|&nbsp&nbsp


            
    <div class="btn-group"> 
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> 
      Order by <span class="caret caret-up"></span> </button>
      <ul class="dropdown-menu drop-up" role="menu">

        <li><a href="{{URL::to('/')}}/galleryorder/order/match/asc" @if($_SESSION["order"] == 'match')selected="selected"@endif >Best match</a></li>
        <li><a href="{{URL::to('/')}}/galleryorder/order/votes/desc" @if($_SESSION["order"] == 'votes')selected="selected"@endif >Most liked</a></li>
        <li><a href="{{URL::to('/')}}/galleryorder/order/updated_at/desc" @if($_SESSION["order"] == 'updated_at')selected="selected"@endif >Most recent</a></li>
        <li><a href="{{URL::to('/')}}/galleryorder/order/price/asc" @if($_SESSION["order"] == 'price')selected="selected"@endif >Price - Low to high</a></li>
        <li><a href="{{URL::to('/')}}/galleryorder/order/price/desc" @if($_SESSION["order"] == 'price')selected="selected"@endif >Price - High to low</a></li>
        <li><a href="{{URL::to('/')}}/galleryorder/order/diameter/asc" @if($_SESSION["order"] == 'diameter')selected="selected"@endif >Bead diameter - Low to high</a></li>
        <li><a href="{{URL::to('/')}}/galleryorder/order/diameter/desc" @if($_SESSION["order"] == 'diameter')selected="selected"@endif >Bead diameter - High to low</a></li>

      </ul>
    </div>


  <div class="btn-group"> 
    {{($_SESSION["order"])}}
    {{($_SESSION["direction"])}}
  <form class="navbar-form" role="search" id="footer-form">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search" name="srch-term" id="footerSearch">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
    </form>


  </div>  
      
@endif
        </p>
      </div>
    </div>
    </div>
    </div>


</nav>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->



  </body>
  
  

  


<script src="{{URL::to('/')}}/js/jquery.confirm.js"></script>
<script src="{{URL::to('/')}}/js/bootswatch.js"></script>
<script src="{{URL::to('/')}}/js/bootstrap.min.js"></script>
<script src="{{URL::to('/')}}/js/jquery-ias.min.js"></script>
 



@yield("footer")



</html>