<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Redirect;
use Session;
session_start();
class ProductController extends Controller
{
    public function add_product()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id', 'desc')->get();

        return view('admin.add_product')->with('cate_product', $cate_product);

    }
    public function all_product()
    {
        $all_category_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')->orderBy('tbl_product.product_id')->get();
        $manager_category_product = view('admin.all_product')->with('all_product', $all_category_product);
        return view('layout_admin')->with('admin.all_product', $manager_category_product);
    }
    public function save_product(Request $request)
    {

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_decs;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');

        if ($get_image) {

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $data['product_image'] = $new_image;
            $get_image->move('public/upload/product', $new_image);
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Successfully added product');
            return Redirect::to('/all_product');

        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message', 'Successfully added product');
        return Redirect::to('/all_product');
    }
    public function unactive_product($product_id)
    {
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 1]);
        Session::put('message', 'Successfully unactive product');
        return Redirect::to('/all_product');
    }
    public function active_product($product_id)
    {
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 0]);
        Session::put('message', 'Successfully active product');
        return Redirect::to('/all_product');
    }
    public function edit_product($product_id)
    {
        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product);
        return view('layout_admin')->with('admin.edit_product', $manager_product);
    }
    public function delete_product($product_id)
    {
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Successfully update product');
        return Redirect::to('all_product');
    }
    public function update_product(Request $request, $product_id)
    {

        $data = array();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_decs;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if ($get_image) {

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $data['product_image'] = $new_image;
            $get_image->move('public/upload/product', $new_image);
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::put('message', 'Successfully added product');
            return Redirect::to('/all_product');

        }
        $data['product_image'] = '';
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        Session::put('message', 'Successfully delete product');
        return Redirect::to('/all_product');
    }


    public function detail_product($product_id)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $detail_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')->where('tbl_product.product_id', $product_id)->get();
        return view('pages.detail')->with('category', $cate_product)->with('product_detail', $detail_product);
    }

}
