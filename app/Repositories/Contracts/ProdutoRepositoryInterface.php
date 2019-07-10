<?php


namespace App\Repositories\Contracts;


interface ProdutoRepositoryInterface
{
    public function findAll($request = null);
    public function salvar($dados);
    public function find($id);
    public function deletar($id);

}