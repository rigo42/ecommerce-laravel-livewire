<div>

    <!--begin::Form-->
    <form class="form" wire:submit.prevent="{{ $method }}">
        <div class="row">
            <div class="col-xl-12">
                <div class="my-5">

                    @include('components.error-list')

                    <div class="form-group">
                        <label class="label-control">Nombre <span class="text-danger">*</span></label>
                        <input 
                            wire:model.defer="tag.name" 
                            type="text" 
                            required
                            class="form-control form-control-solid @error('tag.name') is-invalid @enderror"  
                            placeholder="Ingresa un nombre de la etiqueta" />
                        @error('tag.name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
        
        <div class="separator separator-dashed my-5"></div>

        <div class="text-center justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-chevron-circle-left"></i> Cerrar</button>
            <button 
                wire:loading.class="spinner spinner-white spinner-right" 
                wire:loading.attr="disabled" 
                wire:target="{{ $method }}" 
                class="btn btn-primary font-weight-bolder mr-2">
                <i class="fa fa-save"></i>
                Guardar cambios
            </button>
        </div>
        
    </form>


</div>
