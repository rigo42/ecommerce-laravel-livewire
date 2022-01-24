<div wire:ignore.self wire:key="edit-{{ $tag->id }}" data-backdrop="static" class="modal fade edit-{{ $tag->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ $tag->name }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @livewire('admin.blog.tag.form', ['tag' => $tag, 'method' => 'update'], key($tag->id))
            </div>
        </div>
    </div>
</div>