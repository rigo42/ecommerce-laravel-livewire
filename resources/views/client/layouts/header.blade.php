<header class="header header-6">
    <div class="header-top">
        <div class="container" style="padding: 10px;">
            <div class="header-left">
                <ul class="top-menu top-link-menu d-none d-md-block">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li><a href="#"><i class="fas fa-shipping-fast"></i>Rastrear pedido</a></li>
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <div class="social-icons social-icons-color">
                    <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                    <a href="#" class="social-icon social-instagram" title="Pinterest" target="_blank"><i class="icon-instagram"></i></a>
                    <a href="#" class="social-icon social-pinterest" title="Instagram" target="_blank"><i class="icon-pinterest-p"></i></a>
                </div><!-- End .soial-icons -->
                <ul class="top-menu top-link-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            @auth
                                <li><a href="#"><i class="icon-user"></i>Perfil</a></li>
                            @endauth
                            @guest
                                <li><a href="{{ route('login') }}"><i class="icon-user"></i>Iniciar sesión</a></li>
                            @endguest
                            
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->

            </div><!-- End .header-right -->
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="{{ route('client.product.index') }}" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Buscar</label>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            <input value="{{ request()->search }}" type="search" class="form-control" name="search" id="q" placeholder="Buscar..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>
            <div class="header-center">
                <a href="index.html" class="logo">
                    <img src="{{ config('app.logo') }}" alt="{{ config('app.name') }}" width="82" height="20">
                </a>
            </div><!-- End .header-left -->

            <div class="header-right">
                <a href="wishlist.html" class="wishlist-link">
                    <i class="icon-heart-o"></i>
                    <span class="wishlist-count">3</span>
                    <span class="wishlist-txt">Favoritos</span>
                </a>

                @livewire('client.layouts.cart-header')
                
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                
                @include('client.layouts.menu')

                <button class="mobile-menu-toggler">
                    <span class="sr-only">LLamanos</span>
                    <i class="icon-phone"></i>
                </button>
            </div><!-- End .header-left -->

            <div class="header-right">
                <i class="icon-phone"></i><a href="tel:+{{ config('contact.phone') }}"><p>Llamanos {{ config('contact.phone') }}</p></a>
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->