<?php

namespace App\Http\Livewire\Admin\Blog\Category;

use App\Models\BlogCategory;
use Exception;
use Illuminate\Support\Facades\Storage;
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
        $categories = BlogCategory::with('blogs')->orderBy('id', 'desc');

        if($this->search){
            $categories = $categories->where('name', 'LIKE', "%{$this->search}%");
        }

        $categories = $categories->paginate($this->perPage);
        return view('livewire.admin.blog.category.index', compact('categories'));
    }

    public function destroy(BlogCategory $category)
    {
        try{
            $category->delete();
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
