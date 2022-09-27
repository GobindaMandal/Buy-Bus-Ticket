<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\Product;

class Show extends Controller
{
    public function fetchData1(Request $request){

        $fromLocation = $request->fromLocation;
        $records= Product::where('from',$fromLocation)->select('from')->first();

        return response()->json(['success' => $records]);
    }

    public function fetchData2(Request $request){

        $fromLocation = $request->fromLocation;
        $toLocation = $request->toLocation;
        $records= Product::where('from',$fromLocation)->where('to',$toLocation)->first();

        return response()->json(['success' =>$records]);
    }
}

