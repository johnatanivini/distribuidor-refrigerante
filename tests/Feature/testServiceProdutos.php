<?php


namespace Tests\Feature;


use App\Services\Contracts\ListarServiceInterface;
use App\Services\CreateProdutoService;
use App\Services\ExcluirProdutoService;
use App\Services\ListarProdutoService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Tests\TestCase;

class testServiceProdutos extends TestCase
{
    use WithoutMiddleware;

    protected function setUp(): void
    {

        parent::setUp(); // TODO: Change the autogenerated stub


        //$this->withoutMiddleware();
    }

    public function testListarService(){

        $service = resolve(ListarProdutoService::class);

        $request = (object) [
            'tipo'=>13
        ];
        $produtos = $service->listar($request);
        $this->assertInstanceOf(Builder::class,$produtos);

    }

    public function testSalvarService(){

        $service = resolve(CreateProdutoService::class);

        $request = (object) [
            'tipo'=>13,
            'marca'=>11,
            'litragem'=>13,
            'valor'=>'2,8',
            'quantidade'=>60,
            'sabor'=>9,

        ];

        $produtos = $service->salvar($request);

        $this->assertNull($produtos);

    }

    public function testSalvarServiceComID(){

        $service = resolve(CreateProdutoService::class);

        $request = (object) [
            'tipo'=>13,
            'marca'=>11,
            'litragem'=>13,
            'valor'=>'2,8',
            'quantidade'=>60,
            'sabor'=>12,
            'produto'=>22

        ];

        $produtos = $service->salvar($request);

        $this->assertNull($produtos);

    }

    public function testExcluirService(){
        $produto = $this->get('/produtos/excluir/20');
        var_dump($produto);
    }




}