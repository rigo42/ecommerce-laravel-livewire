<div wire:ignore.self wire:key="edit-{{ $brand->id }}" data-backdrop="static" class="modal fade edit-{{ $brand->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ $brand->name }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @livewire('admin.brand.form', ['brand' => $brand, 'method' => 'update'], key($brand->id))
            </div>
        </div>
    </div>
</div>