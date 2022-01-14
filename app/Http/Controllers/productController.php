<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Offer;
use App\Models\rating;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{



    public function autocomplete(Request $request)
    {
        $data = product::select("name")
            ->where("name", "LIKE", "%{$request->str}%")
            // ->where("description", "LIKE", "%{$request->str}%") // turn on for efficient search
            ->get('query');
        return response()->json($data);
    }
    static function search_results()
    {
        return product::all();
    }
    function index()
    {
        return view("product", [
            "carousel_data" => offer::all(),
            "reviewed_data" => product::orderBy('avg_rating', 'desc')->get()->take(12),
            "electronic_data" => product::where("category", "=", "electronic")->get()->take(3),
            "fashion_data" => product::where("category", "=", "fashion")->get()->take(3),
            "makeup_data" => product::where("category", "=", "makeup")->get()->take(3),
            "travel_data" => product::where("category", "=", "travel")->get()->take(3),
            "baby_data" => product::where("category", "=", "baby")->get()->take(3),
            "sports_data" => product::where("category", "=", "sport")->get()->take(3),

        ]);
    }
    function drop_product(Request $request)
    {
        product::where('id', $request->id)->delete();
        return redirect("/admin");
    }
    function edit(Request $request)
    {
        return view("admin_edit", ["data" => product::find($request->id)]);
    }
    function update(Request $request)
    {
        $data = product::find($request->id);
        $data->img = $request->img;
        $data->name = $request->name;
        $data->price = $request->price;
        $data->category = $request->category;
        $data->sub_category_1 = $request->sub_category_1;
        $data->sub_category_2 = $request->sub_category_2;
        $data->description = $request->description;
        $data->save();
        return redirect("/admin");
    }
    function add(Request $request)
    {
        $data = new product;
        $data->img = $request->img;
        $data->name = $request->name;
        $data->price = $request->price;
        $data->category = $request->category;
        $data->sub_category_1 = $request->sub_category_1;
        $data->sub_category_2 = $request->sub_category_2;
        $data->description = $request->description;
        $data->save();
        return redirect("/admin");
    }
    function category($category)
    {
        return view("category", ["category_data" => product::where("category", "=", $category)->orWhere("sub_category_1", "=", $category)->orWhere("sub_category_2", "=", $category)->get(), "category_name" => str_replace('_', ' ', $category)]);
    }
    function detail($product_id)
    {
        $total_rated = rating::where(['product_id' => $product_id])->count();
        $star5 = rating::where(['product_id' => $product_id, "rating" => 5])->count();
        $star4 = rating::where(['product_id' => $product_id, "rating" => 4])->count();
        $star3 = rating::where(['product_id' => $product_id, "rating" => 3])->count();
        $star2 = rating::where(['product_id' => $product_id, "rating" => 2])->count();
        $star1 = rating::where(['product_id' => $product_id, "rating" => 1])->count();
        
        $data = product::find($product_id);
        
        $category_data = product::where("id", "!=", $product_id)
        ->where( function ( $query ) use ($data)
        {
            $query->where("sub_category_1", "=", $data->sub_category_1)
            ->orWhere("sub_category_2", "=", $data->sub_category_2);
        })
        ->orWhere( function ( $query ) use ($data)
        {
            $query->where("sub_category_1", "=", $data->sub_category_2)
            ->orWhere("sub_category_2", "=", $data->sub_category_1);
        })
        ->get()->take(6);
        
        return view("detail", ["data" => $data, "category_data" => $category_data, "star5" => $star5, "star4" => $star4, "star3" => $star3, "star2" => $star2, "star1" => $star1, "total_rated" => $total_rated]);
    }
    function rate(Request $request)
    {
        if (session()->has("user")) {
            $matchThese = ['user_id' => session()->get("user")["id"], 'product_id' => $request->product_id];
            if (!rating::where($matchThese)->get()->isEmpty()) {
                rating::where($matchThese)
                    ->update(['rating' => $request->rating]);

                $avg_rating = DB::table('ratings')
                    ->where("product_id", "=", $request->product_id)
                    ->avg('rating');
            } else {
                $rate = new rating;
                $rate->user_id = session()->get("user")["id"];
                $rate->product_id = $request->product_id;
                $rate->rating = $request->rating;
                $rate->save();
                $avg_rating = $request->rating;
            }
            Product::where(['id' => $request->product_id])
                ->update(['avg_rating' => (float)($avg_rating)]);
            return back();
        } else {
            return redirect("/login");
        }
    }
    function search(Request $request)
    {
        return view("search", ["search_data" => product::where("name", "like", "%" . $request->input("search") . "%")->get()]);
    }
    function add_to_cart($product_id)
    {
        if (session()->has("user")) {
            $cart = new cart;
            $cart->user_id = session()->get("user")["id"];
            $cart->product_id = $product_id;
            $cart->save();
            return back();
        } else {
            return redirect("/login");
        }
    }
    function remove_from_cart($product_id)
    {
        DB::table('cart')
            ->where("user_id", "=", session()->get("user")["id"])
            ->where("product_id", "=", $product_id)
            ->limit(1)
            ->delete();
        return back();
    }

    static function cart_items()
    {
        $user_id = session()->get("user")["id"];

        $items = DB::table("cart")
            ->join("products", "cart.product_id", "=", "products.id")
            ->select("products.*", "products.img", DB::raw('count(products.id) as total'))
            ->where("cart.user_id", $user_id)
            ->groupBy("products.id", "products.name", "products.category", "products.sub_category_1", "products.sub_category_2", "products.price", "products.description", "products.img", "products.avg_rating")
            ->get();

        $total = DB::table('cart')
            ->where("cart.user_id", $user_id)
            ->distinct()
            ->count('product_id');

        $total_price = cart::select(DB::raw('SUM(products.price) As total_price'))
            ->join("products", "cart.product_id", "=", "products.id")
            ->where("cart.user_id", $user_id)
            ->get();
        return [$total, $items, $total_price];
    }
    function order(Request $request)
    {
        if (session()->has("user")) {
            return view("order", ["total_price" => $request->cart_total_price, "products" => $request->products]);
        } else {
            return redirect("/login");
        }
    }
    function ordered(Request $request)
    {
        $ordered = new order;
        $ordered->user_id = session()->get("user")["id"];
        $ordered->payment_method = $request->payment_method;
        $ordered->payment_status = "pending";
        $ordered->address = $request->address;
        $ordered->delivery_status = "pending";
        $ordered->products = $request->products;
        $ordered->total_cost = $request->total_cost;
        $ordered->save();
        DB::table('cart')
            ->where("user_id", "=", session()->get("user")["id"])
            ->delete();
        return redirect("/");
    }
    function order_list()
    {
        if (session()->has("user")) {
            $order_list = DB::table('orders')
                ->where("user_id", "=", session()->get("user")["id"])
                ->get();
            foreach ($order_list as $ol) {
                $ol->products = json_decode($ol->products);
            }
            return view("order_list", ["order_list" => $order_list]);
        } else {
            return redirect("/login");
        }
    }
}
