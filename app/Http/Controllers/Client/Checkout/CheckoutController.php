<?php

namespace App\Http\Controllers\Client\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Cart::instance()->count() == 0) {
            return redirect()->route('client.product.index');
        }

        if (auth()->user() && request()->routeIs('client.checkout_guest.index')) {
            return redirect()->route('client.checkout.index');
        }

        return view('client.checkout.index');
    }

    public function confirmation(Order $order){
        if (! session()->has('confirmated')) {
            return redirect()->route('client.home.index');
        }
        return view('client.checkout.confirmated',[
            'order' => $order
        ]);
    }
}
