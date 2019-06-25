<?php

namespace App\Http\Controllers;

use App\Item;
use App\Litragem;
use App\Marca;
use App\Produto;
use App\Quantidade;
use App\Sabor;
use App\Tipo;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Console\Tests\Command\createClosure;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produtos = Produto::with(['tipo','sabor','marca','litragem'])->paginate(10);

        return view('home',[
            'produtos'=>$produtos,
            'marcas'=>Marca::all(),
            'tipos'=>Tipo::all(),
            'sabores'=>Sabor::all(),
            'litragem'=>Litragem::all(),
        ]);
    }

    public function inserirProduto(Request $request,Response $response){


           $validador = \Illuminate\Support\Facades\Validator::make($request->all(),[
               'valor'=>'required',
               'sabor'=>'required',
               'litragem'=>'required',
               'marca'=>'required',
               'tipo'=>'required',
               'quantidade'=>'required|min:1'
            ]);

            if($validador->fails()){
                return $response->setStatusCode(422)->setContent([
                    'message'=>'Ocorreum um erro na validação',
                        'errors'=>$validador->errors()
                ]);
            }

            DB::transaction(function()use(&$request){

                $produto = new Produto();

                if($request->produto_id){
                    $produto = Produto::find($request->produto_id);
                }

                $produto->sabor_id = $request->sabor;
                $produto->marca_id = $request->marca;
                $produto->tipo_id = $request->tipo;
                $produto->litragem_id = $request->litragem;
                $request->valor = str_replace('.','',$request->valor);
                $request->valor = str_replace(',','.',$request->valor);

                $produto->valor = $request->valor;
                $produto->quantidade = $request->quantidade;
                $produto->save();

            });


            return $response->header('content-type','application/json')->setContent([
                'message'=>'Dados salvo com sucesso!'
            ])->setStatusCode(200);

    }
}
