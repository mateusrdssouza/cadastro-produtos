<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div id="app">

		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/') }}">
					{{ config('app.name', 'Laravel') }}
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav me-auto">
						@auth
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="dropdown-product" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Produtos
								</a>
								<ul class="dropdown-menu dropdown-menu" aria-labelledby="dropdown-product">
									<li><a class="dropdown-item" href="{{ route('product.create') }}">Cadastro</a></li>
									<li><a class="dropdown-item" href="{{ route('product.index') }}">Listagem</a></li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="dropdown-tag" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Tags
								</a>
								<ul class="dropdown-menu dropdown-menu" aria-labelledby="dropdown-tag">
									<li><a class="dropdown-item" href="{{ route('tag.create') }}">Cadastro</a></li>
									<li><a class="dropdown-item" href="{{ route('tag.index') }}">Listagem</a></li>
								</ul>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('report') }}">Relatório</a>
							</li>
						@endauth
					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ms-auto">
						<!-- Authentication Links -->
						@guest
							@if (Route::has('login'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('login') }}">Login</a>
								</li>
							@endif

							@if (Route::has('register'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('register') }}">Cadastro</a>
								</li>
							@endif
						@else
							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }}
								</a>

								<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</div>
							</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>

		<main class="py-4">
			@yield('content')
		</main>

	</div>
</body>
</html>
