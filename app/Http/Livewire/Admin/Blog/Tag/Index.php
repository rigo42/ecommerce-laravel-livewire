<?php

namespace App\Http\Livewire\Admin\Blog\Tag;

use App\Models\BlogTag;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    //Tools
    public $perPage = 50;
    public $search;
    protected $queryString = ['search' => ['except' => '']];

    //Theme
    protected $paginationTheme = 'bootstrap';

    //Listeners
    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $tags = BlogTag::orderBy('id', 'desc');

        if($this->search){
            $tags = $tags->where('name', 'LIKE', "%{$this->search}%");
        }

        $tags = $tags->paginate($this->perPage);
        return view('livewire.admin.blog.tag.index', compact('tags'));
    }

    public function destroy(BlogTag $tag)
    {
        try{
            $tag->delete();
            $this->alert('success', 'Eliminación con éxito');
        }catch(Exception $e){
            $this->alert('error', 
                'Ocurrio un error en la eliminación: '.$e->getMessage(), 
                [
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'Entiendo',
                    'timer' => null,
                ]);
        }
    }
}
