<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\ManufacturerProducts;
use App\Models\ProductCategory;
use App\Models\BatchProducts;
use App\Models\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index(Request $request){

        // //Opcao 1
        // $dados = $request-> all();
        // $produto = $dados['produto'];
        // $preco = $dados['preco'];
        // $categoria = $dados['categoria'];

        // //Opcao 2
        // $produto = $request->query('produto');
        // $preco = $request->query('preco');
        // $categoria = $request->query('categoria');

        // // //Opcao 3
        // $produto = $request->input('produto');
        // $preco = $request->input('preco');
        // $categoria = $request->input('categoria');

        // //Opcao 4
        $dados = [
            'produto'=> $request->input('produto'),
            'preco'=> $request->input('preco'),
            'categoria'=> $request->input('categoria')
        ];

        //$request = ;;
        return view('produtos', $dados);
    }

    public function create(){
        return view('products.create');
    }
    
    public function store(Request $request){

        $product = new Products;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->bar_code = $request->codigo_barras;
        $product->active_principle = $request->principio_ativo;
        $product->dosage = $request->dosagem;
        $product->pharmaceutical_form = $request->forma_farmaceutica;
        $product->doctors_prescription = $request->prescricao_medica == "sim" ? 1 : 0;
        $product->use_restrictions = $request->restricoes;
        $product->records = $request->registros;
        $product->weight_or_volume = $request->peso;
        $product->nutritional_information = $request->nutricionais;
        $product->certifications = $request->certificacoes;
        $product->storage_information = $request->armazenamento;
        $product->packing_form = $request->acondicionamento;
        
        //$checking_country = DB::table('countries')->where('name',$request->pais)->take(1)->get();
        //if($checking_country->count() == 0){
            //return redirect('/produtos')->with('msg', 'Não foi possível criar o produto!');
        $product->countries_id = $request->number_pais;
        
        $product->online_sales_information = $request->vendaOnline;
        $product->tax_identification = $request->idFiscal;
        $product->profit_margin = $request->margemLucro;
        $product->minimum_stock = $request->estoqueMinimo;
        $product->maximum_stock = $request->estoqueMaximo;
        $product->promotions = $request->promocoes;

        
        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestImage->move(public_path('assets/img/products'), $imageName);
            $product->product_image = $imageName;
        }else{
            $product->product_image = "";
        }

        // $batch = new BatchProducts;
        
        // $batch->product_id = $request->lotes;
        // $batch->provider_id = $request->dosagem;
        // $batch->date_manufacturing = $request->dosagem;
        // $batch->date_expiration = $request->dosagem;

        $checking_manufacturer = DB::table('manufacturer_products')->where('name',$request->fabricante)->take(1)->get();

        if($checking_manufacturer->count() == 0){
            $manufacturer = new ManufacturerProducts;
            $manufacturer->name = $request->fabricante;
            $manufacturer->save();
            $return_manufacturer = DB::table('manufacturer_products')->where('name',$request->fabricante)->take(1)->get();
            $product->manufacturers_id = $return_manufacturer->pluck('id')->first();
        }else{
            $product->manufacturers_id = $checking_manufacturer->pluck('id')->first();
        }

        $checking_category = DB::table('product_categories')->where('name', $request->categoria)->take(1)->get();

        if($checking_category->count() == 0){
            $category = new ProductCategory;
            $category->name = $request->categoria;
            $category->save();
                        
            $return_category = DB::table('product_categories')->where('name',$request->categoria)->take(1)->get();
            $product->product_category_id = $return_category->pluck('id')->first();
        }else{
            $product->product_category_id = $checking_category->pluck('id')->first();
        }
        
        $product->description = $request->description;

        $product->save();
        
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function excluir($id){
        echo "excluido" . $id;
    }
}
