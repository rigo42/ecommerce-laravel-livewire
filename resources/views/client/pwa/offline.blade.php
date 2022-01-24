@extends('client.layouts.main')

@section('title', 'Sin conexión')

@section('content')
    <!-- Our Error Page -->
	<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('client.home.index') }}">Inicio</a></li>
				<li class="breadcrumb-item active" aria-current="page">Offline</li>
			</ol>
		</div><!-- End .container -->
	</nav>

	<div class="error-content text-center" style="background-image: url({{ asset('assets/client/img/error-bg.jpg') }})">
		<div class="container">
			<h1 class="error-title">Sin conexión</h1><!-- End .error-title -->
			<p>Lo sentimos, no cuentas con conexión a internet.</p>
			<a href="{{ route('client.home.index') }}" class="btn btn-outline-primary-2 btn-minwidth-lg">
				<span>Reintentar</span>
				<i class="icon-long-arrow-right"></i>
			</a>
		</div><!-- End .container -->
	</div>
@endsection