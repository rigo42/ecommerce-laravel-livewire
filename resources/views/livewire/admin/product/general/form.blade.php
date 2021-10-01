<div class="container-fluid">

    <div class="row">
        @if ($method == 'update')
            @include('admin.product.menu.index')
        @endif

        <div class="col-lg-6">
            <div class="card card-custom">
                <div class="card-body">
                        
                    {{-- Information general --}}
                    <div class="my-5">
                        <h3 class="text-dark font-weight-bold mb-10">Información general</h3>
    
                        @include('components.error-list')
                        
                        <div class="form-group row">
                            <label class="col-form-label">Imagen <span class="text-danger">*</span></label>
                            <div class="col-12">
                                <div class="card card-custom overlay">
                                    <div class="card-body p-0">
                                        <div class="overlay-wrapper">
                                            <img 
                                                @if ($imageTmp)
                                                    src='{{ $imageTmp->temporaryUrl() }}'
                                                @else    
                                                    src='{{ $product->imagePreview() }}'
                                                @endif
                                                class="w-100 rounded" 
                                            />
                                        </div>
                                        <div class="overlay-layer" style="opacity: 1;">
                                            <label for="imageTmp" class="btn font-weight-bold btn-primary btn-shadow">Editar</label>
                                            @if ($imageTmp || $product->image)
                                                <label wire:click="removeImage()" wire:loading.class="spinner spinner-white spinner-sm spinner-right" wire:target="removeImage" class="btn font-weight-bold btn-danger btn-shadow ml-2">Eliminar</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="image-input image-input-outline" >
                                    <div
                                        x-data="{ isUploading: false, progress: 0 }"
                                        x-on:livewire-upload-start="isUploading = true"
                                        x-on:livewire-upload-finish="isUploading = false"
                                        x-on:livewire-upload-error="isUploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                                    >
                                        <input wire:model.defer="imageTmp" id="imageTmp" type="file" accept=".png, .jpg, .jpeg, .webp, .webp2" class="d-none"/>
                        
                                        <!-- Progress Bar -->
                                        <div x-show="isUploading">
                                            <progress max="100" x-bind:value="progress"></progress>
                                        </div>
                                    </div>
                                </div>
                                @error('imageTmp') 
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Nombre <span class="text-danger">*</span></label>
                            <div class="col-12">
                                <div class="input-group input-group-solid">
                                    <input 
                                        wire:model.defer="product.name" 
                                        type="text" 
                                        required
                                        class="form-control form-control-solid @error('product.name') is-invalid @enderror"  
                                        placeholder="Nombre del producto" />
                                </div>
                                @error('product.name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">SKU</label>
                            <div class="col-12">
                                <div class="input-group input-group-solid">
                                    <input 
                                        wire:model.defer="product.sku" 
                                        type="text" 
                                        required
                                        class="form-control form-control-solid @error('product.sku') is-invalid @enderror" 
                                        placeholder="Sku del producto" />
                                </div>
                                @error('product.sku') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Cantidad <span class="text-danger">*</span></label>
                            <div class="col-12">
                                <div class="input-group input-group-solid">
                                    <input 
                                        wire:model.defer="product.quantity" 
                                        type="number" class="form-control form-control-solid @error('product.quantity') is-invalid @enderror" 
                                        placeholder="Cantidad de productos" />
                                </div>
                                @error('product.quantity') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Precio <span class="text-danger">*</span></label>
                            <div class="col-12">
                                <input 
                                    wire:model.defer="product.price" 
                                    class="form-control form-control-solid @error('product.price') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="Ej: 1500"/>
                                @error('product.price') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">¿Destacado? </label>
                            <div class="col-12">
                                <span class="switch switch-success">
                                    <label>
                                        <input wire:model.defer="product.featured" type="checkbox" name="select" />
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">En stock</label>
                            <div class="col-12">
                                <span class="switch switch-success">
                                    <label>
                                        <input wire:model.defer="product.stock" type="checkbox" name="select" />
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Detalle <span class="text-danger">*</span></label>
                            <div class="col-12">
                                <textarea
                                    wire:model.defer="product.detail" 
                                    class="form-control form-control-solid @error('product.detail') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="Pequeña descripción del producto"
                                    cols="30" rows="10"></textarea>
                                @error('product.detail') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Descripción <span class="text-danger">*</span></label>
                            <div class="col-12">
                                <div  wire:ignore>
                                    <textarea class="description" cols="30" rows="10">{{ $product->description }}</textarea>
                                </div>
                                @error('product.description') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            </div>
                        </div>

                    </div>

                    <div class="separator separator-dashed my-10"></div>

                    {{-- Information shipping --}}
                    <div class="my-5" >
                        <div class="my-5">
                            <h3 class="text-dark font-weight-bold ">Información de envío</h3>
                            <span class="label label-inline py-4">En caso de no rellenar toda la información de envío, el producto no podrá añadirse al carrito, en cambio se mostrará un boton de WhatsApp para ordenar por ese medio</span>
                        </div>
                        <div class="form-group row" >
                            <label class="col-form-label">Peso (kg) </label>
                            <div class="col-12">
                                <input 
                                    wire:model.defer="product.weight" 
                                    class="form-control form-control-solid @error('product.weight') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="¿Cuanto pesa el producto en KG?" />
                                @error('product.weight') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Alto (cm) </label>
                            <div class="col-12">
                                <input 
                                    wire:model.defer="product.height" 
                                    class="form-control form-control-solid @error('product.height') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="Altura del producto en CM" />
                                @error('product.height') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Ancho (cm) </label>
                            <div class="col-12">
                                <input 
                                    wire:model.defer="product.width" 
                                    class="form-control form-control-solid @error('product.width') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="Ancho del producto en CM" />
                                @error('product.width') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Largo (cm) </label>
                            <div class="col-12">
                                <input 
                                    wire:model.defer="product.length" 
                                    class="form-control form-control-solid @error('product.length') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="Largo del producto en CM" />
                                @error('product.length') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            </div>
                        </div>
                    </div>                        
    
                    <div class="separator separator-dashed my-5"></div>
    
                    {{-- Button save --}}
                    <div class="text-center justify-content-center">
                        <button 
                            wire:click="{{ $method }}"
                            wire:loading.class="spinner spinner-white spinner-right" 
                            wire:loading.attr="disabled" 
                            wire:target="{{ $method }}" 
                            class="btn btn-primary font-weight-bolder mr-2">
                            <i class="fa fa-save"></i>
                            Guardar cambios
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            {{-- Information extra --}}
            <div class="card card-custom gutter-b">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column mb-3">
                        <span class="card-label font-size-h3 font-weight-bolder text-dark">Información extra</span>
                    </h3>
                </div>
                <div class="card-body pt-4">
                    <div class="mt-6">
                        <div class="form-group mb-8">
                            <label class="font-weight-bolder ">Imágenes del producto</label>
                    
                            @if ($product->imageMultiples()->count())
                                <!--begin::Product images-->
                                <div class="d-block mb-8 justify-content-start pt-4">
                                    
                                    @foreach ($product->imageMultiples()->get() as $image)
                                        <div class="symbol symbol-70 flex-shrink-0 mr-4 bg-light ">
                                            <div class="symbol-label" style="background-image: url({{ Storage::url($image->url) }})">
                                                <label wire:click.prevent="removeImages({{ $image->id }})" title="Remover imagen" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow image-edit" >
                                                    <i class="fa fa-trash icon-sm text-muted"></i>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                </div>
                            @endif
                            
                            <div class="form-group mb-8" wire:ignore.self>
                                <x-forms.filepond 
                                    wire:model.defer="imagesTmp"
                                    multiple
                                    allowImagePreview
                                    imagePreviewMaxHeight="200"
                                    allowFileTypeValidation
                                    acceptedFileTypes="['image/png', 'image/jpg', 'image/jpeg', 'image/gif']"
                                />
                            </div>
                        </div>

                        <div class="form-group mb-8">
                            <label class="font-weight-bolder">Marca</label>
                            <select 
                                wire:model.defer="product.brand_id"
                                data-size="7"
                                data-live-search="true"
                                data-show-subtext="true"
                                class="selectpicker form-control form-control-solid form-control-lg"
                            >
                                <option>Ningúna</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('product.brand_id') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            <a href="#" data-toggle="modal" data-target=".createBrand" class="btn-shadow font-weight-bold mr-2 text-end"> Nueva marca</a>
                        </div>
                        <div class="form-group mb-8">
                            <label class="font-weight-bolder">Género</label>
                            <select 
                                wire:model.defer="product.gender_id"
                                data-size="7"
                                data-live-search="true"
                                data-show-subtext="true"
                                class="selectpicker form-control form-control-solid form-control-lg">
                                <option>Ningúno</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                @endforeach
                            </select>
                            @error('product.gender_id') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            <a href="#" data-toggle="modal" data-target=".createGender" class="btn-shadow font-weight-bold mr-2 text-end"> Nuevo género</a>
                        </div>

                        @if ($categories->count())
                            <div class="form-group">
                                <label class="font-weight-bolder">Categorías</label>
                                <!--begin::Checkbox list-->
                                <div class="checkbox-list pt-4">
                                    @foreach ($categories as $category)
                                    <label class="checkbox checkbox-lg mb-7">
                                        <input wire:model.defer="categoryArray" type="checkbox" value="{{ $category->id }}"/>
                                        <span></span>
                                        <div class="font-size-lg text-dark-75 font-weight-bold">{{ $category->name }}</div>
                                        <div class="ml-auto text-muted font-weight-bold">{{ $category->products->count() }}</div>
                                    </label>
                                    @endforeach
                                    
                                </div>
                                <!--end::Checkbox list-->
                                @error('categoryArray') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            </div>
                            <!--end::Categories-->
                        @endif
                        
                    </div>      
                </div>
            </div>

            {{-- Promotion --}}
            <div  x-data="{ open: {{ $product->hasPromotionToString() }} }" class="card card-custom gutter-b" >
                <div class="card-header border-0">
                    <h3 class="card-title">Promoción </h3>
                    <div class="card-toolbar">
                        <div class="example-tools justify-content-center">
                            <span class="switch">
                                <label>
                                    <input x-on:click="open = !open" wire:model.defer="product.promotion" type="checkbox" />
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4" x-show="open">
                    <div class="mt-6">
                        @if ($product->promotionExpired())
                            <div class="alert alert-warning" role="alert">
                                Promoción caducada
                            </div>
                        @endif
                        <div class="form-group mb-8">
                            <label class="font-weight-bolder">Nuevo precio <span class="text-danger">*</span></label>
                            <input type="number" wire:model.defer="product.price_promotion" placeholder="Ingresa el nuevo precio" class="@error('product.price_promotion') is-invalid @enderror form-control form-control-solid form-control-lg"/>
                            @error('product.price_promotion') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                        </div>
                        <div class="form-group mb-8">
                            <label class="font-weight-bolder">Fecha de finalización <span class="text-danger">*</span></label>
                            <input wire:model.defer="product.end_promotion" type="text" placeholder="Seleccione la fecha" class="@error('product.end_promotion') is-invalid @enderror end_promotion form-control form-control-solid form-control-lg"/>
                            @error('product.end_promotion') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                        </div>
                    </div>     
                </div>
            </div>
        </div>
    </div>
    
    {{-- Create brand --}}
    <div wire:ignore.self wire:key="createBrand" data-backdrop="static" class="modal fade create createBrand" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Nueva marca
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire('admin.brand.form', ['method' => 'store'], key('createBrand'))
                </div>
            </div>
        </div>
    </div>

    {{-- Create gender --}}
    <div wire:ignore.self wire:key="createGender" data-backdrop="static" class="modal fade create createGender" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Nuevo género
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire('admin.gender.form', ['method' => 'store'], key('createGender'))
                </div>
            </div>
        </div>
    </div>

    @push('footer')
        <script src="{{ asset('assets/admin') }}/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
        <script>

            //Render all js
            Livewire.on('renderJs', function(){
                $('.selectpicker').selectpicker({
                    liveSearch: true,
                    showSubtext: true
                });
            });

            //Close all modal
            Livewire.on('render', function(){
                $('.modal').modal('hide');
            });


            $('.description').summernote({
                height: 150,
                placeholder: 'Toda la descripción del producto',
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('product.description', contents);
                    }
                }
            });

            // Init date
            $('.end_promotion').datepicker({
                format: "yyyy/mm/dd",
                todayBtn: "linked",
                clearBtn: true,
                todayHighlight: true,
                autoclose: true,
                language: 'es',
                orientation: "bottom left",
            }).on('changeDate', function(e){
                @this.set('product.end_promotion', e.target.value);
            });
        </script>
    @endpush
        
</div>
