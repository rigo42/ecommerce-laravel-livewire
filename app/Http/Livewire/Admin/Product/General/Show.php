<?php

namespace App\Http\Livewire\Admin\Product\General;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = ['render'];
    
    public $userPresent;
    public $product;

    public function mount(Product $product){
        $this->product = $product;
        $this->userPresent = User::find(Auth::id());
    }

    public function render()
    {
        return view('livewire.admin.product.general.show');
    }
}
