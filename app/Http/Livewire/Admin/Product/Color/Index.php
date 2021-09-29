<?php

namespace App\Http\Livewire\Admin\Product\Color;

use App\Models\Color;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Storage;
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
        $colors = $this->product->colors();

        if($this->search){
            $colors = $colors->where('name', 'LIKE', "%{$this->search}%");
        }

        $colors = $colors->paginate($this->perPage);
        
        return view('livewire.admin.product.color.index', compact('colors'));
    }

    public function destroy(Color $color)
    {
        try{
            if($color->imageMultiples){
                foreach($color->imageMultiples as $image){
                    if(Storage::exists($image->url)){
                        Storage::delete($image->url);
                    }
                }                
            }
            $color->delete();
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
