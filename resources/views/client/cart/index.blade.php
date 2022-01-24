@extends('client.layouts.main')

@section('title', 'Carrito')

@section('head')
    
@endsection

@section('content')

    <div class="intro-slider-container pb-5">
        <div class="intro-slider owl-carousel owl-simple owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{"nav":false, "dots": false, "loop": false}'>
            <div class="intro-slide" style="background-image: url(https://portotheme.com/html/molla/assets/images/demos/demo-15/slider/slide-1.jpg);">
                <div class="container intro-content text-center">
                    <h1 class="intro-title text-white">Carrito</h1>
                </div>
            </div>
        </div>
        <span class="slider-loader text-white"></span>
    </div>

    @livewire('client.cart.index')
@endsection