<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Models\Banner;
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
        $banners = Banner::orderBy('id', 'desc');

        if($this->search){
            $banners = $banners->where('title', 'LIKE', "%{$this->search}%")->orWhere('subtitle', 'LIKE', "%{$this->search}%");
        }

        $banners = $banners->paginate($this->perPage);
        

        return view('livewire.admin.banner.index', compact('banners'));
    }

    public function destroy(Banner $banner)
    {
        try{
            if($banner->image && Storage::exists($banner->image->url)){
                Storage::delete($banner->image->url);
            }
            $banner->delete();
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
