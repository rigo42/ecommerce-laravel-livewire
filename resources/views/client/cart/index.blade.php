@extends('client.layouts.main')

@section('title', 'Carrito')

@section('head')
    
@endsection

@section('content')

    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('client.home.index') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Carrito</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="container">
        <div class="page-header page-header-big text-center" style="background-image: url('https://dominusochoa.com/public/assets/client2/images/Carrito.jpg')">
            <h1 class="page-title text-white">Carrito</h1>
        </div><!-- End .page-header -->
    </div><!-- End .container -->

    @livewire('client.cart.index')
@endsection