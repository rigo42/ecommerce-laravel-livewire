@extends('client.layouts.main')

@section('title', 'Productos')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/client/css/plugins/nouislider/nouislider.css') }}">
@endsection

@section('content')

<div class="intro-slider-container pb-5">
    <div class="intro-slider owl-carousel owl-simple owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{"nav":false, "dots": false, "loop": false}'>
        <div class="intro-slide" style="background-image: url(https://portotheme.com/html/molla/assets/images/demos/demo-15/slider/slide-1.jpg);">
            <div class="container intro-content text-center">
                <h1 class="intro-title text-white">Productos</h1>
            </div>
        </div>
    </div>
    <span class="slider-loader text-white"></span>
</div>

<div class="page-content pt-5">
    @livewire('client.product.index')
</div><!-- End .page-content -->

@endsection

@section('footer')
<script src="{{ asset('assets/client/js/wNumb.js') }}"></script>
<script src="{{ asset('assets/client/js/nouislider.min.js') }}"></script>
@endsection