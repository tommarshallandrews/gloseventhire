


<nav class="footer-navbar navbar navbar-default navbar-fixed-bottom" role="navigation">


 
    <!-- Your Footer Content -->

    <div id="footer_higher">
        <div id="footer_content">
            <div class="slider_wrapper">
                <div class="slider_container">
                    <ul id="beadSlider" class='items-list cf'>


                      
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="footer">
        <div class="container">
            <div class="holder">
                <p class="text-muted credit">

                      <div class="btn-group" > 
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
      Colour <span class="caret caret-up"></span> </button>
      <ul class="dropdown-menu drop-up" role="menu" >
<?php

  foreach($beadColours as $beadColour){
    echo "<li class='colour_id' id='$beadColour->id'><a href='#' class='footer_button' data-content-id='2'>$beadColour->name</a></li>";
        if ($beadColour->id == 0){
          echo "<li class='divider'></li>";
        }
       } 

?>
      </ul>
    </div>





            
    <div class="btn-group"> 
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
      Stone <span class="caret caret-up"></span> </button>
      <ul class="dropdown-menu drop-up" role="menu">
  <?php
  foreach($beadTypes as $beadType)
    echo "<li class='type_id' id='$beadType->id'><a href='#' class='footer_button'>$beadType->name</a></li>";
  ?>
  <li class='divider'></li>
  
  <li class="type_id" id="5"><a href="#" class="footer_button">Sterling Silver</a></li>
      </ul>
    </div>





        <div class="btn-group"> 
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
      Birth month <span class="caret caret-up"></span> </button>
      <ul class="dropdown-menu drop-up" role="menu">
<?php
  foreach($beadMonths as $beadMonth)
    echo "<li class='month_id' id='$beadMonth->id'><a href='#' class='footer_button'>$beadMonth->name</a></li>";
?>
      </ul>
    </div>


    <div class="btn-group"> 
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
      Zodiac <span class="caret caret-up"></span> </button>
      <ul class="dropdown-menu drop-up" role="menu">
<?php
  foreach($beadZodiacs as $beadZodiac)
    echo "<li class='zodiac_id' id='$beadZodiac->id'><a href='#' class='footer_button'>$beadZodiac->name</a></li>";
?>
      </ul>
    </div>





    
            
    <div class="btn-group"> 
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
      Shape <span class="caret caret-up"></span> </button>
      <ul class="dropdown-menu drop-up" role="menu">
  <?php
  foreach($beadShapes as $beadShape)
    echo "<li class='shape_id' id='$beadShape->id'><a href='#' class='footer_button'>$beadShape->name</a></li>";
  ?>
      </ul>
    </div>
            
    <div class="btn-group"> 
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> 
      Width <span class="caret caret-up"></span> </button>
      <ul class="dropdown-menu drop-up" role="menu">
        <li class='size_id' id='1'><a href='#' class='footer_button'>1mm</a></li>
        <li class='size_id' id='2'><a href='#' class='footer_button'>2mm</a></li>
        <li class='size_id' id='3'><a href='#' class='footer_button'>3mm</a></li>
        <li class='size_id' id='4'><a href='#' class='footer_button'>4mm</a></li>
        <li class='size_id' id='5'><a href='#' class='footer_button'>5mm</a></li>
        <li class='size_id' id='6'><a href='#' class='footer_button'>6mm</a></li>
        <li class='size_id' id='7'><a href='#' class='footer_button'>7mm</a></li>
        <li class='size_id' id='8'><a href='#' class='footer_button'>8mm</a></li>
        <li class='size_id' id='9'><a href='#' class='footer_button'>9mm</a></li>
        <li class='size_id' id='10'><a href='#' class='footer_button'>10mm (and over)</a></li>
      </ul>
    </div>
            
    <div class="btn-group"> 
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> 
      Wellbeing <span class="caret caret-up"></span> </button>
      <ul class="dropdown-menu drop-up" role="menu">
  <?php
  foreach($beadBenefits as $beadBenefit)
    echo "<li class='benefit_id' id='$beadBenefit->id'><a href='#' class='footer_button'>$beadBenefit->name</a></li>";
  ?>
      </ul>
    </div>       

            
    <div class="btn-group"> 
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> 
      Findings <span class="caret caret-up"></span></button>
      <ul class="dropdown-menu drop-up" role="menu">
<?php
  foreach($findingMechanisms as $findingMechanism)
    echo "<li class='mechanism_id' id='$findingMechanism->id'><a href='#' class='footer_button'>$findingMechanism->name</a></li>";
?>
      </ul>
    </div>
        



                </p>
            </div>
        </div>
    </div>
</nav>
</div>
</div>
</div>

<!-- Le javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->


<!--<script src="js/jquery.confirm.js"></script>-->
<script src="{{URL::to('/')}}/js/bootstrap.min.js"></script>
<script src="{{URL::to('/')}}/js/bootswatch.js"></script>
<script src="{{URL::to('/')}}/js/jquery.mousewheel.min.js"></script>
<script src="{{URL::to('/')}}/js/vendor/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{URL::to('/')}}/js/scripts.js"></script>



@yield("footer")


</body>
</html>