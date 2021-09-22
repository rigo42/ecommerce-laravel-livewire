<?php

namespace App\Http\Livewire\Admin\Size;

use App\Models\Size;
use Livewire\Component;

class Form extends Component
{
    public $method;
    public $size;

    //Tools
    public $imageTmp;

    public function mount(Size $size, $method){
        $this->size = $size;
        $this->method = $method;    
    }

    protected function rules()
    {
        return [
            'size.name' => 'required',
        ];

    }

    public function render()
    {
        return view('livewire.admin.size.form');
    }

    public function store(){
        $this->validate();
        $this->size->save();
        $this->size = new Size();
        $this->reset('imageTmp');
        $this->alert('success', 'Medida agregada con éxito');
        $this->emit('render');
    }

    public function update(){
        $this->validate();
        $this->size->update();
        $this->alert('success', 'Medida actualizada con éxito');
        $this->emit('render');
    }
}
