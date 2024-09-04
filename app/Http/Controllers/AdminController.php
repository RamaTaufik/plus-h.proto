<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:access admin', ['only' => ['index']]);
    }

    public function index()
    {
        return view('dashboard');
    }
    
    public function data($class)
    {
        $fk = array(
            "City"=>array(),
            "Country"=>array(),
            "Image"=>array("Product"),
            "Orders"=>array("User", "Product", "City", "Shipping_Type", "Payment_Method"),
            "Payment_Method"=>array(),
            "Product"=>array("Supplier"),
            "Product_Tag"=>array("Product", "Tag"),
            "Review"=>array("Orders"),
            "Shipping"=>array(),
            "Shipping_Type"=>array("Shipping", "Type"),
            "Supplier"=>array(),
            "Supplier_Country"=>array("Supplier", "Country"),
            "Tag"=>array(),
            "Type"=>array(),
        );
        $dir = "\\App\\Models\\".$class;
        $datas = $dir::all();
        for($i=0;$i<count($fk[$class]);$i++) {
            $dir2 = "\\App\\Models\\".$fk[$class][$i];
            $fks[$fk[$class][$i]] = $dir2::all();
            $q = "DESCRIBE ".$fk[$class][$i];
            $colname[$fk[$class][$i]] = DB::select($q);
        }
        if(!isset($fks)) {
            $fks = "";
            $colname = "";
        }
        $query = "DESCRIBE ".$class;
        $desc = DB::select($query);
        return view('data', compact('datas', 'class', 'desc', 'fks', 'colname'));
    }

    public function store(Request $request, $class) {
        $dir = "\\App\\Models\\".$class;
        $img = "";
        if($class=="Supplier") {
            $img = "logo";
        }
        else if($class=="Image") {
            $img = "img_name_ext";
        }
        $store = $dir::create($request->all());
        if($request->hasFile($img)){
            $image = $request->file($img);
            if($class=="Supplier") {
                $fileName = $store->id.'.'.$image->getClientOriginalExtension();
                $image->move(public_path('assets/img_supplier'), $fileName);
            }
            else if($class=="Image") {
                $fileName = $store->img_type.'.'.$image->getClientOriginalExtension();
                if($store->img_type=="dis") {
                    $num = $dir::where('product_id', "=", $store->product_id)
                               ->where('img_type', "=", "dis")->count();
                    $fileName = $store->img_type.$num.'.'.$image->getClientOriginalExtension();
                }
                $d = 'assets/img_product/'.$store->product_id;
                $image->move(public_path($d), $fileName);
            }
            $store->$img = $fileName;
        }
        
        $store->save();

        $red = '/dashboard/data/'.$class;
        return redirect($red)->with('success', 'Data berhasil ditambah');
    }
    
    function destroy($class, $data)
    {
        $dir = "\\App\\Models\\".$class;
        if($class=="Supplier") {
            $d = 'assets/img_supplier/'.$dir::find($data)->logo;
            $path = public_path($d);
            File::delete(public_path($path));
        }
        $dir::destroy([$data]);
        $red = '/dashboard/data/'.$class;
        return redirect($red)->with('success', 'Data berhasil dihapus');
    }

    function orders_update(Request $req, Orders $data) 
    {
        if($data->status=='preparing') {
            $data->status = 'shipping';
        }
        else if($data->status=='shipping') {
            $data->status = 'arrived';
        }
        $data->save();
        $red = '/dashboard/data/'.$class;
        return redirect($red)->with('success', 'Status berhasil diubah');
    }
}
