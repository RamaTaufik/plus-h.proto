<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Product_Tag;

class SearchController extends Controller
{
    public function index(Request $search)
    {
        $req = $search['search'];
        $result = Product::join('image', 'image.product_id', '=', 'product.id')
                         ->join('supplier', 'supplier.id', '=', 'product.supplier_id')
                         ->join('product_tag', 'product_tag.product_id', '=', 'product.id')
                         ->join('tag', 'product_tag.tag_id', '=', 'tag.id')
                         ->select('product.id as id', 'product_name', 'supplier_id', 'supplier_name', 'logo', 'price', 'desc', DB::raw("group_concat(img_name_ext) as img_name_ext"), DB::raw("group_concat(tag_name) as tag_name"))
                         ->groupBy('product.id')
                         ->where([['product_name', "LIKE", "%".$req."%"],
                                  ['img_type', '=', 'main']])
                         ->orwhere([['desc', "LIKE", "%".$req."%"],
                                    ['img_type', '=', 'main']])
                         ->orwhere([['tag_name', "LIKE", "%".$req."%"],
                                    ['img_type', '=', 'main']])->paginate(12);
        return view('search', compact(['result', 'req']));
    }

    public function product($id)
    {
        $result = Product::join('supplier', 'supplier.id', '=', 'product.supplier_id')
                         ->select('product.id as id', 'product_name', 'supplier_name', 'price', 'stock', 'desc', 'logo')
                         ->where('product.id', '=', $id)->first();
        $image = Image::where('product_id', '=', $id)->get();
        $tag = Product_Tag::join('product', 'product_tag.product_id', '=', 'product.id')
                          ->join('tag', 'product_tag.tag_id', '=', 'tag.id')
                          ->select('product_tag.id as id', 'tag_name')
                          ->where('product_id', '=', $id)->get();
        return view('product', compact(['result', 'image', 'tag', 'id']));
    }

    // public function __invoke(Request $request)
    // {
    //     $prods = Product::search(trim($request->get('search')) ?? '')
    //                     ->query(function ($query) {
    //                     $query->join('product', 'tag', 'suplier', 'image')
    //                           ->select(['product_name',
    //                                     'price',
    //                                     'stock',
    //                                     'desc',
    //                                     'tag.tag_name',
    //                                     'supplier.supplier_name',
    //                                     'supplier.logo',
    //                                     'image.img_name_ext']);
    //                     })->get();
    //     return response()->json(data: $prods, status: 200);
    // }
}
