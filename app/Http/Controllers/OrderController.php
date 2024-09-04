<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Image;
use App\Models\Product_Tag;
use App\Models\City;
use App\Models\Shipping_Type;
use App\Models\Payment_Method;
use App\Models\Orders;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function buy($id)
    {
        $result = Product::join('supplier', 'supplier.id', '=', 'product.supplier_id')
                         ->select('product.id as id', 'product_name', 'supplier_name', 'price', 'stock', 'desc')
                         ->where('product.id', '=', $id)->first();
        $image = Image::where([['product_id', '=', $id],
                               ['img_type', '=', 'main']])->first();
        $tag = Product_Tag::join('product', 'product_tag.product_id', '=', 'product.id')
                          ->join('tag', 'product_tag.tag_id', '=', 'tag.id')
                          ->select('product_tag.id as id', 'tag_name')
                          ->where('product_id', '=', $id)->get();

        $city = City::all();
        $shipping = Shipping_Type::join('shipping', 'shipping.id', '=', 'shipping_type.shipping_id')
                                 ->join('type', 'type.id', '=', 'shipping_type.type_id')
                                 ->select('shipping_type.id as id', 'shipping_name', 'type_name')->get();
        $payment = Payment_Method::all();
        return view('buy', compact(['result','image','tag','id','city','shipping','payment']));
    }

    public function store(Request $request, $id)
    {
        $data = new Orders($request->all());
        $data->user_id = Auth::id();
        $data->product_id = $id;
        $data->time_ordered = date('Y-m-d H:i:s');
        $data->save();
        $qty = Product::where('id', '=', $id)->first();
        $qty->stock = $qty->stock - $data['qty'];
        $qty->save();
        return redirect('search')->with('success', 'Terima kasih telah membeli produk kami');
    }
}
