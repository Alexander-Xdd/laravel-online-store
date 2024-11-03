<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Value;
use App\Models\Atribute;
use App\Models\Baskets;
use App\Models\User;

class ProductsController extends Controller
{
    public function index(Request $request): View
    {

        $product = Product::get();
        $category = array();

        foreach ($product as $key => $value)
        {

            $category[$key] = Category::where('id', $value->category_id)->first();

        }

        $categories = Category::get();
        return view('home.index', compact('product', 'category', 'value', 'key', 'categories'));

    }

    public function show($product_id)
    {


        $st = array();

        $product = Product::where('id', $product_id)->first();
        $category = Category::where('id', $product->category_id)->first();
        $value = Value::where('product_id', $product->id)->get();

        for ($i = 0, $j = 0; $i < count($value); $i++, $j++)
        {
            $atribute = Atribute::where('id', $value[$i]->atribute_id)->first('name');
            array_push($st, $atribute->name);
        }


        return view('home.show', compact('product', 'category', 'value', 'st'));

    }

    public function show_add($product_id)
    {
        $valuee = session()->get('email');
        $user = User::where('email', $valuee)->first();

        Baskets::query()->create([
            'product_id' => $product_id,
            'user_id' => $user->id,
        ]);
        return redirect()->back();
    }

    public function exit()
    {
        session()->flush();
        sleep(1);
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $product = Product::where('name', 'LIKE', "%{$search}%")->get();
        $category = array();

        foreach ($product as $key => $value)
        {

            $category[$key] = Category::where('id', $value->category_id)->first();

        }

        $categories = Category::get();

        return view('home.index', compact('product', 'category', 'categories'));
    }

    public function filter(Request $request)
    {
        $search = $request->filter;

        $product = Product::where('category_id', $search)->get();
        $category = array();

        foreach ($product as $key => $value)
        {

            $category[$key] = Category::where('id', $value->category_id)->first();

        }

        $categories = Category::get();

        return view('home.index', compact('product', 'category', 'categories'));
    }
}
