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
                                                src='{{ $banner->banner() }}'
                                            @endif
                                            class="w-100 rounded" 
                                        />
                                    </div>
                                    <div class="overlay-layer" style="opacity: 1;">
                                        <label for="imageTmp" class="btn font-weight-bold btn-primary btn-shadow">Editar</label>
                                        @if ($imageTmp || $banner->image)
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
                        <label class="col-3">Titulo</label>
                        <div class="col-9">
                            <div class="input-group input-group-solid">
                                <input 
                                    wire:model.defer="banner.title" 
                                    type="text" 
                                    class="form-control form-control-solid @error('banner.title') is-invalid @enderror"  
                                    placeholder="Ingresa un titulo" />
                            </div>
                            @error('banner.title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Subtitulo</label>
                        <div class="col-9">
                            <div class="input-group input-group-solid">
                                <input 
                                    wire:model.defer="banner.subtitle" 
                                    type="text" 
                                    class="form-control form-control-solid @error('banner.subtitle') is-invalid @enderror"  
                                    placeholder="Ingresa un subtitulo" />
                            </div>
                            @error('banner.subtitle') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Link de acción</label>
                        <div class="col-9">
                            <div class="input-group input-group-solid">
                                <input 
                                    wire:model.defer="banner.link" 
                                    type="text" 
                                    class="form-control form-control-solid @error('banner.link') is-invalid @enderror"  
                                    placeholder="Link al cual se redirigirá después de dar clic" />
                            </div>
                            @error('banner.link') <span class="text-danger">{{ $message }}</span> @enderror
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
