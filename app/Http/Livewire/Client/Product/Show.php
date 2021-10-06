<?php

namespace App\Http\Livewire\Client\Product;

use App\Models\Product;
use Livewire\Component;

class Show extends Component
{
    public $product;

    public function mount(Product $product){
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.client.product.show');
    }
}
