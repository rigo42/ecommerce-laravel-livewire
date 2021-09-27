<?php

namespace App\Http\Livewire\Admin\Product\Color;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{

    public $product;

    public function mount(Product $product){
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.admin.product.color.index');
    }
}
