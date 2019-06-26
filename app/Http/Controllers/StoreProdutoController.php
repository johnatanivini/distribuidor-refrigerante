<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class StoreProdutoController extends Controller
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

     public function salvar(Request $request,Response $response){
            try {

                $validador = \Illuminate\Support\Facades\Validator::make($request->all(), [
                    'valor' => 'required|between:0,999999.99',
                    'sabor' => 'required|int',
                    'litragem' => 'required|int',
                    'marca' => 'required|int',
                    'tipo' => 'required|int',
                    'quantidade' => 'required|min:1'
                ]);

                if ($validador->fails()) {
                    throw new \Exception('Falha ao validar objetos'.$validador->errors());
                }

                $produto = new Produto();

                if (!empty($request->produto)) {
                    $produto = Produto::find($request->produto);
                }

                DB::transaction(function () use (&$request,&$produto) {

                    $produto->sabor_id = $request->sabor;
                    $produto->marca_id = $request->marca;
                    $produto->tipo_id = $request->tipo;
                    $produto->litragem_id = $request->litragem;
                    $request->valor = str_replace('.', '', $request->valor);
                    $request->valor = str_replace(',', '.', $request->valor);
                    $produto->valor = $request->valor;
                    $produto->quantidade = $request->quantidade;
                    $produto->save();

                });


                return $response->header('content-type', 'application/json')->setContent([
                    'message' => 'Dados salvo com sucesso!'
                ])->setStatusCode(200);


            }catch (QueryException | \Exception $e){
                return $response->header('content-type', 'application/json')->setContent([
                    'message' => $e->getCode() == 23000 ? 'Este produto já está cadastrado!' : 'Ocorreu um erro ao tentar inserir'
                ])->setStatusCode(422);
            }
         }
}
