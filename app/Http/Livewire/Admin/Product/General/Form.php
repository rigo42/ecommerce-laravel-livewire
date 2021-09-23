<?php

namespace App\Http\Livewire\Admin\Product\General;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class Form extends Component
{
    use WithFileUploads;
    
    public $method;
    public $product;

    //Tools
    public $imageTmp;

    public function mount(Product $product, $method){
        $this->product = $product;
        $this->method = $method;  
    }

    protected function rules()
    {
        return [
            'product.brand_id' => 'nullable|exists:brands,id',
            'product.gender_id' => 'nullable|exists:genders,id',
            'product.name' => 'required',
            'product.detail' => 'required',
            'product.description' => 'required',
            'product.sku' => 'nullable',
            'product.quantity' => 'required',
            'product.price' => 'required',
            'product.featured' => 'nullable',
            'product.stock' => 'required',
            'product.promotion' => 'nullable',
            'product.price_promotion' => 'nullable',
            'product.end_promotion' => 'nullable',
            'product.weight' => 'nullable',
            'product.height' => 'nullable',
            'product.width' => 'nullable',
            'product.length' => 'nullable',
            'product.meta_keywords' => 'nullable',
        ];

    }

    public function render()
    {
        $categories = Category::orderBy('name')->cursor();
        $genders = Gender::orderBy('id', 'desc')->cursor();
        $brands = Brand::orderBy('id', 'desc')->cursor();
        // $this->emit('renderJs');
        return view('livewire.admin.product.general.form', compact('categories', 'genders', 'brands'));
    }

    public function store(){
        $this->validate();
        $this->validateImage();
        $this->product->save();
        $this->saveImage();
        $this->flash('success', 'Producto agregado con éxito');
        return redirect()->route('admin.product.general.show', $this->product);
    }

    public function update(){
        $this->validate();
        $this->validateImage();
        $this->product->update();
        $this->saveImage();
        $this->flash('success', 'Producto actualizado con éxito');
        return redirect()->route('admin.product.general.show', $this->product);
    }

    public function validateImage(){
        if(!$this->product->image){
            $this->validate([
                'imageTmp' => 'required|image'
            ]);
        }
    }

    public function saveImage(){
        if($this->imageTmp){

            $url = $this->imageTmp->store('public/product');
            $imageOptimized = Image::make(Storage::get($url))->widen(600)->encode('webp', 80);
            $newName = $url.'.webp';

            Storage::put($url, (string) $imageOptimized);
            Storage::rename($url, $newName);

            if($this->product->image){
                if(Storage::exists($this->product->image->url)){
                    Storage::delete($this->product->image->url);
                }
                $this->product->image()->update([
                    'url' => $newName,
                ]);
            }else{
                $this->product->image()->create([
                    'url' => $newName,
                ]);
            }

        }
    }

    public function removeImage(){
        if($this->product->image){
            if(Storage::exists($this->product->image->url)){
                Storage::delete($this->product->image->url);
            }
            
            $this->product->image()->delete();
            $this->product->image = null;
        }
        $this->reset('imageTmp');
        $this->alert('success', 'Imagen eliminada con exito');
    }

}
