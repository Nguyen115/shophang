<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Redirect;
use Session;
session_start();
class CategoryProduct extends Controller
{
    public function add_category_product()
    {
        return view('admin.add_category_product');
    }
    public function all_category_product()
    {
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('layout_admin')->with('admin.all_category_product', $manager_category_product);
    }
    public function save_category_product(Request $request)
    {
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_decs;
        $data['category_status'] = $request->category_product_status;
        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Successfully added category');
        return Redirect::to('/all_category_product');
    }
    public function unactive_category_product($category_product_id)
    {
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status' => 0]);
        Session::put('message', 'Successfully active category');
        return Redirect::to('/all_category_product');
    }
    public function active_category_product($category_product_id)
    {
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status' => 1]);
        Session::put('message', 'Successfully unactive category');
        return Redirect::to('/all_category_product');
    }
    public function edit_category_product($category_product_id)
    {
        $edit_category_product = DB::table('tbl_category_product')->where('category_id', $category_product_id)->get();

        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('layout_admin')->with('admin.edit_category_product', $manager_category_product);
    }
    public function delete_category_product($category_product_id)
    {

        $DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')->get();
        if ($result){Session::put('message', 'Successfully update product');
            return Redirect::to('all_category_product');} else { DB::table('tbl_category_product')->where('category_product_id', $category_product_id)->delete();return Redirect::to('all_category_product');}

    }
    public function update_category_product(Request $request, $category_product_id)
    {
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_decs;
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update($data);
        Session::put('message', 'Successfully update category');
        return Redirect::to('/all_category_product');
    }


}
