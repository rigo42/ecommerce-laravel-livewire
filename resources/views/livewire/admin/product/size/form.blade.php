<div>

    <!--begin::Form-->
    <form class="form" wire:submit.prevent="{{ $method }}">
        <div class="row">
            <div class="col-xl-12">
                <div class="my-5">

                    @include('components.error-list')

                    <div class="form-group mb-8">
                        <label class="font-weight-bolder">Medida <span class="text-danger">*</span></label>
                        <input 
                            wire:model.defer="size.name"
                            type="text"
                            class="form-control form-control-solid form-control-lg"
                        >
                        @error('size.name') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                    </div>

                    <div class="form-group mb-8">
                        <label class="font-weight-bolder">Colores correspondientes a este color</label>
                        <div class="checkbox-list pt-4">
                            @forelse ($colors as $color)
                                <label class="checkbox checkbox-lg mb-7">
                                    <input wire:model.defer="colorArray" type="checkbox" value="{{ $color->id }}"/>
                                    <span ></span>
                                    <div class="font-size-lg text-dark-75 font-weight-bold">{{ $color->name }}</div>
                                </label>
                            @empty 
                                <label class="badge badge-secondary" for="">Ningún color encontrado</label>
                            @endforelse
                        </div>
                        @error('colorArray') <div><span class="text-danger">{{ $message }}</span></div> @enderror
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
