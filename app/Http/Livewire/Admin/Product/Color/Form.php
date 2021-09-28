<?php

namespace App\Http\Livewire\Admin\Product\Color;

use Livewire\Component;

class Form extends Component
{
    public $method;
    public $product;

    //Properties
    public $colorId;

    public function mount(Product $product, $method){
        $this->product = $product;
        $this->method = $method;    
    }

    protected function rules()
    {
        return [
            'colorId' => 'required|exists:colors,id',
        ];

    }

    public function render()
    {
        return view('livewire.admin.color.form');
    }

    public function store(){
        $this->validate();
        $this->product->colors()->attach($this->colorId);
        $this->reset('colorId');
        $this->alert('success', 'Color agregado al producto con éxito');
        $this->emit('render');
    }

    public function update(ColorProduct $colorProduct){
        $this->validate();
        $colorProduct->update([
            'color_id' => $this->colorId
        ]);
        $this->alert('success', 'Color del producto actualizado con éxito');
        $this->emit('render');
    }
    
}
