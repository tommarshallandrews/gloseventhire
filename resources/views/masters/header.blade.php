  <!DOCTYPE html>



  <html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Rock on Silver</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="publishable-key" content="{{ Config::get('stripe.publishable_key') }}">








<?php

// check which stock css to load


if(strpos(Request::path(),'gallery') !== false) {
echo(HTML::style('stock_css_gallery'));
} elseif (Request::path() == 'orders/open' || Request::path() == 'orders/paid' || Request::path() == 'orders' || Request::path() == 'dashboard'  ){
echo(HTML::style('stock_css_small'));
} else {
echo(HTML::style('stock_css.css'));
}
?>



    {{ HTML::style('css/bootswatch.min.css')}}
    {{ HTML::style('css/bootstrap.css')}}
    {{ HTML::style('css/workshop.css')}}
    {{ HTML::style('css/jquery.mCustomScrollbar.css')}}
    {{ HTML::style('css/styles.css')}}

    <link href='http://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('js/jquery-ui.min.js') }}







<script type="text/javascript">
        jQuery(function( $ ) {
            //var slide = false;
            var height = $('#footer_content').height();
            $('.footer_button').click(function() {
                // var docHeight = $(document).height();
                //var windowHeight = $(window).height();
                //var scrollPos = docHeight - windowHeight + height;
                $('#footer_higher').animate({ height: 200}, 500, function() {
                    $(this).css('overflow', 'visible');
                    window.updateScrollPosition();
                });
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
        jQuery(function( $ ) {
            $(".dropdown-toggle").mousedown(function() {
                $('#footer_higher')
                        .css('overflow', 'hidden')
                        .animate({ height: 0}, 200);
            });
        });
    </script>

    <script type='text/javascript'>//<![CDATA[
/*    $(window).load(function() {

        var outer = document.getElementById('mydiv').offsetWidth
        var inner = document.getElementById('im').offsetWidth;
        console.log(inner);
        $('.scrolls').scrollLeft((inner - outer) / 2)

    });*///]]>

    </script>




<?php
  if (empty(Auth::user()->email)) {
?>
<script type='text/javascript'>//<![CDATA[ 
  $(window).bind('beforeunload', function(){
  return 'This string is not saved as you don''t have an account Are you sure you want to leave?';
});

</script>

<?php
  }
?>

 

<script type="text/javascript">
$(window).load(function() {
 if ({{ Session::has('modalMessage') }}) {
        //JavaScript code that open up your modal.
        $('#modalMessage').modal('show');
      }
    });
</script>


@include('modals.message')


  									   
  								   
    </head>

    <body>





      <!-- Part 1: Wrap all page content here 
      removed this <div id="wrap">-->

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
                  
                  
                  <li role="presentation" class="dropdown-header">In progress</li>
                  @foreach($userMakes as $userMake)
                  <li>{{ HTML::linkRoute('workshop.show', $userMake->name, $userMake->id) }}</li>
                  @endforeach

                  </li>
                  <li role="presentation" class="divider"></li>


          
          @if(Auth::check())

              <!-- logged in user create new string  -->
          <li>{{ HTML::linkRoute('makes.create', 'New string') }}</li>

          @else
          <!-- gallery viewing user to become unregierered user  -->
          <li>{{ HTML::linkRoute('makes.create', 'Create your own string') }}</li>
          @endif
                 
                  <li class="dropdown-submenu"><a href="#">Zoom</a>

                      <ul class="dropdown-menu">
                        <li><a href="{{URL::to('/')}}/users/scale/50">50</a></li>
                        <li><a href="{{URL::to('/')}}/users/scale/60">60</a></li>
                        <li><a href="{{URL::to('/')}}/users/scale/70">70</a></li>
                       <li><a href="{{URL::to('/')}}/users/scale/80">80</a></li>
                       <li><a href="{{URL::to('/')}}/users/scale/90">90</a></li>
                       <li><a href="{{URL::to('/')}}/users/scale/100">100</a></li>
                       <li><a href="{{URL::to('/')}}/users/scale/120">120</a></li>
                        <li><a href="{{URL::to('/')}}/users/scale/150">150</a></li>
                      </ul>
                      
                </li>


                <li class="dropdown-submenu"><a href="#">Background</a>

                      <ul class="dropdown-menu">
                        <li><a href="{{URL::to('/')}}/users/swatchcolour/white">White</a></li>
                        <li><a href="{{URL::to('/')}}/users/swatchcolour/greyLight">Light Grey</a></li>
                        <li><a href="{{URL::to('/')}}/users/swatchcolour/greyDark">Dark Grey</a></li>
                       <li><a href="{{URL::to('/')}}/users/swatchcolour/black">Black</a></li>
                       <li role="presentation" class="divider"></li>
                       <li><a href="{{URL::to('/')}}/users/swatchcolour/skinLight">Light Skin</a></li>
                       <li><a href="{{URL::to('/')}}/users/swatchcolour/skinMedium">Medium Skin</a></li>
                       <li><a href="{{URL::to('/')}}/users/swatchcolour/skinDark">Dark Skin</a></li>
                       <li><a href="{{URL::to('/')}}/users/swatchcolour/skinBlack">Black Skin</a></li>
 
                      </ul>
                      
                </li>
                


                </ul>
              </li>



              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Gallery<span class="caret"></span></a>
                <ul class="dropdown-menu" aria-labelledby="themes">

                  @if (isset(Auth::user()->email))
                  <li>{{ HTML::linkRoute('gallery.show', 'My private gallery', array('private','0','0','0','0','0')) }}</li>
                  <li>{{ HTML::linkRoute('gallery.show', 'My public gallery', array('mypublic','0','0','0','0','0')) }}</li>
                  @endif
                  <li>{{ HTML::linkRoute('gallery.show', 'Public Gallery', array('public','0','0','0','0','0')) }}</li>
                  



                 @if(Auth::check())
                  <li class="dropdown-submenu"><a href="#">Zoom</a>

                      <ul class="dropdown-menu">
                        <li><a href="{{URL::to('/')}}/users/galleryscale/50">50</a></li>
                        <li><a href="{{URL::to('/')}}/users/galleryscale/60">60</a></li>
                        <li><a href="{{URL::to('/')}}/users/galleryscale/70">70</a></li>
                       <li><a href="{{URL::to('/')}}/users/galleryscale/80">80</a></li>
                       <li><a href="{{URL::to('/')}}/users/galleryscale/90">90</a></li>
                       <li><a href="{{URL::to('/')}}/users/galleryscale/100">100</a></li>
                       <li><a href="{{URL::to('/')}}/users/galleryscale/120">120</a></li>
                        <li><a href="{{URL::to('/')}}/users/galleryscale/150">150</a></li>
                      </ul>
                      
                </li>

                <li class="dropdown-submenu"><a href="#">Background</a>

                      <ul class="dropdown-menu">
                        <li><a href="{{URL::to('/')}}/users/gallerycolour/white">White</a></li>
                        <li><a href="{{URL::to('/')}}/users/gallerycolour/greyLight">Light Grey</a></li>
                        <li><a href="{{URL::to('/')}}/users/gallerycolour/greyDark">Dark Grey</a></li>
                       <li><a href="{{URL::to('/')}}/users/gallerycolour/black">Black</a></li>
                       <li role="presentation" class="divider"></li>
                       <li><a href="{{URL::to('/')}}/users/gallerycolour/skinLight">Light Skin</a></li>
                       <li><a href="{{URL::to('/')}}/users/gallerycolour/skinMedium">Medium Skin</a></li>
                       <li><a href="{{URL::to('/')}}/users/gallerycolour/skinDark">Dark Skin</a></li>
                       <li><a href="{{URL::to('/')}}/users/gallerycolour/skinBlack">Black Skin</a></li>
 
                      </ul>
                      
                </li>
                @endif

                </ul>
              </li>
            </ul>









        @if (isset(Auth::user()->email))
        <ul class="nav navbar-nav navbar-right">
          @if (isset($ordersOpen->id))
          <li ><a href="{{ URL::to('orders/open') }}"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
          @endif
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">

  

                  Signed in as {{ Auth::user()->username }}<span class="caret"></span></a>
                <ul class="dropdown-menu" aria-labelledby="themes">
                  
                  

              @if(!Auth::check())
              <li>{{ HTML::link('users/register', 'Register') }}</li>   
              <li>{{ HTML::link('users/login', 'Login') }}</li>   
              @else
              <li><a href="{{ URL::to('users/dashboard') }}/{{ Auth::user()->id  }}">Dashboard</a></li>
              <li class="divider"></li>
              <li role="presentation" class="dropdown-header">Your account</li>
              <li><a href="{{ URL::to('users/edit') }}/{{ Auth::user()->id  }}">Your details</a></li>
              <li>{{ HTML::link('addresses', 'Addresses') }}</li>
              <li>{{ HTML::link('cards', 'Cards') }}</li>
              <li class="divider"></li>
              <li role="presentation" class="dropdown-header">Orders</li>
              <li>{{ HTML::link('orders/paid', 'Confirmed') }}</li>
              <li>{{ HTML::link('orders/complete', 'Completed') }}</li>
              <li class="divider"></li>
              <li>{{ HTML::link('users/logout', 'logout') }}</li>
              @endif
                </ul>
              </li>
            </ul>
        @endif

      @if(Auth::check())
          @if (!isset(Auth::user()->email))
            <p class="navbar-text navbar-right">You have a temporary account. To save or buy this you need to 
              <a href="#" data-toggle="modal" data-target="#newUserModal"> Register </a> 
              or <a href="#"  data-toggle="modal" data-target="#loginModal">login</a>
            </p>
            
           @endif
      @endif

          </div>
        </div>
  	  

  	  
      </div>
