<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;

class Form extends Component
{
    public $method;
    public $brand;

    public function mount(Brand $brand, $method){
        $this->brand = $brand;
        $this->method = $method;    
    }

    protected function rules()
    {
        return [
            'brand.name' => 'required',
        ];

    }

    public function render()
    {
        return view('livewire.admin.brand.form');
    }

    public function store(){
        $this->validate();
        $this->brand->save();
        $this->brand = new brand();
        $this->alert('success', 'Marca agregada con éxito');
        $this->emit('render');
    }

    public function update(){
        $this->validate();
        $this->brand->update();
        $this->alert('success', 'Marca actualizada con éxito');
        $this->emit('render');
    }

}
