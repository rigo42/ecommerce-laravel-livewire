@extends('client.layouts.main')

@section('title', 'Productos')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/client/css/plugins/nouislider/nouislider.css') }}">
<style>
    .product-image {
        display: block;
        width: 100%;
        height: 301px;
        object-fit: cover;
    }
</style>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('client.home.index') }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Productos</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->


<div class="page-content">
    @livewire('client.product.index')
</div><!-- End .page-content -->

@endsection

@section('footer')
<script src="{{ asset('assets/client/js/wNumb.js') }}"></script>
<script src="{{ asset('assets/client/js/nouislider.min.js') }}"></script>
@endsection