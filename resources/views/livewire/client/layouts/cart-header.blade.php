<div>
    <div class="dropdown cart-dropdown" wire:ignore.self>
        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
            <i class="icon-shopping-cart"></i>
            <span class="cart-count">{{ $count }}</span>
            <span class="cart-txt">${{ $total }}</span>
        </a>

        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-cart-products">

                @foreach ($cart as $product)
                
                    <div class="product">
                        <div class="product-cart-details">
                            <h4 class="product-title">
                                <a href="product.html">{{ $product->name }}</a>
                            </h4>

                            <span class="cart-product-info">
                                <span class="cart-prod
                                uct-qty">{{ $product->qty }}</span>
                                x ${{ $product->price }}
                            </span>
                        </div><!-- End .product-cart-details -->

                        <figure  class="product-image-container">
                            <a style="height: fit-content;" href="product.html" class="product-image">
                                <img src="{{ $product->model->imagePreview() }}" alt="{{ $product->name }}">
                            </a>
                        </figure>
                        <a href="#" class="btn-remove" title="Remover producto"><i class="icon-close"></i></a>
                    </div><!-- End .product -->
                @endforeach


            </div><!-- End .cart-product -->

            <div class="dropdown-cart-total">
                <span>Total</span>

                <span class="cart-total-price">${{ $total }}</span>
            </div><!-- End .dropdown-cart-total -->

            <div class="dropdown-cart-action">
                <a href="cart.html" class="btn btn-primary">Ver carrito</a>
                <a href="checkout.html" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
            </div><!-- End .dropdown-cart-total -->
        </div><!-- End .dropdown-menu -->
        
    </div><!-- End .cart-dropdown -->
</div>
