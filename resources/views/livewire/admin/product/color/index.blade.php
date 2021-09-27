<div class="container-fluid">

    <div class="row">

        @include('admin.product.menu.index')

        <div class="col-lg-10">
            <div class="card card-custom gutter-b">
                <!--begin::Card Body-->
                <div class="card-body d-flex rounded bg-danger p-12 flex-column flex-md-row flex-lg-column flex-xxl-row">
                    <!--begin::Image-->
                    <div class="bgi-no-repeat bgi-position-center bgi-size-cover h-300px h-md-auto h-lg-300px h-xxl-auto mw-100 w-550px" style="background-image: url('/metronic/theme/html/demo1/dist/assets/media/products/12.png')"></div>
                    <!--end::Image-->
                    <!--begin::Card-->
                    <div class="card card-custom w-auto w-md-300px w-lg-auto w-xxl-300px ml-auto">
                        <!--begin::Card Body-->
                        <div class="card-body px-12 py-10">
                            <h3 class="font-weight-bolder font-size-h2 mb-1">
                                <a href="#" class="text-dark-75">Nike True Balance</a>
                            </h3>
                            <div class="text-primary font-size-h4 mb-9">$ 399.99</div>
                            <div class="font-size-sm mb-8">Outlines keep you honest. They stop you from indulging in poorly ought out metaphorsy about driving and keep you focused one the overall structure of your post</div>
                            <!--begin::Info-->
                            <div class="d-flex mb-3">
                                <span class="text-dark-50 flex-root font-weight-bold">Shoes color</span>
                                <span class="text-dark flex-root font-weight-bold">Nike</span>
                            </div>
                            <div class="d-flex mb-3">
                                <span class="text-dark-50 flex-root font-weight-bold">SKU</span>
                                <span class="text-dark flex-root font-weight-bold">NF3535</span>
                            </div>
                            <div class="d-flex mb-3">
                                <span class="text-dark-50 flex-root font-weight-bold">Color</span>
                                <span class="text-dark flex-root font-weight-bold">White</span>
                            </div>
                            <div class="d-flex mb-3">
                                <span class="text-dark-50 flex-root font-weight-bold">Collection</span>
                                <span class="text-dark flex-root font-weight-bold">2020 Spring</span>
                            </div>
                            <div class="d-flex">
                                <span class="text-dark-50 flex-root font-weight-bold">In Stock</span>
                                <span class="text-dark flex-root font-weight-bold">280</span>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Card Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Card Body-->
            </div>
            <!--end::Card-->
        
            <div class="card card-custom gutter-b">
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Colores <span class="text-muted font-size-sm">({{ $product->colors()->count() }})</span></span>
                    </h3>
                    
                    {{-- @include('admin.color.create') --}}
                    
                </div>
                <div class="card-body pt-0 pb-3 ">
        
                    <div class="mb-5 ">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="row align-items-center">
                                    <div class="col-md-6 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input 
                                                wire:model="search"
                                                type="search" 
                                                class="form-control"
                                                placeholder="Buscar...">
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2 my-md-0">
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
                            </div>
                        </div>
                    </div>
        
                     <!--begin::Table-->
                     <div class="table-responsive" >
                        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                            <thead>
                                <tr class="text-uppercase">
                                    <th>Marca</th>
                                    <th>Productos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($colors as $color)
                                    <tr>
                                        <td>
                                            <span class="font-weight-bolder font-size-lg ">{{ $color->name }}</span>
                                        </td>
                                        <td>0</td>
                                        <td>
                                            <div class="d-flex justify-content-end">
                                                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left"  style="position: initial!important;">
                                                    <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ki ki-bold-more-hor"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="position: inherit;">
                                                        <!--begin::Navigation-->
                                                        <ul class="navi navi-hover py-5">
                                                            <li class="navi-item">
                                                                <a href="#" data-toggle="modal" data-target=".edit-{{ $color->id }}" class="navi-link">
                                                                    <span class="navi-icon">
                                                                        <i class="fa fa-pen"></i>
                                                                    </span>
                                                                    <span class="navi-text">Editar</span>
                                                                </a>
                                                            </li>
                                                            <li class="navi-item" onclick="event.preventDefault(); confirmDestroy({{ $color->id }})">
                                                                <a href="#" class="navi-link">
                                                                    <span class="navi-icon">
                                                                        <i class="fa fa-trash"></i>
                                                                    </span>
                                                                    <span class="navi-text">Eliminar</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <!--end::Navigation-->
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
        
                                    @include('admin.color.edit')
                                
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
        
                    {{-- {{ $colors->links() }} --}}
        
                </div>
                <!--end::Body-->
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
