<div wire:ignore.self wire:key="edit-{{ $banner->id }}" data-backdrop="static" class="modal fade edit-{{ $banner->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ $banner->title }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @livewire('admin.banner.form', ['banner' => $banner, 'method' => 'update'], key('edit-{{ $banner->id }}'))
            </div>
        </div>
    </div>
</div>