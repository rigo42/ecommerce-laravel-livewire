<div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Productos <span class="text-muted font-size-sm">({{ $products->count() }})</span></span>
            </h3>
            <div class="card-toolbar">
                <a href="{{ route('admin.product.general.create') }}" class="btn btn-primary btn-shadow font-weight-bold mr-2 "><i class="fa fa-plus"></i> Nuevo</a>
            </div>
            
        </div>
        <div class="card-body">
            <!--begin::Engage Widget 15-->
            <div class="card card-custom mb-12">
                <div class="card-body rounded p-0 d-flex" style="background-color:#DAF0FD;">
                    <div class="col-lg-12 p-10 p-md-20">
                        <h1 class="font-weight-bolder text-dark">Buscar productos</h1>
                        <div class="font-size-h4 mb-8">Busca por nombre por nombre, categoría o marca</div>
                        <!--begin::Form-->
                        <div class="row py-2 px-6 bg-white rounded">
                            <div class="my-2 my-md-0 col-lg-8 col-12 d-flex align-items-center">
                                <span class="svg-icon svg-icon-lg svg-icon-primary d-flex">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Search.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <input wire:model="search" type="text" class="form-control border-0 font-weight-bold pl-2" placeholder="Buscar..." />
                            </div>
                            <div class="my-2 my-md-0 col-lg-4 col-12">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Mostrar:</label>
                                    <select class="form-control" wire:model="perPage">
                                        <option value="10">10 Entradas</option>
                                        <option value="20">20 Entradas</option>
                                        <option value="50">50 Entradas</option>
                                        <option value="100">100 Entradas</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--end::Form-->
                    </div>
                    <div class="d-none d-md-flex flex-row-fluid bgi-no-repeat bgi-position-y-center bgi-position-x-left bgi-size-cover" style="background-image: url(https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/illustrations/progress.svg);"></div>
                </div>
            </div>
            <!--end::Engage Widget 15-->
            <!--begin::Section-->
            <div class="mb-11">

                <!--begin::Products-->
                <div class="row">
                    @foreach ($products as $product)
                        <!--begin::Product-->
                        <div class="col-lg-4 col-xxl-3 col-6 mb-4">
                            <!--begin::Card-->
                            <div class="card card-custom card-shadowless">
                                <div class="card-body p-0">
                                    <!--begin::Image-->
                                    <div class="overlay">
                                        <div class="overlay-wrapper rounded bg-light text-center">
                                            <img src="{{ Storage::url($product->image->url) }}" alt="{{ $product->name }}" class="mw-100 w-200px" />
                                        </div>
                                        <div class="overlay-layer">
                                            <a href="{{ route('admin.product.general.show', $product) }}" class="btn font-weight-bolder btn-sm btn-primary mr-2">Ver <i class="fa fa-eye"></i></a>
                                            <a href="{{ route('admin.product.general.edit', $product) }}" class="btn font-weight-bolder btn-sm btn-light-success">Editar <i class="fa fa-pen"></i></a>
                                        </div>
                                    </div>
                                    <!--end::Image-->
                                    <!--begin::Details-->
                                    <div class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                        <a href="#" class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1">{{ $product->name }}</a>
                                        <span class="font-size-lg">
                                            @foreach ($product->categories as $category)
                                                {{ $category->name.', ' }}
                                            @endforeach
                                        </span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                    @endforeach
                    
                    
                </div>
                <!--end::Products-->
            </div>
        </div>
    </div>

    @push('footer')
        <script>

            Livewire.on('render', function(){
                $('.modal').modal('hide');
            });

            function confirmDestroy(id){
                swal.fire({
                    title: "¿Estas seguro?",
                    text: "No podrá recuperar este categoría.",
                    icon: "warning",
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: "<i class='fa fa-trash'></i> <span class='font-weight-bold'>Si, eliminar</span>",
                    cancelButtonText: "<i class='fas fa-arrow-circle-left'></i>  <span class='text-dark font-weight-bold'>No, cancelar",
                    reverseButtons: true,
                    cancelButtonClass: "btn btn-light-secondary font-weight-bold",
                    confirmButtonClass: "btn btn-danger",
                }).then(function(result) {
                    if (result.isConfirmed) {
                        @this.call('destroy', id);
                    }
                });
            }
        </script>
    @endpush
    
</div>
