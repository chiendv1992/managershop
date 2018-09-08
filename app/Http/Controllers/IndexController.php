<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Productimage;
use DB;

use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function __construct()
    {
        $category = Category::All();
        View::share('category',$category);

    }
     public function indexproduct()
    {
        
        $productnew = DB::table('product')->take(6)->get();
        $product = DB::table('product')->take(2)->get();

//        dd($productnew)
    	$banner=DB::table('banner')->get();
        $indexproduct=Product::get();

        View::share('indexproduct',$indexproduct);
        return view ('theme.template.home',['banner'=>$banner,'productnew'=>$productnew,'product'=>$product]);
    }
    public function product()
    {
        $product = Product::paginate(9);
        return view('theme.template.allproduct',['product'=>$product]);
    }
    public function detailproduct($id)   {
        $imageproduct = Productimage::All();
        $detailproduct = Product::find($id);
//        dd($detailproduct);
        return view('theme.template.detailproduct',['detailproduct'=>$detailproduct,'imageproduct'=>$imageproduct]);
    }
    public function category($id)
    {
        $product = Product::all();
        $categoryproduct = Category::find($id);
//        dd($categoryproduct);
        return view('theme.template.category',['categoryproduct'=>$categoryproduct,'product'=>$product]);
    }
}
