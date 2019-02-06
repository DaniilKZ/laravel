<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="position:relative;margin-bottom: 40px;">
			<a class="navbar-brand" href="/laravel/admin-panel">Админ-Панель</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="/laravel/admin-panel">Все города</a>
					</li> 
					<li class="nav-item active">
						<a class="nav-link" href="/laravel/admin-panel/destination">Куда </a>
					</li> 
					<li class="nav-item active">
						<a class="nav-link" href="/laravel/admin-panel/origin">От куда</a>
					</li> 
					<li class="nav-item">
						<a class="nav-link" href="/laravel">Вернуться на сайт</a>
					</li> 
				</ul> 
			</div>
		</nav>

	<div class="container"> 
		<div class="row">
			@include('admin.pages.message.msg')
			@yield('content')
		</div>
	</div>
</body>
</html>