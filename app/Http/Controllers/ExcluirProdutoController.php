<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExcluirProdutoController extends Controller
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

    public function excluir($id,Request $request, Response $response){
        try{

            $produto = Produto::find($id);

            if(is_null($produto)){
               throw new \Exception('Produto não encontrado, não pode ser deletado!');
            }

            $produto->delete();

            return $response->header('content-type','application/json')->setContent([
                'message'=>"Produto #$id removido",
                'dados'=>$produto
            ])->setStatusCode(200);

        }catch (QueryException | \Exception $e){
            return $response->header('content-type','application/json')->setContent([
                'message'=>'Falha ao deletar o produto',
                'dados'=>$produto
            ])->setStatusCode(422);
        }


    }
}
