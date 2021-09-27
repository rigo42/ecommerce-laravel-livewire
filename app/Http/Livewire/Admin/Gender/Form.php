<?php

namespace App\Http\Livewire\Admin\Gender;

use App\Models\Gender;
use Livewire\Component;

class Form extends Component
{
    public $method;
    public $gender;

    public function mount(Gender $gender, $method){
        $this->gender = $gender;
        $this->method = $method;    
    }

    protected function rules()
    {
        return [
            'gender.name' => 'required',
        ];

    }

    public function render()
    {
        return view('livewire.admin.gender.form');
    }

    public function store(){
        $this->validate();
        $this->gender->save();
        $this->gender = new Gender();
        $this->alert('success', 'Género agregado con éxito');
        $this->emit('render');
    }

    public function update(){
        $this->validate();
        $this->gender->update();
        $this->alert('success', 'Género actualizado con éxito');
        $this->emit('render');
    }
}
