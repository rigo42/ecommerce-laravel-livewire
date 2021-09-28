<div>

    <!--begin::Form-->
    <form class="form" wire:submit.prevent="{{ $method }}">
        <div class="row">
            <div class="col-xl-12">
                <div class="my-5">

                    @include('components.error-list')

                    <div class="form-group mb-8">
                        <label class="font-weight-bolder">Color</label>
                        <select 
                            wire:model.defer="product.brand_id"
                            data-size="7"
                            data-live-search="true"
                            data-show-subtext="true"
                            class="selectpicker form-control form-control-solid form-control-lg"
                        >
                            <option>Selecciona un color</option>
                            @foreach ($colors as $color)
                                <option data-content="<span style='background-color: {{ $color->hexadecimal }};' class='label label-success label-inline label-rounded' {{ $color->name }} </span>">{{ $color->name }}</option>
                            @endforeach
                        </select>
                        <a href="#" data-toggle="modal" data-target=".createColor" class="btn-shadow font-weight-bold mr-2 text-end"> Nueva marca</a>
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
