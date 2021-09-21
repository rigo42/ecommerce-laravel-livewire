<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    //Tools
    public $perPage = 10;
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
        $categories = Category::orderBy('id', 'desc');

        if($this->search){
            $categories = $categories->where('title', 'LIKE', "%{$this->search}%")->orWhere('subtitle', 'LIKE', "%{$this->search}%");
        }

        $categories = $categories->paginate($this->perPage);
        

        return view('livewire.admin.category.index', compact('categories'));
    }

    public function destroy(Category $category)
    {
        try{
            if($category->image && Storage::exists($category->image->url)){
                Storage::delete($category->image->url);
            }
            $category->delete();
            $this->alert('success', 'Eliminación con exito');
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
