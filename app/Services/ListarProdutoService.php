<?php


namespace App\Services;


use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Services\Contracts\ListarServiceInterface;


class ListarProdutoService implements ListarServiceInterface
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
    public function listar($request = null)
    {

        return $this->repository->findAll($request);

    }

}