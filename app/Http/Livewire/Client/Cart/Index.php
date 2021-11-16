<?php

namespace App\Http\Livewire\Client\Cart;

use App\Http\Controllers\Client\Cart\CartController;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.client.cart.index');
    }

    public function update($idRow, $qty, $quantity){
        $cart = new CartController(null, $idRow, $qty, $quantity);
        $cart->update();
        $this->emit('renderCart');
    }

    public function destroyProduct($rowId){
        $cart = new CartController(null, $rowId);
        $cart->destroy();
        $this->emit('renderCart');
    }
}
