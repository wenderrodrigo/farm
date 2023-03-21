<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Country;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    public function index(){
        $country = Country::all();
        return response()->json($country);
    }
    
    public function show($name){

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
        // $dados = [
        //     'produto'=> $request->input('produto'),
        //     'preco'=> $request->input('preco'),
        //     'categoria'=> $request->input('categoria')
        // ];

        $country = DB::table('countries')->where('name','LIKE','%'.$name.'%')
        ->get();
        

        return response()->json($country);// view('Country', ['country' => $country]);
    }

    // public function index(){
    //     $events = Event::all();        

    //     return view('home', ['events' => $events]);
    // }
    
    // public function create(){
    //     return view('events.create');
    // }
    

    // public function excluir($id){
    //     echo "excluido" . $id;
    // }

    // public function store(Request $request){

       
    //     return redirect('/')->with('msg', 'Evento criado com sucesso!');
    // }

    // public function show($id){
    //     $event = Event::findOrFail($id);

    //     return view('events.show', ['event' => $event]);

    // }
}
