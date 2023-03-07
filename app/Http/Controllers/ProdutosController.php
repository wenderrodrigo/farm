<?php

namespace App\Http\Controllers;

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

    public function excluir($id){
        echo "excluido" . $id;
    }
}
