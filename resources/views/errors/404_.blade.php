<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Page Not Found | mycoupons.hk</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Muli:400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/404_css.css') }}" />

</head>

<body>

	<div id="notfound">
		<div class="notfound-bg"></div>
		<div class="notfound">
			<div class="notfound-404">
				<h1>404</h1>
			</div>
			<h2>Oops! Page Not Found</h2>
			<form method='GET'  action="{{ route('home.search') }}" class="notfound-search">
				<input type="text" name='coupon' placeholder="cerca i coupon eBay, Amazon..." autocomplete="off">
				<button type="submit">Search</button>
			</form>
			<a href="{{ route('home.index') }}">Back To Home</a>
		</div>
	</div>
</body>
</html>