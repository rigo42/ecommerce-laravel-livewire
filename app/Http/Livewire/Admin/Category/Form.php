<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class Form extends Component
{
    use WithFileUploads;

    public $method;
    public $category;

    //Tools
    public $imageTmp;

    public function mount(Category $category, $method){
        $this->category = $category;
        $this->method = $method;    
    }

    protected function rules()
    {
        return [
            'category.name' => 'required',
        ];

    }

    public function render()
    {
        return view('livewire.admin.category.form');
    }

    public function store(){
        $this->validate();
        $this->validateImage();
        $this->category->save();
        $this->saveImage();
        $this->category = new Category();
        $this->reset('imageTmp');
        $this->alert('success', 'Categoría agregado con éxito');
        $this->emit('render');
    }

    public function update(){
        $this->validate();
        $this->validateImage();
        $this->category->update();
        $this->saveImage();
        $this->alert('success', 'Categoría actualizado con éxito');
        $this->emit('render');
    }

    public function validateImage(){
        if(!$this->category->image){
            $this->validate([
                'imageTmp' => 'required|image'
            ]);
        }
    }

    public function saveImage(){
        if($this->imageTmp){

            $url = $this->imageTmp->store('public/category');
            $imageOptimized = Image::make(Storage::get($url))->encode('webp', 80);
            $newName = $url.'.webp';

            Storage::put($url, (string) $imageOptimized);
            Storage::rename($url, $newName);

            if($this->category->image){
                if(Storage::exists($this->category->image->url)){
                    Storage::delete($this->category->image->url);
                }
                $this->category->image()->update([
                    'url' => $newName,
                ]);
            }else{
                $this->category->image()->create([
                    'url' => $newName,
                ]);
            }

        }
    }

    public function removeImage(){
        if($this->category->image){
            if(Storage::exists($this->category->image->url)){
                Storage::delete($this->category->image->url);
            }
            
            $this->category->image()->delete();
            $this->category->image = null;
        }
        $this->reset('imageTmp');
        $this->alert('success', 'Imagen eliminada con éxito');
    }
}
