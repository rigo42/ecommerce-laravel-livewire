<div>

    <!--begin::Form-->
    <form class="form" wire:submit.prevent="{{ $method }}">
        <div class="row">
            <div class="col-xl-12">
                <div class="my-5">

                    @include('components.error-list')

                    <div class="form-group mb-8">
                        <label class="font-weight-bolder">Color <span class="text-danger">*</span></label>
                        <input 
                            wire:model.defer="color.hexadecimal"
                            type="color"
                            class="form-control form-control-solid form-control-lg"
                        >
                        @error('color.hexadecimal') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                    </div>

                    <div class="form-group mb-8">
                        <label class="font-weight-bolder">Nombre del color <span class="text-danger">*</span></label>
                        <input 
                            wire:model.defer="color.name"
                            type="text"
                            class="form-control form-control-solid form-control-lg"
                        >
                        @error('color.name') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                    </div>

                    <div class="form-group mb-8">
                        <label class="font-weight-bolder">Medidas correspondientes a este color</label>
                        <div class="checkbox-list pt-4">
                            @forelse ($sizes as $size)
                                <label class="checkbox checkbox-lg mb-7">
                                    <input wire:model.defer="sizeArray" type="checkbox" value="{{ $size->id }}"/>
                                    <span></span>
                                    <div class="font-size-lg text-dark-75 font-weight-bold">{{ $size->name }}</div>
                                </label>
                            @empty 
                                <label class="badge badge-secondary" for="">Ningúna medida encontrada</label>
                            @endforelse
                        </div>
                        @error('sizeArray') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                    </div>

                    <div class="form-group mb-8">
                        <label class="font-weight-bolder ">Imágenes del producto relacionadas a este color</label>
                
                        @if ($color->imageMultiples()->count())
                        
                            <!--begin::Product images-->
                            <div class="d-block mb-8 justify-content-start pt-4">
                                
                                @foreach ($color->imageMultiples()->get() as $image)
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
