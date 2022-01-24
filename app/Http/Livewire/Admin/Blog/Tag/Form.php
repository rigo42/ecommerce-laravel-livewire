<?php

namespace App\Http\Livewire\Admin\Blog\Tag;

use App\Models\BlogTag;
use Livewire\Component;

class Form extends Component
{
    public $method;
    public $tag;

    public function mount(BlogTag $tag, $method){
        $this->tag = $tag;
        $this->method = $method;    
    }

    protected function rules()
    {
        return [
            'tag.name' => 'required',
        ];

    }

    public function render()
    {
        return view('livewire.admin.blog.tag.form');
    }

    public function store(){
        $this->validate();
        $this->tag->save();
        $this->tag = new BlogTag();
        $this->alert('success', 'Etiqueta agregada con éxito');
        $this->emit('render');
    }

    public function update(){
        $this->validate();
        $this->tag->update();
        $this->alert('success', 'Etiqueta actualizada con éxito');
        $this->emit('render');
    }
}
