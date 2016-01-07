
<!DOCTYPE HTML>
<html>
<head>

<meta charset="utf8">
<meta name="publishable-key" content="{{ Config::get('stripe.publishable_key') }}">
</head>

<body>

<div class="container">

@yield('content')

</div>

@yield('footer')


</body>
</html>







