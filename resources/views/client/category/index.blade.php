@extends('client.layouts.main')

@section('title', 'Categorías')

@section('content')
<div class="intro-slider-container pb-5">
    <div class="intro-slider owl-carousel owl-simple owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{"nav":false, "dots": false, "loop": false}'>
        <div class="intro-slide" style="background-image: url(https://portotheme.com/html/molla/assets/images/demos/demo-15/slider/slide-1.jpg);">
            <div class="container intro-content text-center">
                <h1 class="intro-title text-white">Categorias</h1>
            </div>
        </div>
    </div>
    <span class="slider-loader text-white"></span>
</div>

<div class="page-content pt-5">
    <div class="categories-page">
        <div class="container">

            @if (count($categories))
                <div class="row">
                    
                    @foreach ($categories as $category)
                        <div class="col-lg-4 col-12 col-xl-4">
                            <div class="banner banner-cat banner-badge">
                                <a href="#">
                                    <img src="{{ $category->imagePreview() }}" alt="{{ $category->name }}">
                                </a>

                                <a class="banner-link" href="#">
                                    <h3 class="banner-title">{{ $category->name }}</h3><!-- End .banner-title -->
                                    <h4 class="banner-subtitle">{{ $category->products->count() }} Productos</h4><!-- End .banner-subtitle -->
                                    <span class="banner-link-text">Ver productos</span>
                                </a>

                            </div>
                        </div>
                    @endforeach
                    
                </div><!-- End .row -->
            @else
                <div class="cta bg-image pt-6 pb-7 mb-5" style="background-image: url(https://portotheme.com/html/molla/assets/images/backgrounds/cta/bg-2.jpg);background-position: center right;">
                    <div class="row justify-content-center">
                        <div class="col-sm-10 col-md-8 col-lg-6">
                            <div class="cta-text text-center">
                                <h3 class="cta-title">{{ config('app.name') }}</h3><!-- End .cta-title -->
                                <p class="cta-desc">Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.</p><!-- End .cta-desc -->
                        
                                <a href="#" class="btn btn-primary btn-rounded"><span>Click Here</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .cta-text -->
                        </div><!-- End .col-sm-10 col-md-8 col-lg-6 -->
                    </div><!-- End .row -->
                </div>
            @endif
            

            
        </div><!-- End .container -->
    </div><!-- End .categories-page -->
</div><!-- End .page-content -->
@endsection
