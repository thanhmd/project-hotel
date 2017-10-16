<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<base href="{{ asset('') }}">
    <title>My Hotel | @yiel('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="front_assets/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="front_assets/css/shop-homepage.css" rel="stylesheet">
    <link href="front_assets/css/my.css" rel="stylesheet">
    <link rel="stylesheet" href="front_assets/css/style.css">
	@yield("css")
</body>
</head>

<body>

    <!-- Navigation -->
     @include("layouts.header")

	
		
    {{-- @yield("content") --}}
    
    <!-- end Page Content -->
	@include("layouts.footer")
    <!-- Footer -->
    
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="front_assets/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="front_assets/js/bootstrap.min.js"></script>
    <script src="front_assets/js/my.js"></script>
	@yield("script")
</body>

</html>
