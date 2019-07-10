<?php

namespace App\Http\Controllers;

use App\Services\Contracts\ExcluirServiceInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExcluirProdutoController extends Controller
{
    private $produtoService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ExcluirServiceInterface $excluirService)
    {
        $this->produtoService = $excluirService;

        $this->middleware('auth');
    }

    public function excluir($id, Request $request, Response $response)
    {
        try {


            $this->produtoService->excluir($id);

            return $response->header('content-type', 'application/json')->setContent([
                'message' => "Produto #$id removido",
            ])->setStatusCode(200);

        } catch (QueryException | \Exception $e) {
            return $response->header('content-type', 'application/json')->setContent([
                'message' => 'Falha ao deletar o produto',
            ])->setStatusCode(422);
        }


    }
}
