<?php

namespace App\Http\Controllers;

use App\Models\Order_products;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;



class WishlistController extends Controller
{
    public function index(Request $request): View
    {
        $valuee = session()->get('email');
        $user = User::where('email', $valuee)->first();

        $num = array();
        $val = array();
        $product = array();
        $kol = array();

        $orders = Orders::where('user_id', $user->id)->where('actual', 1)->get();
        foreach ($orders as $key => $value)
        {
            array_push($num, $value->id);
            array_push($val, $value->oprice);
        }

        foreach ($num as $key => $value)
        {
            $a1 = Order_products::where('order_id', $value)->get();
            foreach ($a1 as $key1 => $value1)
            {
                $product[$key][$key1] = Product::where('id', $value1->product_id)->first();
                $kol[$key][$key1] = $value1->kol;
            }

        }


        return view('wishlist.index', compact('val', 'product', 'kol', 'num'));
    }

    public function index_del($order_id)
    {
        $valuee = session()->get('email');
        $user = User::where('email', $valuee)->first();

        Orders::where('user_id', $user->id)->where('id', $order_id)->update(['actual' => 0]);

        return redirect()->back();
    }
}
