@extends('client.layouts.main')

@section('title', $product->name)

@section('head')

@endsection

@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('client.home.index') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('client.product.index') }}">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->


<div class="page-content">
    @livewire('client.product.show', ['product' => $product], key($product->id))
</div><!-- End .page-content -->

@endsection

@section('footer')
<script src="{{ asset('assets/client') }}/js/jquery.elevateZoom.min.js"></script>
@endsection