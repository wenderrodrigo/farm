<?php

namespace App\Http\Controllers;
use App\Models\ManufacturerProducts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ManufacturerProductsController extends Controller
{
    public function index(){
        $country = ManufacturerProducts::all();
        return response()->json($country);
    }
    
    public function show($name){

        $country = DB::table('manufacturer_products')->where('name','LIKE','%'.$name.'%')
        ->get();

        return response()->json($country);
    }
}
