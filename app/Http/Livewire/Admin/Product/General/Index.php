<?php

namespace App\Http\Livewire\Admin\Product\General;

use App\Models\Product;
use Exception;
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
        $products = Product::with('categories')->orderBy('id', 'desc');

        if($this->search){
            $products = $products->where('name', 'LIKE', "%{$this->search}%");
        }

        $products = $products->paginate($this->perPage);
        

        return view('livewire.admin.product.general.index', compact('products'));
    }

    public function destroy(Product $brand)
    {
        try{
            $brand->delete();
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
