<!DOCTYPE html>
<html>
<head>
	<title>@yield('titulo')</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

</head>
<body>
	@yield('contenido')

	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>