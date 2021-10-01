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
            <div class="row justify-content-center">
                @forelse ($categories as $category)
                    <div class="col-sm-6 col-lg-3">
                        <div class="banner banner-cat banner-link-anim">
                            <a href="#">
                                <img src="{{ Storage::url($category->image->url) }}" alt="{{ $category->name }}">
                            </a>

                            <div class="banner-content banner-content-bottom">
                                <h3 class="banner-title">Accessories</h3><!-- End .banner-title -->
                                <h4 class="banner-subtitle">8 Products</h4><!-- End .banner-subtitle -->
                                <a href="#" class="banner-link">Shop Now</a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-md-6 -->
                @empty
                    
                @endforelse
                

            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .categories-page -->
</div><!-- End .page-content -->
@endsection