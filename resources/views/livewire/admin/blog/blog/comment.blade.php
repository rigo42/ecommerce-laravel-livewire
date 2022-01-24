<div>
    <div class="d-flex align-items-center mb-10">
        <div class="symbol symbol-40 symbol-light-success mr-5">
            <img src="{{ $comment->imagePreview() }}" class="h-75 align-self-end" alt="{{ $comment->name }}">
        </div>
        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
            <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">{{ $comment->name }}</a>
            <label 
                >
            </label>
            <span class="text-muted pb-2">Fecha: {{ $comment->dateToString() }} 
                @if ($comment->aproved)
                    <span class=" label label-inline label-primary">Aprovado  <span wire:loading.class="spinner-grow spinner-grow-sm ml-2" wire:target="refused, aproved"></span></span>
                @else
                    <span class=" label label-inline label-warning">Sin aprovación  <span wire:loading.class="spinner-grow spinner-grow-sm ml-2" wire:target="refused, aproved"></span></span>
                @endif
            </span>
            <span class="text-muted">{{ substr($comment->body, 0, 50) }}...</span>
        </div>
        <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="Opciones">
            <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ki ki-bold-more-hor"></i>
            </a>
            <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                <ul class="navi navi-hover">
                    <li class="navi-header font-weight-bold py-4">
                        <span class="font-size-lg">Opciones:</span>
                    </li>
                    <li class="navi-separator mb-3 opacity-70"></li>
                    <li class="navi-item">
                        <a href="#" data-toggle="modal" data-target=".comment-model-{{ $comment->id }}" class="navi-link">
                            <span class="navi-text">
                                <span class="label label-xl label-inline">Ver</span>
                            </span>
                        </a>
                    </li>
                    @if ($comment->aproved)
                        <li class="navi-item">
                            <a wire:click.prevent="refused" href="#" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline label-warning">Rechazar</span>
                                </span>
                            </a>
                        </li>
                    @else
                        <li class="navi-item">
                            <a wire:click.prevent="aproved" href="#" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline label-primary">Aprovar</span>
                                </span>
                            </a>
                        </li>
                    @endif   
                        <li class="navi-item">
                            <a wire:click.prevent="destroy" href="#" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline ">Eliminar</span>
                                </span>
                            </a>
                        </li>                 
                </ul>
            </div>
        </div>
    </div>

    <div wire:ignore.self wire:key="comment-model-{{ $comment->id }}" data-backdrop="static" class="modal fade comment-model-{{ $comment->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Comentario de: {{ $comment->name }}    
                        @if ($comment->aproved)
                            <span class=" label label-inline label-primary">Aprovado  <span wire:loading.class="spinner-grow spinner-grow-sm ml-2" wire:target="refused, aproved"></span></span>
                        @else
                            <span class=" label label-inline label-warning">Sin aprovación  <span wire:loading.class="spinner-grow spinner-grow-sm ml-2" wire:target="refused, aproved"></span></span>
                        @endif
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    {{ $comment->body }}
                </div>
                <div class="modal-footer">
                    <div class="text-center justify-content-center">
                        <button 
                            class="btn btn-secondary mr-2" 
                            data-dismiss="modal">
                            <i class="fas fa-chevron-circle-left"></i> 
                        </button>
                        <button 
                            wire:click="refused"
                            wire:loading.class="spinner spinner-white spinner-right" 
                            wire:loading.attr="disabled" 
                            wire:target="refused" 
                            class="btn btn-warning font-weight-bolder mr-2">
                            <i class="fa fa-times"></i>
                        </button>
                        <button 
                            wire:click="aproved"
                            wire:loading.class="spinner spinner-white spinner-right" 
                            wire:loading.attr="disabled" 
                            wire:target="aproved" 
                            class="btn btn-primary font-weight-bolder mr-2">
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
