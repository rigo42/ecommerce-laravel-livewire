<?php

namespace App\Http\Livewire\Admin\Color;

use App\Models\Color;
use Livewire\Component;

class Form extends Component
{
    public $method;
    public $color;

    //Tools
    public $imageTmp;

    public function mount(Color $color, $method){
        $this->color = $color;
        $this->method = $method;    
    }

    protected function rules()
    {
        return [
            'color.hexadecimal' => 'required',
            'color.name' => 'required',
        ];

    }

    public function render()
    {
        return view('livewire.admin.color.form');
    }

    public function store(){
        $this->validate();
        $this->color->save();
        $this->color = new Color();
        $this->reset('imageTmp');
        $this->alert('success', 'Color agregado con éxito');
        $this->emit('render');
    }

    public function update(){
        $this->validate();
        $this->color->update();
        $this->alert('success', 'Color actualizado con éxito');
        $this->emit('render');
    }
}
