<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\type;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index(){

        $customers = DB::table('customers')
        ->leftjoin('type', 'customers.type_id', '=', 'type.id')
        ->select('customers.*', 'type.name as type_name')
        ->get();

        return $customers;
    }

    public function type(){
        $type = Brand::all();
        return $type;
    }

    public function save (Request $request){

        if($request->id == 0){
            
            $customers = new customers();
        }
        else{
            $customers = customers::find($request->id);
        }
        
            $customers->name = $request->name;
            $customers->last_name = $request->last_name;
            $customers->scnd_last_name = $request->scnd_last_name;
            $customers->address = $request->address;
            $customers->phone = $request->phone;
            $customers->type_id = $request->type_id;

            if($request ->file('img_customer') != null){
                $path = $request->file('img_customer')->store('public');
                $customers->image = $path;
            }
            
            $customers->save();

            return $customers;
    }

    public function delete(Request $request){
        
        $customers = customers::find($request->id);
        $customers->delete();

        return "OK";
    }
}
