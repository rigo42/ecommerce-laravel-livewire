<div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Banners <span class="text-muted font-size-sm">({{ $banners->count() }})</span></span>
            </h3>
            
            @include('admin.banner.create')
            
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

            <div class="row">
        
                @foreach ($banners as $banner)
                    <div class="col-lg-4">
                        
                        <div class="card card-custom overlay">
                            <div class="card-body p-0">
                                <div class="overlay-wrapper">
                                    <img src="{{ Storage::url($banner->image->url) }}" alt="" class="w-100 rounded" />
                                </div>
                                <div class="overlay-layer">
                                    <a href="#" data-toggle="modal" data-target=".edit-{{ $banner->id }}" class="btn font-weight-bold btn-primary btn-shadow">Editar</a>
                                    <a href="#" onclick="event.preventDefault(); confirmDestroy({{ $banner->id }})" class="btn font-weight-bold btn-danger btn-shadow ml-2">Eliminar</a>
                                </div>
                            </div>
                        </div>

                        @include('admin.banner.edit')

                    </div>
                @endforeach
                
            </div>

            {{ $banners->links() }}

        </div>
        <!--end::Body-->
    </div>

    @push('footer')
        <script>

            Livewire.on('render', function(){
                $('.modal').modal('hide');
            });

            function confirmDestroy(id){
                swal.fire({
                    title: "¿Estas seguro?",
                    text: "No podrá recuperar este banner.",
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
