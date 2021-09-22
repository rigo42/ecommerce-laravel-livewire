<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
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
        $brands = brand::orderBy('id', 'desc');

        if($this->search){
            $brands = $brands->where('name', 'LIKE', "%{$this->search}%");
        }

        $brands = $brands->paginate($this->perPage);
        

        return view('livewire.admin.brand.index', compact('brands'));
    }

    public function destroy(Brand $brand)
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
