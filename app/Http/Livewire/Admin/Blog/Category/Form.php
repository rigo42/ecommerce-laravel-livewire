<?php

namespace App\Http\Livewire\Admin\Blog\Category;

use App\Models\BlogCategory;
use Livewire\Component;

class Form extends Component
{
    public $method;
    public $category;

    public function mount(BlogCategory $category, $method){
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
        return view('livewire.admin.blog.category.form');
    }

    public function store(){
        $this->validate();
        $this->category->save();
        $this->category = new BlogCategory();
        $this->alert('success', 'Categoría agregada con éxito');
        $this->emit('render');
    }

    public function update(){
        $this->validate();
        $this->category->update();
        $this->alert('success', 'Categoría actualizada con éxito');
        $this->emit('render');
    }

}
