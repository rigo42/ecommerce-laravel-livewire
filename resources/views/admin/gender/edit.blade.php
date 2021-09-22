<div wire:ignore.self wire:key="edit-{{ $gender->id }}" data-backdrop="static" class="modal fade edit-{{ $gender->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ $gender->name }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @livewire('admin.gender.form', ['gender' => $gender, 'method' => 'update'], key($gender->id))
            </div>
        </div>
    </div>
</div>