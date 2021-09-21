<div>

    <!--begin::Form-->
    <form class="form" wire:submit.prevent="{{ $method }}">
        <div class="row">
            <div class="col-xl-12">
                <div class="my-5">

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
                                                src='{{ $category->imagePreview() }}'
                                            @endif
                                            class="w-100 rounded" 
                                        />
                                    </div>
                                    <div class="overlay-layer" style="opacity: 1;">
                                        <label for="imageTmp-{{ $category->id }}" class="btn font-weight-bold btn-primary btn-shadow">Editar</label>
                                        @if ($imageTmp || $category->image)
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
                                    <input wire:model.defer="imageTmp" id="imageTmp-{{ $category->id }}" type="file" accept=".png, .jpg, .jpeg, .webp, .webp2" class="d-none"/>
                    
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
                                    wire:model.defer="category.name" 
                                    type="text" 
                                    required
                                    class="form-control form-control-solid @error('category.name') is-invalid @enderror"  
                                    placeholder="Ingresa un nombre" />
                            </div>
                            @error('category.name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </form>

    <div class="separator separator-dashed my-5"></div>

    <div class="text-center justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-chevron-circle-left"></i> Cerrar</button>
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
