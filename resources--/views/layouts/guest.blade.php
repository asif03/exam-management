<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

	<!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-3.6.0.slim.js"
		integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<style>
		body {
			margin: 0;
			padding: 0;
		}

		.ring {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 150px;
			height: 150px;
			background: transparent;
			border: 3px solid #3c3c3c;
			border-radius: 50%;
			text-align: center;
			line-height: 150px;
			font-family: sans-serif;
			font-size: 20px;
			color: #b32d00;
			letter-spacing: 4px;
			text-transform: lowercase;
			text-shadow: 0 0 10px #b32d00;
			box-shadow: 0 0 20px rgba(0, 0, 0, .5);
		}

		.ring:before {
			content: '';
			position: absolute;
			top: -3px;
			left: -3px;
			width: 100%;
			height: 100%;
			border: 3px solid transparent;
			border-top: 3px solid #fff000;
			border-right: 3px solid #fff000;
			border-radius: 50%;
			animation: animateC 2s linear infinite;
		}

		span {
			display: block;
			position: absolute;
			top: calc(50% - 2px);
			left: 50%;
			width: 50%;
			height: 4px;
			background: transparent;
			transform-origin: left;
			animation: animate 2s linear infinite;
		}

		span:before {
			content: '';
			position: absolute;
			width: 16px;
			height: 16px;
			border-radius: 50%;
			background: #fff000;
			top: -6px;
			right: -8px;
			box-shadow: 0 0 20px #fff000;
		}

		@keyframes animateC {
			0% {
				transform: rotate(0deg);
			}

			100% {
				transform: rotate(360deg);
			}
		}

		@keyframes animate {
			0% {
				transform: rotate(45deg);
			}

			100% {
				transform: rotate(405deg);
			}
		}
	</style>
</head>

<body>
	<header>
		<div class="px-3 py-2 bg-primary bg-gradient text-white">
			<div class="container">
				<div class="d-flex flex-wrap align-items-start justify-content-start justify-content-lg-start">
					<a href="/" class="d-flex align-items-center my-2 px-2 my-lg-0 text-white text-decoration-none">
						<img class="bi me-2" src="{{ asset('images/bcps.png') }}" alt="BCPS" width="60" height="42" />
					</a>
					<h1>Bangladesh College of Physicians & Surgeons</h1>
				</div>
			</div>
		</div>
	</header>
	<main>
		@yield('content')
	</main>
	<footer class="px-3 bg-primary bg-gradient text-white">
		<div class="container d-flex justify-content-between justify-content-lg-between">
			<p class="mt-1 mb-1">Copyright &copy;
				<?php echo date('Y'); ?>, Bangladesh College of Physicians and Surgeons, All rights reserved.
			</p>
			<p class="mt-1 mb-1">Design & Developed By: IT Wing, BCPS</p>
		</div>
	</footer>
</body>

</html>