<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EditarProdutoController extends Controller
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

    public function editar($id,Request $request,Response $response){

        try{

            $produto =  Produto::with(['tipo','sabor','marca','litragem'])->find($id)->toArray();

            if(!$produto){
                throw  new \Exception('Produto não existe');
            }

            return $response->header('content-type','application/json')->setContent([
                'message'=>'Obter produto',
                'dados'=>$produto
            ])->setStatusCode(200);

        }catch (QueryException | \Exception $e){
            $response->header('content-type','application/json')->setContent([
                'message'=>$e->getMessage()
            ])->setStatusCode(422);
        }

    }
}
