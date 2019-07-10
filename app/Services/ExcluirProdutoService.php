<?php


namespace App\Services;


use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Services\Contracts\ExcluirServiceInterface;


class ExcluirProdutoService implements ExcluirServiceInterface
{
    /**
     * @var ProdutoRepositoryInterface
     */
    private $repository;

    /**
     * EditarProdutoService constructor.
     * @param ProdutoRepositoryInterface $produtoRepository
     */
    public function __construct(ProdutoRepositoryInterface $produtoRepository)
    {
        $this->repository = $produtoRepository;
    }

    /**
     * @param \stdClass $request
     * @return mixed
     */
    public function excluir($id)
    {

        $this->repository->deletar($id);

    }

}