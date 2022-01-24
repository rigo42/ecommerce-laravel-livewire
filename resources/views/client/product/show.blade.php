@extends('client.layouts.main')

@section('title', $product->name)

@section('content')

<div class="intro-slider-container pb-5">
    <div class="intro-slider owl-carousel owl-simple owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{"nav":false, "dots": false, "loop": false}'>
        <div class="intro-slide" style="background-image: url({{ $product->imagePreview() }});">
            <div class="container intro-content text-center">
                <h1 class="intro-title text-white">{{ $product->name }}</h1>
            </div>
        </div>
    </div>
    <span class="slider-loader text-white"></span>
</div>

<div class="page-content pt-5">
    @livewire('client.product.show', ['product' => $product], key($product->id))
</div><!-- End .page-content -->

@endsection

@section('footer')
<script src="{{ asset('assets/client') }}/js/jquery.elevateZoom.min.js"></script>
@endsection