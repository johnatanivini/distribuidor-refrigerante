<?php


namespace App\Repositories;


use App\Produto;
use App\Repositories\Contracts\ProdutoRepositoryInterface;

class ProdutoRepository implements ProdutoRepositoryInterface
{

    /**
     * @var Produto $produto
     */
    private $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    public function findAll($request = null)
    {
        $produtos = $this->produto::with(['tipo', 'sabor', 'marca', 'litragem']);

        if (property_exists($request, 'marca')) {
            $produtos->when($request->marca, function ($query) use (&$request) {
                $query->where('marca_id', $request->marca);
            });
        }
        if (property_exists($request, 'tipo')) {
            $produtos->when($request->tipo, function ($query) use (&$request) {
                $query->where('tipo_id', $request->tipo);
            });
        }
        if (property_exists($request, 'sabor')) {
            $produtos->when($request->sabor, function ($query) use (&$request) {
                $query->where('sabor_id', $request->sabor);
            });
        }
        if (property_exists($request, 'litragem')) {
            $produtos->when($request->litragem, function ($query) use (&$request) {
                $query->where('litragem_id', $request->litragem);
            });
        }
        if (property_exists($request, 'valor')) {
            $produtos->when($request->valor, function ($query) use (&$request) {
                $valor = str_replace('.', '', $request->valor);
                $valor = str_replace(',', '.', $valor);
                $query->where('valor', $valor);
            });
        }
        if (property_exists($request, 'quantidade')) {
            $produtos->when($request->quantidade, function ($query) use (&$request) {
                $query->where('quantidade', $request->quantidade);
            });
        }


        return $produtos;
    }

    public function salvar($request)
    {
        $produto = new Produto();

        if (!empty($request->produto)) {
            $produto = Produto::findOrFail($request->produto);
        }

        $valor = str_replace('.', '', $request->valor);
        $valor = str_replace(',', '.', $valor);

        $produto->sabor_id = $request->sabor;
        $produto->marca_id = $request->marca;
        $produto->tipo_id = $request->tipo;
        $produto->litragem_id = $request->litragem;

        $produto->valor = $valor;
        $produto->quantidade = $request->quantidade;
        $produto->save();

    }

    public function find($id)
    {
        return $this->produto::with(['tipo', 'sabor', 'marca', 'litragem'])->find($id);
    }

    public function deletar($id)
    {

        $produto = $this->produto::findOrFail($id);
        $produto->delete();
    }
}