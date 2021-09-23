<div class="container">

    <div class="row">
        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-body">
                        
                    <div class="my-5">
                        <h3 class="text-dark font-weight-bold mb-10">Información general</h3>
    
                        @include('components.error-list')
    
                        
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Imagen <span class="text-danger">*</span></label>
                            <div class="col-lg-9 col-xl-9">
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
                            <label class="col-3">Nombre <span class="text-danger">*</span></label>
                            <div class="col-9">
                                <div class="input-group input-group-solid">
                                    <input 
                                        wire:model.defer="product.name" 
                                        type="text" 
                                        required
                                        class="form-control form-control-solid @error('product.name') is-invalid @enderror"  
                                        placeholder="Nombre del producte" />
                                </div>
                                @error('product.name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">SKU</label>
                            <div class="col-9">
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
                            <label class="col-3">Cantidad</label>
                            <div class="col-9">
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
                            <label class="col-3">Precio</label>
                            <div class="col-9">
                                <input 
                                    wire:model.defer="product.price" 
                                    class="form-control form-control-solid @error('product.price') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="Ej: 1500"/>
                                @error('product.price') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">Detalle</label>
                            <div class="col-9">
                                <input 
                                    wire:model.defer="product.detail" 
                                    class="form-control form-control-solid @error('product.detail') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="Pequeña descripción del producto"/>
                                @error('product.detail') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">Detalle</label>
                            <div class="col-9">
                                <input 
                                    wire:model.defer="product.detail" 
                                    class="form-control form-control-solid @error('product.detail') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="Pequeña descripción del producto"/>
                                @error('product.detail') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">Descripción</label>
                            <div class="col-9">
                                <textarea wire:model.defer="product.description" class="description" name="" id="" cols="30" rows="10"></textarea>
                                @error('product.description') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            </div>
                        </div>

                    </div>
                    
                    <div class="separator separator-dashed my-10"></div>
    
                    <div class="my-5">
                        <h3 class="text-dark font-weight-bold mb-10">Información extra</h3>
                        
                        <div class="form-group row">
                            <label class="col-3">Dirección</label>
                            <div class="col-9">
                                <input 
                                    wire:model.defer="product.address" 
                                    class="form-control form-control-solid @error('product.address') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="Dirección fisica" />
                                @error('product.address') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">Razón social</label>
                            <div class="col-9">
                                <input 
                                    wire:model.defer="product.social_reason" 
                                    class="form-control form-control-solid @error('product.social_reason') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="Razón social" />
                                @error('product.social_reason') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">Dirección fiscal</label>
                            <div class="col-9">
                                <input 
                                    wire:model.defer="product.fiscal_address" 
                                    class="form-control form-control-solid @error('product.fiscal_address') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="Dirección fiscal" />
                                @error('product.fiscal_address') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">RFC</label>
                            <div class="col-9">
                                <input 
                                    wire:model.defer="product.rfc" 
                                    class="form-control form-control-solid @error('product.rfc') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="RFC" />
                                @error('product.rfc') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">Categoría </label>
                            <div class="col-9">
                                <div >
                                    <select 
                                        wire:model="product.category_product_id" 
                                        class="form-control selectpicker form-control-solid @error('product.category_product_id') is-invalid @enderror" 
                                        data-size="7"
                                        data-live-search="true"
                                        data-show-subtext="true"
                                    >
                                        <option value="">Ninguna</option>
                                        @foreach ($categories as $category)
                                            <option data-subtext="{{ $category->description }}" value="{{ $category->id }}">{{ $categoryproduct->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="form-text text-muted">Elije la categoría correspondiente al producte</span>
                                @error('product.category_product_id') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">Estrellas </label>
                            <div class="col-9">
                                <div class="star-rating">
                                    <input wire:model.defer="product.stars" type="radio" name="stars" id="star-a" value="5"/>
                                    <label for="star-a"></label>
                            
                                    <input wire:model.defer="product.stars" type="radio" name="stars" id="star-b" value="4"/>
                                    <label for="star-b"></label>
                            
                                    <input wire:model.defer="product.stars" type="radio" name="stars" id="star-c"  value="3"/>
                                    <label for="star-c"></label>
                            
                                    <input wire:model.defer="product.stars" type="radio" name="stars" id="star-d" value="2"/>
                                    <label for="star-d"></label>
                            
                                    <input wire:model.defer="product.stars" type="radio" name="stars" id="star-e" value="1"/>
                                    <label for="star-e"></label>
                                </div>
    
                                @error('product.stars') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                            </div>
                        </div>
                    </div>
    
                    <!--end::Form-->
                    <div class="separator separator-dashed my-5"></div>
    
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
            <!--begin::Forms Widget 13-->
            <div class="card card-custom gutter-b">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column mb-3">
                        <span class="card-label font-size-h3 font-weight-bolder text-dark">Add New Product</span>
                        <span class="text-muted mt-5 font-weight-bolder font-size-lg">Pending Image</span>
                    </h3>
                </div>
                <!--begin::Body-->
                <div class="card-body pt-4">
                    <!--begin::Form-->
                    <form>
                        <!--begin::Product images-->
                        <div class="d-flex mb-8 justify-content-between">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-70 flex-shrink-0 mr-4 bg-light">
                                <div class="symbol-label" style="background-image: url('/metronic/theme/html/demo1/dist/assets/media/products/11.png')"></div>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Symbol-->
                            <div class="symbol symbol-70 flex-shrink-0 mr-4">
                                <div class="symbol-label" style="background-image: url('/metronic/theme/html/demo1/dist/assets/media/products/12.png')"></div>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Symbol-->
                            <div class="symbol symbol-70 flex-shrink-0">
                                <a href="#" class="h-70px w-70px btn btn-light-primary d-flex flex-column flex-center font-weight-bolder p-0">
                                <span class="svg-icon svg-icon-lg m-0">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Image.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z" fill="#000000" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>Upload</a>
                            </div>
                            <!--end::Symbol-->
                        </div>
                        <!--end::Product images-->
                        <!--begin::Product info-->
                        <div class="mt-6">
                            <div class="text-muted mb-4 font-weight-bolder font-size-lg">Product Info</div>
                            <!--begin::Input-->
                            <div class="form-group mb-8">
                                <label class="font-weight-bolder">Name</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" placeholder="" />
                            </div>
                            <div class="form-group mb-8">
                                <label class="font-weight-bolder">Category</label>
                                <select class="form-control form-control-solid form-control-lg">
                                    <option></option>
                                    <option>Mens</option>
                                    <option>Womens</option>
                                    <option>Accessories</option>
                                    <option>Technology</option>
                                    <option>Appliances</option>
                                </select>
                            </div>
                            <div class="form-group mb-8">
                                <label class="font-weight-bolder">Size</label>
                                <select class="form-control form-control-solid form-control-lg">
                                    <option></option>
                                    <option>XS</option>
                                    <option>S</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                </select>
                            </div>
                            <div class="form-group mb-8">
                                <label for="exampleTextarea" class="font-weight-bolder">Description</label>
                                <textarea class="form-control form-control-solid form-control-lg" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bolder">Price (Euro)</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" placeholder="" />
                            </div>
                            <!--begin::Color-->
                            <div class="form-group">
                                <label class="font-weight-bolder">Color</label>
                                <div class="radio-inline mb-11">
                                    <label class="radio radio-accent radio-danger mr-0">
                                        <input type="radio" name="color-selector" checked="checked" />
                                        <span></span>
                                    </label>
                                    <label class="radio radio-accent radio-primary mr-0">
                                        <input type="radio" name="color-selector" />
                                        <span></span>
                                    </label>
                                    <label class="radio radio-accent radio-success mr-0">
                                        <input type="radio" name="color-selector" />
                                        <span></span>
                                    </label>
                                    <label class="radio radio-accent radio-info mr-0">
                                        <input type="radio" name="color-selector" />
                                        <span></span>
                                    </label>
                                    <label class="radio radio-accent radio-dark mr-0">
                                        <input type="radio" name="color-selector" />
                                        <span></span>
                                    </label>
                                    <label class="radio radio-accent radio-secondary mr-0">
                                        <input type="radio" name="color-selector" />
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <!--end::Color-->
                            <button type="submit" class="btn btn-primary font-weight-bolder mr-2 px-8">Save</button>
                            <button type="reset" class="btn btn-clear font-weight-bolder text-muted px-8">Discard</button>
                            <!--end::Input-->
                        </div>
                        <!--end::Product info-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Body-->
            </div>
        </div>
    </div>
    
    <!--end::Card-->

    @push('footer')
        <script>
            Livewire.on('renderJs', function(){
                $('.selectpicker').selectpicker({
                    liveSearch: true,
                    showSubtext: true 
                });
            });


            $('.description').summernote({
                height: 150,
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('product.description', contents);
                    }
                }
            });
        </script>
    @endpush
        
</div>
