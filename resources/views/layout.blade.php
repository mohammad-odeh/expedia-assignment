<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Webpage">
    <head>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="{{ url('/js/main.js') }}"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<script src="{{ url('/js/main.js') }}"></script>
		<link href="{{ url('/css/main.css') }}" rel="stylesheet">
	</head>
	<body>
		<div class="main_content">@yield('content')</div>
    </body>
</html>