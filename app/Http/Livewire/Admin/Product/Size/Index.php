<?php

namespace App\Http\Livewire\Admin\Product\Size;

use App\Models\Product;
use App\Models\Size;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $product;

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

    public function mount(Product $product){
        $this->product = $product;
    }

    public function render()
    {
        $sizes = $this->product->sizes();

        if($this->search){
            $sizes = $sizes->where('name', 'LIKE', "%{$this->search}%");
        }

        $sizes = $sizes->paginate($this->perPage);
        
        return view('livewire.admin.product.size.index', compact('sizes'));
    }

    public function destroy(Size $size)
    {
        try{
            $size->delete();
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
