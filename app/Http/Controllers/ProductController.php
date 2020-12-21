<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;

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

    function addToCart(Request $req) {
        if($req->session()->has('user')){
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/');
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
                ->select('products.*', 'carts.id as cart_id')->get();
                return view('cartList', ['products'=>$products]);
    }

    function removeCart($id) {
        Cart::destroy($id);
        return redirect('cart_list');
    }

    function cartCheckout(){
        $userId = Session::get('user')['id'];
        $total = DB::table('carts')
                    ->join('products', 'carts.product_id', '=', 'products.id')
                    ->where('carts.user_id', $userId)
                    ->sum('products.quantity');
        return $total;
        // return view('checkout', ['totalAmount'=>$total]);        
    }
}
