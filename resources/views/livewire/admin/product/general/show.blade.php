<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b  ribbon ribbon-top">
                
                @if ($product->hasPromotionAndNotExpired())
                    <div class="ribbon-target" style="top: 80px;">
                        {!! $product->promotionToHtml() !!}
                    </div>
                @endif
                

                @if ($product->featured)
                    <div class="ribbon-target" style="top: 120px;">
                        <span class="ribbon-inner bg-info"></span> Destacado
                    </div>
                @endif
                
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-5">
                            <!--begin: Pic-->
                            <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                                <img class="img-fluid" alt="{{ $product->name }}" src="{{ $product->imagePreview() }}"/>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <!--begin: Title-->
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="mr-3">
                                    <!--begin::Name-->
                                    <span class="d-flex align-items-center text-dark font-size-h5 font-weight-bold mr-3">{{ $product->name }}  ({{ $product->priceToString() }})</span>
                                    <!--end::Name-->
                                    <!--begin::Contacts-->
                                    {{-- <div class="d-flex flex-wrap my-2">
                                        <a href="mailto:{{ $product->client->email }}" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
                                                    <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>{{ $product->client->email }}</a>
                                        <a href="tel:+{{ $product->client->phone }}" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Devices\Phone.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M7.13888889,4 L7.13888889,19 L16.8611111,19 L16.8611111,4 L7.13888889,4 Z M7.83333333,1 L16.1666667,1 C17.5729473,1 18.25,1.98121694 18.25,3.5 L18.25,20.5 C18.25,22.0187831 17.5729473,23 16.1666667,23 L7.83333333,23 C6.42705272,23 5.75,22.0187831 5.75,20.5 L5.75,3.5 C5.75,1.98121694 6.42705272,1 7.83333333,1 Z" fill="#000000" fill-rule="nonzero"/>
                                                    <polygon fill="#000000" opacity="0.3" points="7 4 7 19 17 19 17 4"/>
                                                    <circle fill="#000000" cx="12" cy="21" r="1"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>{{ $product->client->phone }}
                                        </a>
                                    </div> --}}
                                    <!--end::Contacts-->
                                </div>
                                <div class="my-lg-0 my-1">
                                    <!--start::Toolbar-->
                                   <!--begin::Toolbar-->
                                    <div class="card-toolbar align-items-center">
                                        <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Opciones" data-placement="left">
                                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ki ki-bold-more-hor"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <!--begin::Navigation-->
                                                <ul class="navi navi-hover">
                                                    <li class="navi-header pb-1">
                                                        <span class="text-primary text-uppercase font-weight-bold font-size-sm">Opciones:</span>
                                                    </li>

                                                    <li class="navi-item">
                                                        <a href="{{ route('admin.product.general.edit', $product) }}" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="fa fa-pen"></i>
                                                            </span>
                                                            <span class="navi-text">Editar</span>
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                                <!--end::Navigation-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end: Title-->

                            <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">
                                {{ $product->description }}
                            </div>

                            <!--begin: Content-->
                            <div class="d-flex align-items-center flex-wrap justify-content-between">
                                
                                <div class="d-flex flex-wrap align-items-center py-2">
                                    <div class="d-flex align-items-center mr-10">
                                        <div class="mr-6">
                                            <div class="font-weight-bold mb-2">Registro</div>
                                            <span class="btn btn-sm btn-text btn-light-success text-uppercase font-weight-bold">{{ $product->dateToString() }}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--end: Content-->

                            <!-- Info orders -->
                            <div class="d-flex align-items-center justify-content-start flex-wrap my-4">
                                <!--begin: Item-->
                                <div class="mr-1 col-lg-3 col-auto text-dark border border-dashed rounded mb-4">
                                    <span class="mr-4">
                                        <i class="flaticon-price-tag icon-2x font-weight-bold text-dark"></i>
                                    </span>
                                    <div class="d-flex flex-column">
                                        <span class="font-weight-bolder font-size-sm">Pedidos</span>
                                        <span class="font-weight-bolder font-size-h5">
                                        <span class="font-weight-bold">0</span>
                                    </div>
                                </div>
                                <!--end: Item-->
                                <!--begin: Item-->
                                <div class="mr-1 col-lg-2 col-auto text-success border border-dashed rounded mb-4">
                                    <span class="mr-4">
                                        <i class="flaticon-piggy-bank icon-2x font-weight-bold text-success"></i>
                                    </span>
                                    <div class="d-flex flex-column">
                                        <span class="font-weight-bolder font-size-sm ">Ingresos</span>
                                        <span class="font-weight-bolder font-size-h5">
                                        <span class="font-weight-bold ">0</span>
                                    </div>
                                </div>
                                <!--end: Item-->
                            </div>
                        </div>
                    </div>
                    
                    <div class="separator separator-solid my-7"></div>

                    <div class="d-flex align-items-center justify-content-start flex-wrap mt-5">
                        <div class="card-toolbar">
                            <ul wire:ignore class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-bold nav-tabs-line-3x" role="tablist">
                                
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#colors">
                                        <span class="nav-icon mr-2">
                                            <span class="svg-icon mr-3">
                                                <i class="fas fa-palette"></i>
                                            </span>
                                        </span>
                                        <span class="nav-text">Colores</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#sizes">
                                        <span class="nav-icon mr-2">
                                            <span class="svg-icon mr-3">
                                                <i class="fab fa-medium"></i>
                                            </span>
                                        </span>
                                        <span class="nav-text">Medidas</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#statistics">
                                        <span class="nav-icon mr-2">
                                            <span class="svg-icon mr-3">
                                                <i class="fa fa-chart-bar"></i>
                                            </span>
                                        </span>
                                        <span class="nav-text">Estadisticas</span>
                                    </a>
                                </li>

                                @can('pedidos')
                                    <li class="nav-item mr-3">
                                        <a class="nav-link" data-toggle="tab" href="#orders">
                                            <span class="nav-icon mr-2">
                                                <span class="svg-icon mr-3">
                                                    <i class="fa fa-credit-card"></i>
                                                </span>
                                            </span>
                                            <span class="nav-text">Pedidos</span>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-custom gutter-b">
                <div class="card-body px-0">
                    <div class="tab-content" wire:ignore>

                        <div class="tab-pane active" id="colors" role="tabpanel">
                            @livewire('admin.product.color.index', ['product' => $product])
                        </div>

                        <div class="tab-pane" id="sizes" role="tabpanel">
                            @livewire('admin.product.size.index', ['product' => $product])
                        </div>
                       
                        <div class="tab-pane" id="statistics" role="tabpanel">
                            @livewire('admin.product.general.statistic', ['product' => $product])
                        </div>
                        
                        @can('pedidos')
                            <div class="tab-pane" id="orders" role="tabpanel">
                                {{-- @livewire('admin.orders.index', ['product' => $product]) --}}
                            </div>
                        @endcan

                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>