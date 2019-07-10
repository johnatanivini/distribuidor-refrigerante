<?php


namespace App\Services;


use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Services\Contracts\CreateServiceInterface;


class CreateProdutoService implements CreateServiceInterface
{

    private $repository;

    public function __construct(ProdutoRepositoryInterface $produtoRepository)
    {
        $this->repository = $produtoRepository;
    }

    public function salvar($produto)
    {

        $this->repository->salvar($produto);

    }

}