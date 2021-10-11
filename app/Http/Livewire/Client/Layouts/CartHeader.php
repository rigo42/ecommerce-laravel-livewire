<?php

namespace App\Http\Livewire\Client\Layouts;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartHeader extends Component
{
    protected $listeners = ['renderCart' => 'render'];

    public $test;

    public function mount(){
        if(Auth::user()){
            Cart::restore(Auth::user()->id);            
        }
    }

    public function render()
    {
        $count = Cart::count();
        $subtotal = Cart::subtotal();
        $total = Cart::total();
        $cart = Cart::content();

        return view('livewire.client.layouts.cart-header', compact('count', 'subtotal', 'total', 'cart'));
    }

    public function destroy($rowId){
        Cart::remove($rowId);
    }
}
