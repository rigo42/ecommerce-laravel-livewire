<?php

namespace App\Http\Livewire\Admin\Blog\Blog;

use Livewire\Component;
use Livewire\WithPagination;

class Comment extends Component
{
    public $comment;

    public function mount($comment){
        $this->comment = $comment;
    }

    public function render()
    {
        return view('livewire.admin.blog.blog.comment');
    }

    public function refused(){
        $this->comment->aproved = false;
        $this->comment->update();
        $this->alert('success', 'Comentario rechazado con éxito');
    }

    public function aproved(){
        $this->comment->aproved = true;
        $this->comment->update();
        $this->alert('success', 'Comentario aprovado con éxito');
    }

    public function destroy(){
        $this->comment->delete();
        $this->emit('render');
        $this->alert('success', 'Comentario eliminado con éxito');
    }
}
