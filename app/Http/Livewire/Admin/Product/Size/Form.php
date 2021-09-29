<?php

namespace App\Http\Livewire\Admin\Product\Size;

use App\Models\Product;
use App\Models\Size;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;
    
    public $method;
    public $product;
    public $size;

    //Tools
    public $colorArray = [];

    public function mount(Product $product, Size $size, $method){
        $this->product = $product;
        $this->size = $size;
        $this->method = $method;   
        
        foreach($this->size->colors as $color){
            array_push($this->colorArray, "".$color->id."");
        }
    }

    protected function rules()
    {
        return [
            'size.name' => 'required',
        ];

    }

    public function render()
    {
        $colors = $this->product->colors()->get();
        return view('livewire.admin.product.size.form', compact('colors'));
    }

    public function store(){
        $this->validate();
        $this->size = $this->product->sizes()->create($this->size->toArray());
        $this->saveColors();
        $this->size = new Size();
        $this->alert('success', 'Medida agregada al producto con éxito');
        $this->emit('render');
    }

    public function update(){
        $this->validate();
        $this->size->update();
        $this->saveColors();
        $this->alert('success', 'Medida del producto actualizada con éxito');
        $this->emit('render');
    }

    public function saveColors(){
        $this->size->colors()->sync($this->colorArray);
    }

}
