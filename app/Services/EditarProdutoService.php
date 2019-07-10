<?php


namespace App\Services;


use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Services\Contracts\EditarServiceInterface;


class EditarProdutoService implements EditarServiceInterface
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
     * @param $id
     */
    public function editar($id)
    {

        $this->repository->find($id);

    }

}