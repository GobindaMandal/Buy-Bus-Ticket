<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\Product;

class ProductController extends Controller
{
    public function add(){return view("backend.pages.product.manage");}
    public function store(Request $request){
        $valid = Validator::make($request->all(),[
            'bus_name'=>'required',
            'coach'=>'required',
            'from'=>'required',
            'to'=>'required',
            'price'=>'required',
            'time'=>'required',
            'type'=>'required',
            'counter_point'=>'required'
        ]);

        if($valid->fails()){
            return response()->json([
                "status"=>"faild",
                "errors"=>$valid->messages()
            ]);
        }
        else{
            $product =new Product;
            $product->bus_name = $request->bus_name;
            $product->coach = $request->coach;
            $product->from = $request->from;
            $product->to = $request->to;
            $product->price = $request->price;
            $product->time = $request->time;
            $product->type = $request->type;
            $product->counter_point = $request->counter_point;
            $product->save();
            return response()->json([
                "status"=>"success"
            ]);
        }
    }
    public function show(){
        $alldata=Product::all();
        return response()->json([
            'status'=>'success',
            'alldata'=>$alldata
        ]);
    }
    public function edit($id){
        $alldata=Product::find($id);
        return response()->json([
            'status'=>'success',
            "data"=>$alldata
        ]);
    }
    public function update(Request $request, $id){
        $product =Product::find($id);
        $product->bus_name = $request->bus_name;
        $product->coach = $request->coach;
        $product->from = $request->from;
        $product->to = $request->to;
        $product->price = $request->price;
        $product->time = $request->time;
        $product->type = $request->type;
        $product->counter_point = $request->counter_point;
        $product->update();
        return response()->json([
            "status"=>"success"
        ]);
    }
   
    public function destroy($id){
        $alldata=Product::find($id);
        $alldata->delete();
        return response()->json([
            'status'=>'success'
        ]);
    }
}
