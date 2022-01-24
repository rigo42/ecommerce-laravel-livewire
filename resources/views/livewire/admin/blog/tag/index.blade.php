<div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Etiquetas <span class="text-muted font-size-sm">({{ $tags->count() }})</span></span>
            </h3>
            
            @include('admin.blog.tag.create')
            
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
                            <th>Nombre</th>
                            <th>Blogs</th>
                            <th class="d-flex justify-content-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->name }}</td>
                                <td>
                                    {{ count($tag->blogs) }}
                                </td>                            
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
                                                        <a href="#" data-toggle="modal" data-target=".edit-{{ $tag->id }}" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="fa fa-pen"></i>
                                                            </span>
                                                            <span class="navi-text">Editar</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item" onclick="event.preventDefault(); confirmDestroy({{ $tag->id }})">
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

                            @include('admin.blog.tag.edit')
                        
                       @endforeach
                    </tbody>
                </table>
            </div>
            <!--end::Table-->

            {{ $tags->links() }}

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
                    text: "No podrá recuperar esta etiqueta de blog.",
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
