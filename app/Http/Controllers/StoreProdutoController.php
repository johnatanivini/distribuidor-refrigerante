<?php

namespace App\Http\Controllers;

use App\Services\Contracts\CreateServiceInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StoreProdutoController extends Controller
{

    private $createService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CreateServiceInterface $createService)
    {
        $this->createService = $createService;

        $this->middleware('auth');
    }

    public function salvar(Request $request, Response $response)
    {
        try {

            $validador = \Validator::make($request->all(), [
                'valor' => 'required|between:0,999999.99',
                'sabor' => 'required|int',
                'litragem' => 'required|int',
                'marca' => 'required|int',
                'tipo' => 'required|int',
                'quantidade' => 'required|min:1'
            ]);

            if ($validador->fails()) {
                throw new \Exception('Falha ao validar objetos' . $validador->errors());
            }


            return $response->header('content-type', 'application/json')->setContent([
                'message' => 'Dados salvo com sucesso!'
            ])->setStatusCode(200);


        } catch (QueryException | \Exception $e) {
            return $response->header('content-type', 'application/json')->setContent([
                'message' => $e->getCode() == 23000 ? 'Este produto já está cadastrado!' : 'Ocorreu um erro ao tentar inserir'
            ])->setStatusCode(422);
        }
    }
}
