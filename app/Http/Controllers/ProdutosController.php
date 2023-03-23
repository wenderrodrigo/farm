<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\ManufacturerProducts;
use App\Models\CategoryProducts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutosController extends Controller
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

        $event = new Products;

        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;


        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestImage->move(public_path('assets/img/events'), $imageName);

            $event->image = $imageName;
        }

        $event->save();
        
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function excluir($id){
        echo "excluido" . $id;
    }
}
