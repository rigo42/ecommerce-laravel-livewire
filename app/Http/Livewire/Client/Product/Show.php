<?php

namespace App\Http\Livewire\Client\Product;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
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
}
