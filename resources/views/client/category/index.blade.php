@extends('client.layouts.main')

@section('title', 'Categorías')

@section('head')
@endsection

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('client.home.index') }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nosotros</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="categories-page">
        <div class="container">

            @if (count($categories))
                <div class="grid-columns-3">
                    
                    @foreach ($categories as $category)
                        <div class="col">
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
                                <h3 class="cta-title">Morbi in sem quis dui placerat felis.</h3><!-- End .cta-title -->
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
