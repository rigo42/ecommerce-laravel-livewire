<div>
    <div class="dropdown cart-dropdown" wire:ignore.self>

        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
            <i class="icon-shopping-cart"></i>
            <span class="cart-count">{{ $count }}</span>
            <span class="cart-txt">${{ $subtotal }}</span>
        </a>

        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-cart-products">

                @foreach ($cart as $item)
                
                    <div class="product">
                        <div class="product-cart-details">
                            <h4 class="product-title">
                                <a href="{{ route('client.product.show', $item->model) }}">{{ $item->name }}</a>
                            </h4>

                            <span class="cart-product-info">
                                <span class="cart-product-qty">{{ $item->qty }}</span> x ${{ $item->price }}
                            </span>
                        </div><!-- End .product-cart-details -->

                        <figure  class="product-image-container">
                            <a style="height: fit-content;" href="{{ route('client.product.show', $item->model) }}" class="product-image">
                                <img src="{{ $item->model->imagePreview() }}" alt="{{ $item->name }}">
                            </a>
                        </figure>
                        <a href="#" class="btn-remove" title="Remover producto"><i wire:click.prevent="destroy('{{ $item->rowId }}')"  class="icon-close"></i></a>
                    </div><!-- End .product -->
                @endforeach


            </div><!-- End .cart-product -->

            <div class="dropdown-cart-total">
                <span>Subtotal</span>

                <span class="cart-total-price">${{ $subtotal }}</span>
            </div><!-- End .dropdown-cart-total -->

            <div class="dropdown-cart-action">
                <a href="{{ route('client.cart.index') }}" class="btn btn-outline-primary-2"><span>Var carrito</span></a>
                <a href="{{ route('client.checkout.index') }}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
            </div><!-- End .dropdown-cart-total -->
        </div><!-- End .dropdown-menu -->
    
        
        
    </div><!-- End .cart-dropdown -->
</div>
