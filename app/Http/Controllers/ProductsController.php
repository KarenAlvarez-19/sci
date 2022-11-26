<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index(){

        $products = DB::table('products')
        ->leftjoin('brands', 'products.id_brand', '=', 'brands.id')
        ->select('products.*', 'brands.name as brand_name')
        ->get();

        return $products;
    }

    public function brands(){
        $brands = Brand::all();
        return $brands;
    }

    public function save (Request $request){

        if($request->id == 0){
            
            $products = new Products();
        }
        else{
            $products = Products::find($request->id);
        }

            $products->code = $request->code;
            $products->name = $request->name;
            $products->price = $request->price;
            $products->stock = $request->stock;
            $products->id_brand = $request->id_brand;

            if($request ->file('img_product') != null){
                $path = $request->file('img_product')->store('public');
                $products->image = $path;
            }
            
            $products->save();

            return $products;
    }

    public function delete(Request $request){
        
        $products = Products::find($request->id);
        $products->delete();

        return "OK";
    }
}
