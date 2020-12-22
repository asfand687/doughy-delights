<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

use Session;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    function index() {
        $data =  Product::all();
        return view('products', ['products'=>$data]);
    }

    function specials() {
        $data = Product::where('category' , '=', 'special')->get();
        return view('specials', ['products'=>$data]);
    }

    function giftBaskets() {
        $data = Product::where('category' , '=', 'gift basket')->get();
        return view('giftBasket', ['products'=>$data]);
    }

    function detail($id) {
        $data =  Product::find($id);
        return view('productDetail', ['product'=>$data]);
    }

    function search(Request $req) {
        $searchText = $req->input('query');
        $data = Product::where('name' , 'like', '%'.$searchText.'%')->get();
        return view('search', ['products'=>$data]);
    }

    function addToCart(Request $req) {
        if($req->session()->has('user')){
            $userId = Session::get('user')['id'];
            if(Cart::where('user_id', $userId)->where('product_id', $req->product_id)->exists()) {
                $cart= Cart::where('user_id', $userId)->where('product_id', $req->product_id)->get()[0];
                $quantity = $cart->quantity + $req->quantity;
                $cart->quantity = $quantity;
                $cart->price = $req->product_price * $quantity;
                $cart->save();
                return redirect('/');
            } else {
                $cart = new Cart;
                $quantity = $req->quantity * $req->product_price;
                $cart->user_id = $userId;
                $cart->product_id = $req->product_id;
                $cart->quantity = $req->quantity;
                $cart->price = $quantity;
                $cart->save();
                return redirect('/');
            }
        } else {
            return redirect('/login');
        }
    }

    static function cartItem(){
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }

    function cartList() {
        $userId = Session::get('user')['id'];
        $products = DB::table('carts')
                    ->join('products', 'carts.product_id', '=', 'products.id')
                    ->where('carts.user_id', $userId)
                ->select('products.*', 'carts.id as cart_id', 'carts.quantity as product_quantity', 'carts.price as total_price')->get();
                return view('cartList', ['products'=>$products]);
    }

    function removeCart($id) {
        Cart::destroy($id);
        return redirect('cart_list');
    }

    function cartCheckout(){
        $userId = Session::get('user')['id'];
        // $total = DB::table('carts')
        //             ->join('products', 'carts.product_id', '=', 'products.id')
        //             ->where('carts.user_id', $userId)
        //             ->sum('products.price');
        $total = DB::table('carts')
                ->where('carts.user_id', $userId)->sum('price');
        return view('checkout', ['totalAmount'=>$total]);        
    }

    function orderPlace(Request $req) {
        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id', $userId)->get();
        foreach($allCart as $cart)
        {
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->payment_method = $req->payment_method;
            $order->delivery = $req->delivery;
            $order->address1 = $req->address1;
            $order->address2 = $req->address2;
            $order->product_quantity = $cart['quantity'];
            $order->save();
            Cart::where('user_id', $userId)->delete();
        }
        return redirect('/');
    }
}
