<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Productimage;
use DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Order;
use App\Orderdetail;
use App\Customer;
use File;
use App\Http\Requests\Card\CheckoutRequest;
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


    public function purchase($id)
    {
        $product_buy = Product::where('id',$id)->first();
        Cart::add([
            'id' => $id,
            'name' => $product_buy->name,
            'price' => $product_buy->price - ($product_buy->price*$product_buy->sale)/100,
            'qty' => 1,
            'options'=> array(
                'img' => $product_buy->image,
                'sale' => $product_buy->sale,
                'priceold' => $product_buy->price
            )
        ]);
        $content = Cart::content();
        $rowId = $content->where('id', $id)->first()->rowId;
        Cart::setTax($rowId, 0);
       // dd($content);
        return redirect()->route('card',['content'=>$content]);
//

    }
    public function card()
    {
        $content = Cart::content();
        $subtotal = Cart::subtotal();
        $total = Cart::total();

        return view('theme.template.card',['content'=>$content,'subtotal'=>$subtotal,'total'=>$total]);

    }
    public function postcard(CheckoutRequest $request)
    {
        $content = Cart::content();
        $total = Cart::total();
//        dd($content);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->gender = $request->gender;
        $customer->save();

        $orders = new Order();
        $orders ->customer_id = $customer->id;
        $orders ->orderdate = date('Y-m-d');
        $orders ->total = 11;
        $orders ->status = 1;
        $orders ->type = $request->payment;
        $orders ->save();

        foreach ($content as $key => $value)
        {
            $orders_detail = new Orderdetail();
            $orders_detail -> order_id = $orders ->id;
            $orders_detail -> product_id = $value ->id;
            $orders_detail -> quantity = $value ->qty;
            $orders_detail -> total = $value ->price;

            $orders_detail -> save();
        }
        Cart::destroy();
    return redirect()->back()->with('success','Order Success');

    }
    public function deletecard($id)
    {
        Cart::remove($id);
        return redirect()->route('card');
    }
}
