<div>
    <div class="page-content pt-5">
        <div class="cart">
            <div class="container">

                @if (Cart::instance()->count())

                    @if (session()->has('alert'))
                        <div class="alert alert-{{ session()->get('alert-type') }} alert-lg mb-3 alert-dismissible fade show">
                            {{ session()->get('alert') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                <svg width="12" height="12">
                                    <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
                                            c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
                                            C11.2,9.8,11.2,10.4,10.8,10.8z"></path>
                                </svg>
                            </button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-9">
                            <table class="table table-cart table-mobile">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Color</th>
                                        <th>Medida</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach (Cart::content() as $item)
                                        <tr>
                                            <td class="product-col">
                                                <div class="product">
                                                    <figure class="product-media">
                                                        <a href="{{ route('client.product.show', $item->model) }}">
                                                            <img src="{{ $item->model->imagePreview() }}" alt="{{ $item->name }}">
                                                        </a>
                                                    </figure>
            
                                                    <h3 class="product-title">
                                                        <a href="{{ route('client.product.show', $item->model) }}">{{ $item->name }}</a>
                                                    </h3><!-- End .product-title -->
                                                </div><!-- End .product -->
                                            </td>
                                            <td>{{ $item->options->color ? $item->options->color : 'Ninguno' }}</td>
                                            <td>{{ $item->options->size ? $item->options->size : 'Ninguno' }}</td>
                                            <td class="price-col">{{ $item->price }}</td>
                                            <td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input wire:change="update('{{ $item->rowId }}', $event.target.value, {{ $item->model->quantity }})" type="number" class="form-control" value="{{ $item->qty }}" min="1" max="{{ $item->model->quantity }}" step="1" data-decimals="0" required>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
                                            <td class="total-col">{{ $item->subtotal }}</td>
                                            <td class="remove-col"><button wire:click="destroyProduct('{{ $item->rowId }}')" class="btn-remove"><i class="icon-close"></i></button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table><!-- End .table table-wishlist -->

                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Carrito Total</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <tbody>
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>{{ Cart::subtotal() }}</td>
                                        </tr>

                                        <tr class="summary-subtotal">
                                            <td>Iva:</td>
                                            <td>{{ config('cart.tax') }}%</td>
                                        </tr>

                                        <tr class="summary-shipping">
                                            <td>Envio:</td>
                                            <td>Pendiente</td>
                                        </tr>

                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                    <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                                                </div><!-- End .custom-control -->
                                            </td>
                                            <td>$0.00</td>
                                        </tr><!-- End .summary-shipping-row -->

                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
                                                    <label class="custom-control-label" for="standart-shipping">Standart:</label>
                                                </div><!-- End .custom-control -->
                                            </td>
                                            <td>$10.00</td>
                                        </tr><!-- End .summary-shipping-row -->

                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
                                                    <label class="custom-control-label" for="express-shipping">Express:</label>
                                                </div><!-- End .custom-control -->
                                            </td>
                                            <td>$20.00</td>
                                        </tr><!-- End .summary-shipping-row -->

                                        <tr class="summary-shipping-estimate">
                                            <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
                                            <td>&nbsp;</td>
                                        </tr><!-- End .summary-shipping-estimate -->

                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>{{ Cart::total() }}</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <a href="checkout.html" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                            </div><!-- End .summary -->

                            <a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->

                @else

                    <div class="justify-content-center">
                        <div class="cta bg-image mb-3" style="background-image: url(https://portotheme.com/html/molla/assets/images/backgrounds/cta/bg-4.jpg);background-position: center right;">
                            <div class="cta-wrapper cta-text text-center">
                                <h3 class="cta-title">Hola! actualmente tu carrito esta vacio.</h3><!-- End .cta-title -->
                                <p class="cta-desc">Regresa para añadir productos en tu carrito </p><!-- End .cta-desc -->
                        
                                <a href="{{ route('client.product.index') }}" class="btn btn-primary btn-rounded"><span>Clic aquí</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .cta-wrapper -->
                        </div><!-- End .cta -->
                    </div>
                @endif

            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</div>
