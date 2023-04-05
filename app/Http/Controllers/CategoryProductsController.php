<?php

namespace App\Http\Controllers;
use App\Models\ProductCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    public function index(){
        $country = ProductCategory::all();
        return response()->json($country);
    }
    
    public function show($name){

        $country = DB::table('product_categories')->where('name','LIKE','%'.$name.'%')
        ->get();

        return response()->json($country);
    }
}
