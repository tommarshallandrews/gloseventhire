<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Professional hire of catering equipment for all your event needs">
    <meta name="keywords" content="catering, event hire, {{ $getMeta->keywords() }}">
    <META name="Robots" Content="index, FOLLOW">
    <meta name="author" content="Marshall Andrews Ltd">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{Config::get('app.companyName')}} {{ $getMeta->title() }}</title>

    <script src="{{URL::to('/')}}/assets/js/jquery.min.js"></script>

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="{{URL::to('/')}}/assets/plugins/animate/animate.css" rel="stylesheet">

    <!-- CSS Global -->
    <link href="{{URL::to('/')}}/css/styles.css" rel="stylesheet">

        <!-- CSS gLOS -->
    <link href="{{URL::to('/')}}/css/glos.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">


    <link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" rel="stylesheet">


    <script type="text/javascript"
    src="http://maps.google.com/maps/api/js?sensor=false">
</script>

<script type="text/javascript">
  function initialize() {
    var position = new google.maps.LatLng(51.867277, -2.330254);
    var myOptions = {
      zoom: 10,
      center: position,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(
        document.getElementById("map_canvas"),
        myOptions);
 
    var marker = new google.maps.Marker({
        position: position,
        map: map,
        title:"This is the place."
    });  
 
    var contentString = 'Gloucester Events Hire';
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
 
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });
 
  }
 
</script>



  </head>

<body onload="initialize()">