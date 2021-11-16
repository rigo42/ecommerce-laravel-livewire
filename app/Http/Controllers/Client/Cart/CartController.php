<?php

namespace App\Http\Controllers\Client\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    private $product;
    private $rowId;
    private $qty;
    private $quantity;
    private $price;
    private $size;
    private $color;

    public function __construct(Product $product = null, $rowId = null, $qty = null, $quantity = null, $price = null, $size = null, $color = null){
        $this->product = $product;
        $this->rowId = $rowId;
        $this->qty = $qty;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->size = $size;
        $this->color = $color;
        
    }

    public function index()
    {
        if(request()->product){
            $product = Product::find(request()->product);
            $cart = new CartController($product, null, 1, null, $product->price);
            $cart->store();
        }

        return view('client.cart.index');
    }

    public function store(){
        $duplicates = Cart::search(function ($cartItem, $rowId) {
            return $cartItem->id === $this->product->id;
        });

        if ($duplicates->isNotEmpty()) {;

            if(($duplicates->first()->qty + 1) > $this->product->quantity){
                return false;
            }
        }

        Cart::add([
            'id' => $this->product->id, 
            'name' => $this->product->name, 
            'qty' => $this->qty, 
            'price' => $this->price, 
            'options' => 
                [
                    'size' => $this->size,
                    'color' => $this->color,
                ]
        ])->associate(Product::class);

        return true;
    }

    public function update(){

        if($this->qty > $this->quantity){
            session()->flash('alert','¡El artículo sobrepasa el stock! maximo '.$this->quantity);
            session()->flash('alert-type','warning');

        }
        else if($this->qty <= 0){
            session()->flash('alert','¡La cantidad de productos debe ser mayor a 0!');
            session()->flash('alert-type','warning');

        }else{
            Cart::update($this->rowId, $this->qty);
            session()->flash('alert','¡El artículo se actualizó correctamente!');
            session()->flash('alert-type','success');

        }
    }

    public function destroy(){
        Cart::remove($this->rowId);
        session()->flash('alert','¡El artículo se eliminó correctamente!');
        session()->flash('alert-type','success');
    }

}
