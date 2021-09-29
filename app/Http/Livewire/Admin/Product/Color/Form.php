<?php

namespace App\Http\Livewire\Admin\Product\Color;

use App\Models\Color;
use App\Models\ImageMultiple;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;
    
    public $method;
    public $product;
    public $color;

    //Tools
    public $imagesTmp = [];
    public $sizeArray = [];

    public function mount(Product $product, Color $color, $method){
        $this->product = $product;
        $this->color = $color;
        $this->method = $method;   
        
        foreach($this->color->sizes as $size){
            array_push($this->sizeArray, "".$size->id."");
        }
    }

    protected function rules()
    {
        return [
            'color.name' => 'required',
            'color.hexadecimal' => 'required',
        ];

    }

    public function render()
    {
        $sizes = $this->product->sizes()->get();
        return view('livewire.admin.product.color.form', compact('sizes'));
    }

    public function store(){
        $this->validate();
        $this->color = $this->product->colors()->create($this->color->toArray());
        $this->saveImages();
        $this->saveSizes();
        $this->color = new Color();
        $this->reset('imagesTmp');
        $this->alert('success', 'Color agregado al producto con éxito');
        $this->emit('render');
    }

    public function update(){
        $this->validate();
        $this->color->update();
        $this->saveImages();
        $this->saveSizes();
        $this->alert('success', 'Color del producto actualizado con éxito');
        $this->emit('render');
    }

    public function saveSizes(){
        $this->color->sizes()->sync($this->sizeArray);
    }

    public function saveImages(){
        if($this->imagesTmp){

            foreach($this->imagesTmp as $imgs){

                $url = $imgs->store('public/product');
                $imageOptimized = Image::make(Storage::get($url))->widen(800)->encode('webp', 80);
                $newName = $url.'.webp';

                Storage::put($url, (string) $imageOptimized);
                Storage::rename($url, $newName);

                $this->color->imageMultiples()->create([
                    'url' => $newName,
                ]);
            }
        }
    }

    public function removeImages($id){
        $img = ImageMultiple::findOrFail($id);
        
        if(Storage::exists($img->url)){
            Storage::delete($img->url);
        }
        
        $img->delete();

        $this->alert('success', 'Imagen eliminada con éxito');
    }
    
}
