<?php

namespace App\Http\Controllers;

use App\Services\Contracts\EditarServiceInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EditarProdutoController extends Controller
{

    private $editarService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EditarServiceInterface $editarService)
    {
        $this->editarService = $editarService;

        $this->middleware('auth');
    }

    public function editar($id, Request $request, Response $response)
    {

        try {

            $produto = $this->editarService->editar($id);

            return $response->header('content-type', 'application/json')->setContent([
                'message' => 'Obter produto',
                'dados' => $produto
            ])->setStatusCode(200);

        } catch (QueryException | \Exception $e) {
            $response->header('content-type', 'application/json')->setContent([
                'message' => $e->getMessage()
            ])->setStatusCode(422);
        }

    }
}
