<?php

namespace App\Http\Controllers;
use App\Models\CategoryProducts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CategoryProductsController extends Controller
{
    public function index(){
        $country = CategoryProducts::all();
        return response()->json($country);
    }
    
    public function show($name){

        $country = DB::table('product_category')->where('name','LIKE','%'.$name.'%')
        ->get();

        return response()->json($country);
    }
}
