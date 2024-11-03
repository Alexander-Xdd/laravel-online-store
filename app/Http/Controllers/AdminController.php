<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order_products;
use App\Models\Orders;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function table()
    {
        return view('admin.table');
    }

    public function table_users()
    {
        $users = User::get();

        return view('admin.table_users', compact('users'));
    }

    public function table_users_user($user_id)
    {

        $num = array();
        $val = array();
        $product = array();
        $kol = array();

        $orders = Orders::where('user_id', $user_id)->get();
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


        $user = User::where('id', $user_id)->first();

        $name = User::where('id', $user->id)->first()->name;
        $email = User::where('id', $user->id)->first()->email;
        $data = User::where('id', $user->id)->first()->created_at;

        $first_name = User::where('id', $user->id)->first()->first_name;
        $last_name = User::where('id', $user->id)->first()->last_name;
        $adress = User::where('id', $user->id)->first()->adress;
        $phone = User::where('id', $user->id)->first()->phone;

        return view('admin.table_users_user', compact('first_name', 'last_name', 'adress', 'phone', 'name', 'email', 'user_id', 'data', 'val', 'product', 'kol', 'num', 'orders'));
    }

    public function store_table_users_user(Request $request, $user_id)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'max:50', 'email'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'adress' => ['required', 'string', 'max:1000'],
            'phone' =>  ['required', 'string', 'max:50']
        ]);

        User::where('id', $user_id)->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'adress' => $validated['adress'],
            'phone' => $validated['phone'],
        ]);

        return redirect()->back();
    }

    public function table_categories(Request $request)
    {
        $categories = Category::get();

        return view('admin.table_categories', compact('categories'));
    }

    public function table_categories_category($category_id)
    {
        $category = Category::where('id', $category_id)->first()->name;

        return view('admin.table_categories_category', compact('category', 'category_id'));
    }

    public function store_table_categories_category(Request $request, $category_id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],

        ]);

        Category::where('id', $category_id)->update([
            'name' => $validated['name'],

        ]);

        return redirect()->back();
    }

    public function table_graph()
    {
        return view('admin.table_graph');
    }

    public function table_graph_cat()
    {
        $prod = array();
        $names = array();

        $cat = Category::get();

        foreach ($cat as $key => $value)
        {
            $pr = count(Product::where('category_id', $value->id)->get());
            array_push($prod, $pr);
            array_push($names, $value->name);
        }

        $m = max($prod);

        $col = 2 * count(Category::get());
        $str = 49;
        $str_for = 49;

        return view('admin.table_graph_cat', compact('col', 'str', 'str_for', 'm', 'prod', 'names'));
    }

    public function table_graph_usr()
    {
        $prod = array();
        $names = array();

        $usr = User::get();

        foreach ($usr as $key => $value)
        {
            $pr = count(Orders::where('user_id', $value->id)->get());
            array_push($prod, $pr);
            array_push($names, $value->email);
        }

        $m = max($prod);

        $col = 2 * count(User::get());
        $str = 49;
        $str_for = 49;

        return view('admin.table_graph_usr', compact('col', 'str', 'str_for', 'm', 'prod', 'names'));
    }

    public function table_graph_usr_act()
    {
        $prod = array();
        $names = array();

        $usr = User::get();

        foreach ($usr as $key => $value)
        {
            $pr = count(Orders::where('user_id', $value->id)->where('actual', 1)->get());
            array_push($prod, $pr);
            array_push($names, $value->email);
        }

        $m = max($prod);

        $col = 2 * count(User::get());
        $str = 49;
        $str_for = 49;

        return view('admin.table_graph_usr_act', compact('col', 'str', 'str_for', 'm', 'prod', 'names'));
    }

    public function table_graph_usr_val()
    {
        $prod = array();
        $names = array();

        $usr = User::get();

        foreach ($usr as $key => $value)
        {
            $ppr = 0;
            $pr = (Orders::where('user_id', $value->id)->get());
            foreach ($pr as $key1 => $value1)
            {
                $ppr += $value1->oprice;
            }
            array_push($prod, $ppr);
            array_push($names, $value->email);
        }

        $m = max($prod);

        $col = 2 * count(User::get());
        $str = 49;
        $str_for = 49;

        return view('admin.table_graph_usr_val', compact('col', 'str', 'str_for', 'm', 'prod', 'names'));
    }

    public function table_users_search(Request $request)
    {
        $search = $request->search_admin;
        $users = User::where('email', 'LIKE', "%{$search}%")->get();

        return view('admin.table_users', compact('users'));
    }

    public function table_products()
    {
        $products = Product::get();
        $categories = Category::get();

        return view('admin.table_products', compact('products', 'categories'));
    }

    public function table_products_prod($prod_id)
    {

        $prod = Product::where('id', $prod_id)->first();

        $name = Product::where('id', $prod->id)->first()->name;
        $imglink = Product::where('id', $prod->id)->first()->imglink;
        $data = Product::where('id', $prod->id)->first()->created_at;

        $desc = Product::where('id', $prod->id)->first()->description;
        $price = Product::where('id', $prod->id)->first()->price;
        $category_id = Product::where('id', $prod->id)->first()->category_id;
        $category = Category::where('id', $category_id)->first()->name;


        return view('admin.table_products_prod', compact('name', 'imglink', 'data', 'desc', 'price', 'category_id', 'prod_id', 'category'));
    }

    public function store_table_products_prod(Request $request, $prod_id)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'imglink' => ['nullable', 'max:1000'],
            'description' => ['nullable', 'max:100'],
            'price' => ['nullable', 'max:100'],
            'category_id' => ['required', 'integer', 'max:1000'],
        ]);

        Product::where('id', $prod_id)->update([
            'name' => $validated['name'],
            'imglink' => $validated['imglink'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
        ]);

        return redirect()->back();
    }

    public function table_products_search(Request $request)
    {
        $search = $request->search_admin;
        $products = Product::where('name', 'LIKE', "%{$search}%")->get();
        $categories = Category::get();


        return view('admin.table_products', compact('products', 'categories'));
    }

    public function store_table_products(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'imglink' => ['nullable', 'max:1000'],
            'description' => ['nullable', 'max:100'],
            'price' => ['nullable', 'max:100'],
            'category_id' => ['required', 'integer', 'max:1000'],
        ]);

        Product::create([
            'name' => $validated['name'],
            'imglink' => $validated['imglink'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
        ]);

        return redirect()->back();
    }

    public function table_users_user_o($user_id)
    {

        $num = array();
        $val = array();
        $product = array();
        $kol = array();

        $orders = Orders::where('user_id', $user_id)->get();
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


        $user = User::where('id', $user_id)->first();

        $name = User::where('id', $user->id)->first()->name;
        $email = User::where('id', $user->id)->first()->email;
        $data = User::where('id', $user->id)->first()->created_at;

        $first_name = User::where('id', $user->id)->first()->first_name;
        $last_name = User::where('id', $user->id)->first()->last_name;
        $adress = User::where('id', $user->id)->first()->adress;
        $phone = User::where('id', $user->id)->first()->phone;

        return view('admin.table_users_user_o', compact('first_name', 'last_name', 'adress', 'phone', 'name', 'email', 'user_id', 'data', 'val', 'product', 'kol', 'num', 'orders'));
    }

    public function table_users_o()
    {
        $users = User::get();

        return view('admin.table_users_o', compact('users'));
    }
}
