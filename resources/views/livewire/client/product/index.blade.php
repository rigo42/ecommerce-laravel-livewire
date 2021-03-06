<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="toolbox">
                    <div class="toolbox-left">
                        <div class="toolbox-info">
                            Viendo <span>{{ $products->count() }} de {{ $products->total() }}</span> Productos
                        </div><!-- End .toolbox-info -->
                    </div><!-- End .toolbox-left -->

                    <div class="toolbox-right">
                        <div class="toolbox-sort">
                            <label for="sortby">Ordenar por:</label>
                            <div class="select-custom">
                                <select wire:model="orderByFilter" name="sortby" id="sortby" class="form-control">
                                    <option value="">Predeterminado</option>
                                    <option value="promotion">Promociones</option>
                                    <option value="priceHigher">Precio menor a mayor</option>
                                    <option value="priceLower">Precio mayor a menor</option>
                                </select>
                            </div>
                        </div><!-- End .toolbox-sort -->
                    </div><!-- End .toolbox-right -->
                </div><!-- End .toolbox -->

                <div class="products mb-3">
                    <div class="row justify-content-center" id="products">

                        @forelse ($products as $product)
                            <div class="col-6 col-md-4 col-lg-4">
                                @include('client.product.partials._product')
                            </div><!-- End .col-sm-6 col-lg-4 -->

                        @empty 
                            <div class="cta cta-separator mb-5">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12">
                                        <div class="cta-wrapper cta-text text-center">
                                            <h3 class="cta-title">Sin resultados.</h3><!-- End .cta-title -->
                                            <p class="cta-desc">{{ $search }} </p><!-- End .cta-desc -->
                                    
                                            <a wire:click="cleanFilter()" href="#" class="btn btn-primary btn-rounded"><span>Click aqui para borrar busqueda</span></a>
                                        </div><!-- End .cta-wrapper -->
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row -->
                            </div>
                        @endforelse
                        

                    </div><!-- End .row -->
                </div><!-- End .products -->

                {{ $products->links() }}
            </div><!-- End .col-lg-9 -->
            <aside class="col-lg-3 order-lg-first">
                <div class="sidebar sidebar-shop">
                    <div class="widget widget-clean">
                        <label>Filtros:</label>
                        <a href="#" wire:click="cleanFilter()" class="sidebar-filter-clear">Limpiar todo</a>
                    </div><!-- End .widget widget-clean -->
                    
                    <div class="widget widget-search widget-body pb-2" style="border-bottom: .1rem solid #ebebeb;">
                        <h3 class="widget-title">Buscar</h3><!-- End .widget-title -->
                        <label for="ws" class="sr-only">Buscar productos</label>
                        <input wire:model="search" type="search" class="form-control" id="ws" placeholder="Buscar productos">
                        <button type="submit" class="btn">
                            <i class="icon-search" wire:target="search" wire:loading.remove></i>
                            <div class="spinner-grow spinner-grow-sm" role="status" wire:loading>
                                <span class="sr-only">Cargando...</span>
                              </div>
                            <span class="sr-only">Buscar</span>
                        </button>
                    </div><!-- End .widget -->

                    @if (count($categories))
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                    Categor??as
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">

                                        @foreach ($categories as $category)
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input wire:model="categoryFilter" value="{{ $category->id }}" type="checkbox" class="custom-control-input" id="cat-{{ $category->id }}">
                                                    <label class="custom-control-label" for="cat-{{ $category->id }}">{{ $category->name }}</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">{{ count($category->products) }}</span>
                                            </div><!-- End .filter-item -->
                                        @endforeach

                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->
                    @endif
                    
                    @if (count($brands))
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
                                    Marcas
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-2">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">

                                        @foreach ($brands as $brand)
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input wire:model="brandFilter" value="{{ $brand->id }}" type="checkbox" class="custom-control-input" id="brand-{{ $brand->id }}">
                                                    <label class="custom-control-label" for="brand-{{ $brand->id }}">{{ $brand->name }}</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">{{ count($brand->products) }}</span>
                                            </div><!-- End .filter-item -->
                                        @endforeach

                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->
                    @endif 

                    @if (count($genders))
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
                                    G??neros
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-2">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">

                                        @foreach ($genders as $gender)
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input wire:model="genderFilter" value="{{ $gender->id }}" type="checkbox" class="custom-control-input" id="gender-{{ $gender->id }}">
                                                    <label class="custom-control-label" for="gender-{{ $gender->id }}">{{ $gender->name }}</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">{{ count($gender->products) }}</span>
                                            </div><!-- End .filter-item -->
                                        @endforeach

                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->
                    @endif 

                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                Precios
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-4" >
                            <div class="widget-body">
                                <div class="filter-price" wire:ignore>
                                    <div class="filter-price-text">
                                        Rango de precios:
                                        <span id="filter-price-range"></span>
                                    </div>

                                    <div id="price-slider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    @push('footer')
        <script>
            $(document).ready(function () {
                // Slider For category pages / filter price
                if ( typeof noUiSlider === 'object' ) {
                    var priceSlider  = document.getElementById('price-slider');

                    // Check if #price-slider elem is exists if not return
                    // to prevent error logs
                    if (priceSlider == null) return;

                    noUiSlider.create(priceSlider, {
                        start: [ {{  $minPriceFilter  }}, {{ $maxPriceFilter }} ],
                        connect: true,
                        step: {{ $stepPriceFilter }},
                        margin: {{ $stepPriceFilter }},
                        range: {
                            'min': {{  $minPriceFilter  }},
                            'max': {{ $maxPriceFilter }}
                        },
                        tooltips: true,
                        format: wNumb({
                            decimals: 0,
                            prefix: ''
                        })
                    });

                    // Update Price Range
                    priceSlider.noUiSlider.on('change', function( values, handle ){
                        minPriceFilter = values[0];
                        maxPriceFilter = values[1];
                        @this.set('minPriceFilter', parseInt(minPriceFilter));
                        @this.set('maxPriceFilter', parseInt(maxPriceFilter));
                        $('#filter-price-range').text('$'+minPriceFilter+' - $'+maxPriceFilter);
                        $('html, body').animate({
                            'scrollTop':   $('#products').offset().top
                        }, 700);
                    });
                }
            });
        </script>
    @endpush
</div>
