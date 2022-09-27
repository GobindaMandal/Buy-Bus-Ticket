<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;

class Home extends Controller
{
    public function index(){
        $product = Product::all();
        return view("frontend.home", compact("product"));
    }
}
