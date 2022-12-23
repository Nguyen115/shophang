<?php

namespace App\Http\Controllers;



use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Redirect;
use Session;
session_start();
class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id', $productId)->first();
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = '123';
        $data['options'] = array('image'=>$product_info->product_image);
        Cart::add($data);
        return Redirect::to('/show_cart');

    }
    public function show_cart()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        return view('pages.show_cart')->with('category', $cate_product);
    }
}
