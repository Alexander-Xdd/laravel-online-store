<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Baskets;
use App\Models\User;
use App\Models\Orders;
use App\Models\Order_products;

class OrderlistController extends Controller
{
    public function index(Request $request): View
    {
        $category = array();
        $product = array();
        $col = array();
        $valuee = session()->get('email');
        $user = User::where('email', $valuee)->first();
        $arr = array();
        $parr = 0;

        $baskets = Baskets::where('user_id', $user->id)->get();


        foreach ($baskets as $basket)
        {
            $t = Product::where('id', $basket->product_id)->first();

            $parr += $t->price;
            array_push($arr, $basket->product_id);
        }

        $asd = (array_count_values($arr));
        $i = 0;
        foreach($asd as $key => $value)
        {
            $product[$i] = Product::where('id', $key)->first();
            $category[$i] = Category::where('id', $product[$i]->category_id)->first();
            $col[$i] = $value;
            $i = $i + 1;

        }


        return view('orderlist.index', compact('col', 'product', 'category', 'i', 'parr'));
    }

    public function index_del($product_id)
    {
        $valuee = session()->get('email');
        $user = User::where('email', $valuee)->first();

        Baskets::where('user_id', $user->id)->where('product_id', $product_id)->delete();

        return redirect()->back();
    }

    public function index_order()
    {

        $valuee = session()->get('email');
        $user = User::where('email', $valuee)->first();

        if (empty($user->phone))
        {
            sleep(1);
            return redirect()->route('profile');
        }

        $category = array();
        $col = array();

        $arr = array();

        $baskets = Baskets::where('user_id', $user->id)->get();

        foreach ($baskets as $basket)
        {
            array_push($arr, $basket->product_id);
        }
        $asd = (array_count_values($arr));
        $i = 0;

        foreach($asd as $key => $value)
        {
            $product = Product::where('id', $key)->first();
            $i += $product->price * $value;
        }

        Orders::query()->create([
            'user_id' => $user->id,
            'oprice' => $i,
        ]);

        $t = Orders::latest()->limit(1)->get();
        foreach($asd as $key => $value)
        {
            $product = Product::where('id', $key)->first();

            Order_products::query()->create([
                'order_id' => $t[0]->id,
                'product_id' => $product->id,
                'kol' => $value,
            ]);
        }

        return view('orderlist.order_com', compact('i'));
    }
}
