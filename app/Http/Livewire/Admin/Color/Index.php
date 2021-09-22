<?php

namespace App\Http\Livewire\Admin\Color;

use App\Models\Color;
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
        $colors = color::orderBy('id', 'desc');

        if($this->search){
            $colors = $colors->where('name', 'LIKE', "%{$this->search}%");
        }

        $colors = $colors->paginate($this->perPage);
        

        return view('livewire.admin.color.index', compact('colors'));
    }

    public function destroy(Color $color)
    {
        try{
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
