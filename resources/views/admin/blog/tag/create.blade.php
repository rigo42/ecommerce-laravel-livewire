<div class="card-toolbar">
    <a href="#" data-toggle="modal" data-target=".create" class="btn btn-primary btn-shadow font-weight-bold mr-2 "><i class="fa fa-plus"></i> Nuevo</a>
</div>

<div wire:ignore.self wire:key="create" data-backdrop="static" class="modal fade create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Nueva etiqueta
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @livewire('admin.blog.tag.form', ['method' => 'store'], key('create'))
            </div>
        </div>
    </div>
</div>