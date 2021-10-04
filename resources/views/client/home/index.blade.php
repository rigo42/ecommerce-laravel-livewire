@extends('client.layouts.main')

@section('title', config('app.name'))

@section('content')
<div class="intro-slider-container mb-5">
    <div class="intro-slider owl-carousel owl-simple owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{"nav":true, "dots": true, "loop": true}'>
        @forelse ($banners as $banner)
            <div class="intro-slide" style="background-image: url({{ Storage::url($banner->image->url) }});">
                <div class="container intro-content text-center">
                    @if ($banner->subtitle)
                        <h3 class="intro-subtitle">{{ $banner->subtitle }}</h3><!-- End .h3 intro-subtitle -->
                    @endif
                    @if ($banner->title)
                        <h1 class="intro-title text-white">{{ $banner->title }}</h1><!-- End .intro-title -->
                    @endif
                    @if ($banner->link)
                    <a href="{{ $banner->link }}" class="btn btn-outline-white scroll-to">
                        <span>Ver más</span>
                        <i class="icon-long-arrow-right"></i>
                    </a>
                    @endif
                    
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->
        @empty
            <div class="intro-slide" style="background-image: url(https://portotheme.com/html/molla/assets/images/demos/demo-16/slider/slide-1.jpg);">
                <div class="container intro-content text-center">
                    <h3 class="intro-subtitle">¿Quieres saber que esta de moda?</h3><!-- End .h3 intro-subtitle -->
                    <h1 class="intro-title text-white">Para la primavera en la ciudad</h1><!-- End .intro-title -->

                    <a href="#welcome" class="btn btn-outline-white scroll-to">
                        <span>Ver más</span>
                        <i class="icon-long-arrow-down"></i>
                    </a>
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->
        @endforelse
        
        
    </div><!-- End .intro-slider owl-carousel owl-simple -->

    <span class="slider-loader text-white"></span><!-- End .slider-loader -->
</div><!-- End .intro-slider-container -->

<div id="welcome"></div>

{{-- CATEGORIES --}}
@if ($categories->count())
    <section class="pt-5 pb-5">
        <div class="container">
            <h2 class="title text-center mb-2">Explorar por categoría</h2><!-- End .title -->

            <div class="cat-blocks-container">
                <div class="row justify-content-center">

                    @foreach ($categories as $category)
                        <div class="col-6 col-sm-4 col-lg-2">
                            <a href="#" class="cat-block">
                                <figure>
                                    <span>
                                        <img style="height: 200px; object-fit: cover;" src="{{ $category->imagePreview() }}" alt="{{ $category->name }}">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">{{ $category->name }}</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                    @endforeach
                

                </div><!-- End .row -->
            </div><!-- End .cat-blocks-container -->
        </div><!-- End .container -->
    </section> 
@endif

{{-- FEATURES --}}
@if ($features->count())
<div class="container">
    <h2 class="title text-center">Destacados</h2><!-- End .title -->
            <div class="row justify-content-center">

                @foreach ($features as $featured)
                    <div class="col-6 col-md-4 col-lg-3">
                        @include('client.product.partials._product', ['product' => $featured])
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                @endforeach
                
            </div><!-- End .row -->
    </div><!-- End .tab-content -->

    <div class="mb-3"></div><!-- End .mb-6 -->
</div>
@endif

{{-- VIDEO BANNER --}}
<div class="video-banner bg-light pt-5 pb-5">
    <div class="container align-items-center">
        <div class="video-banner-box bg-white">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="video-box-content">
                        <h3 class="video-banner-title h1"><span class="text-primary">Acerca de </span><strong>Conocenos</strong></h3><!-- End .video-banner-title -->
                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
                        <a href="#" class="btn btn-outline-primary"><span>Conoce todos nuestros productos</span><i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .video-box-content -->
                </div><!-- End .col-md-6 -->
                <div class="col-md-6">
                    <div class="video-poster">
                        <img src="https://portotheme.com/html/molla/assets/images/video/poster-3.jpg" alt="poster">

                        <div class="video-poster-content">
                            <a href="https://www.youtube.com/watch?v=vBPgmASQ1A0" class="btn-video btn-iframe"><i class="icon-play"></i></a>
                        </div><!-- End .video-poster-content -->	
                    </div><!-- End .video-poster -->
                </div><!-- End .col-md-6 -->
            </div><!-- End .row -->
        </div><!-- End .video-banner-box -->
    </div><!-- End .container -->
</div>

@if ($recents->count())
{{-- RECENTS --}}
<div class="container pt-5">
    <h2 class="title text-center">Recientes</h2><!-- End .title -->
            <div class="row justify-content-center">

                @foreach ($recents as $recent)
                    <div class="col-6 col-md-4 col-lg-3">
                        @include('client.product.partials._product', ['product' => $recent])
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                @endforeach
                
            </div><!-- End .row -->
    </div><!-- End .tab-content -->

    <div class="mb-3"></div><!-- End .mb-6 -->
</div>
@endif

{{-- BLOGS --}}
<div class="blog-posts pt-5">
    <div class="container">
        <div class="heading text-center">
            <h2 class="title">Blogs</h2><!-- End .title -->
            <p class="title-desc">¡Preparamos este espacio especialmente para tí!</p><!-- End .title-desc -->
        </div><!-- End .heading -->
        
        <div class="owl-carousel owl-simple mb-4" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": true,
                "items": 3,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":1
                    },
                    "600": {
                        "items":2
                    },
                    "992": {
                        "items":3
                    },
                    "1200": {
                        "items":3,
                        "nav": true,
                        "dots": false
                    }
                }
            }'>
            <article class="entry">
                <figure class="entry-media">
                    <a href="single.html">
                        <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/blog/post-1.jpg" alt="image desc">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body">
                    <div class="entry-meta">
                        <a href="#">Nov 22, 2018</a>, 0 Comments
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Sed adipiscing ornare.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        <a href="single.html" class="read-more">Read More</a>
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->
        
            <article class="entry">
                <figure class="entry-media">
                    <a href="single.html">
                        <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/blog/post-2.jpg" alt="image desc">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body">
                    <div class="entry-meta">
                        <a href="#">Nov 22, 2018</a>, 0 Comments
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Aenean dignissim pellentesque felis.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        <a href="single.html" class="read-more">Read More</a>
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->

            <article class="entry">
                <figure class="entry-media">
                    <a href="single.html">
                        <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/blog/post-3.jpg" alt="image desc">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body">
                    <div class="entry-meta">
                        <a href="#">Nov 22, 2018</a>, 0 Comments
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Quisque volutpat mattis eros.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        <a href="single.html" class="read-more">Read More</a>
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->

            <article class="entry">
                <figure class="entry-media">
                    <a href="single.html">
                        <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/blog/post-2.jpg" alt="image desc">
                    </a>
                </figure><!-- End .entry-media -->

                <div class="entry-body">
                    <div class="entry-meta">
                        <a href="#">Nov 22, 2018</a>, 0 Comments
                    </div><!-- End .entry-meta -->

                    <h3 class="entry-title">
                        <a href="single.html">Aenean dignissim pellentesque felis.</a>
                    </h3><!-- End .entry-title -->

                    <div class="entry-content">
                        <a href="single.html" class="read-more">Read More</a>
                    </div><!-- End .entry-content -->
                </div><!-- End .entry-body -->
            </article><!-- End .entry -->
        </div><!-- End .owl-carousel -->

        <div class="more-container text-center">
            <a href="blog.html" class="btn btn-outline-darker btn-more"><span>View more articles</span><i class="icon-long-arrow-right"></i></a>
        </div><!-- End .more-container -->

        <hr class="mb-5" >
    </div><!-- End .container -->
</div>

{{-- INSTAGRAM --}}
<div class="container-fluid">
    <div class="heading text-center">
        <h2 class="title">Siguenos en Instagram</h2><!-- End .title -->
        <p class="title-desc">Publicamos continuamente lo más nuevo.</p><!-- End .title-desc -->
    </div><!-- End .heading -->

    <div class="owl-carousel owl-simple" data-toggle="owl" 
        data-owl-options='{
            "nav": false, 
            "dots": false,
            "items": 5,
            "margin": 20,
            "loop": false,
            "responsive": {
                "0": {
                    "items":2
                },
                "360": {
                    "items":2
                },
                "600": {
                    "items":3
                },
                "992": {
                    "items":4
                },
                "1200": {
                    "items":5
                }
            }
        }'>
        <div class="instagram-feed">
            <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/instagram/1.jpg" alt="img">

            <div class="instagram-feed-content">
                <a href="#"><i class="icon-heart-o"></i>466</a>
                <a href="#"><i class="icon-comments"></i>65</a>
            </div><!-- End .instagram-feed-content -->
        </div><!-- End .instagram-feed -->

        <div class="instagram-feed">
            <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/instagram/2.jpg" alt="img">

            <div class="instagram-feed-content">
                <a href="#"><i class="icon-heart-o"></i>39</a>
                <a href="#"><i class="icon-comments"></i>78</a>
            </div><!-- End .instagram-feed-content -->
        </div><!-- End .instagram-feed -->

        <div class="instagram-feed">
            <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/instagram/3.jpg" alt="img">

            <div class="instagram-feed-content">
                <a href="#"><i class="icon-heart-o"></i>691</a>
                <a href="#"><i class="icon-comments"></i>87</a>
            </div><!-- End .instagram-feed-content -->
        </div><!-- End .instagram-feed -->

        <div class="instagram-feed">
            <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/instagram/4.jpg" alt="img">

            <div class="instagram-feed-content">
                <a href="#"><i class="icon-heart-o"></i>508</a>
                <a href="#"><i class="icon-comments"></i>124</a>
            </div><!-- End .instagram-feed-content -->
        </div><!-- End .instagram-feed -->

        <div class="instagram-feed">
            <img src="https://portotheme.com/html/molla/assets/images/demos/demo-17/instagram/5.jpg" alt="img">

            <div class="instagram-feed-content">
                <a href="#"><i class="icon-heart-o"></i>433</a>
                <a href="#"><i class="icon-comments"></i>27</a>
            </div><!-- End .instagram-feed-content -->
        </div><!-- End .instagram-feed -->
    </div><!-- End .owl-carousel -->
</div>
@endsection