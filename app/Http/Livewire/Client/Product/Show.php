<?php

namespace App\Http\Livewire\Client\Product;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public $product;
    public $colors;
    public $sizes;
    public $price;

    //Tools
    public $colorFilter;
    public $sizeFilter;
    public $priceToString;
    public $quantity = 1;

    public function mount(Product $product){
        $this->product = $product;
        $this->changeColor();
        $this->changeSize();
        $this->changePrice();
    }

    public function render()
    {
        $productRandoms = Product::with('categories')->inRandomOrder()->cursor();
        $productRelations = Product::whereRelation('categories', 'category_id', $this->product->categories()->first()->id)->take(4)->get();

        return view('livewire.client.product.show', compact('productRandoms', 'productRelations'));
    }

    public function changeColor($colorId = null){
        if(!$colorId){
            $this->colors = $this->product->colors()->get();
        }else{
            $this->colorFilter = Color::findOrFail($colorId);
            if($this->sizeFilter){
                if(!$this->colorFilter->validateSizeSelected($this->sizeFilter->id)){
                    $this->reset('sizeFilter');
                }
            }
        }    
    }

    public function changeSize($sizeId = null){
        if(!$sizeId){
            $this->sizes = $this->product->sizes()->get();
        }else{
            $this->sizeFilter = Size::findOrFail($sizeId);
            $this->changePrice();
        }   
    }

    public function changePrice(){
        if(!$this->sizeFilter){
            $this->priceToString = $this->product->priceToString();
            $this->price = $this->product->hasPromotionAndNotExpired() ? $this->product->price_promotion : $this->product->price;
        }else{
            $this->priceToString = '$'.number_format($this->sizeFilter->price, 2, '.', ',');
            $this->price = $this->sizeFilter->price;
        }
    }

    public function addCart(){


        $duplicates = Cart::search(function ($cartItem, $rowId) {
            return $cartItem->id === $this->product->id;
        });

        if ($duplicates->isNotEmpty()) {;

            if(($duplicates->first()->qty + 1) > $this->product->quantity){
                $this->emit('excededQuantity');
                return false;
            }
        }

        Cart::add(
            [
                'id' => $this->product->id, 
                'name' => $this->product->name, 
                'qty' => $this->quantity, 
                'price' => $this->price, 
                'options' => 
                    [
                        'size' => $this->sizeFilter ? $this->sizeFilter->name : '',
                        'color' => $this->colorFilter ? $this->colorFilter->name : '',
                    ]
            ]
        )->associate(Product::class);

        if(Auth::user()){
            Cart::store(Auth::user()->id);
        }
            
        $this->emit('renderCart');
        
    }
}
