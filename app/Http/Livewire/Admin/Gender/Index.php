<?php

namespace App\Http\Livewire\Admin\Gender;

use App\Models\Gender;
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
        $genders = Gender::orderBy('id', 'desc');

        if($this->search){
            $genders = $genders->where('name', 'LIKE', "%{$this->search}%");
        }

        $genders = $genders->paginate($this->perPage);
        

        return view('livewire.admin.gender.index', compact('genders'));
    }

    public function destroy(Gender $gender)
    {
        try{
            $gender->delete();
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
