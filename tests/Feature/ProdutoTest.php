<?php

namespace Tests\Feature;

use App\Produto;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProdutoTest extends TestCase
{
    use WithoutMiddleware;


    protected function setUp(): void
    {

        parent::setUp(); // TODO: Change the autogenerated stub


        //$this->withoutMiddleware();
    }

    public function testProdutos(){

        $response = $this->get('/home');
        $response->assertStatus(200);
    }
    public function testCreate(){
        /**
         * @var Produto $produto
         */
        $produto = factory(Produto::class)->create();

        $this->assertDatabaseHas('produtos',[
            'id'=>$produto->id
        ]);
    }

    public function testDelete(){
        $produto = $this->get('/produtos/excluir/4');

        $this->assertDatabaseMissing('produtos',[
            'id'=>4
        ]);
    }

    public function testEditar(){

        $produto = $this->get('/produtos/editar/4');
        $produto->assertStatus(200);
        $this->assertDatabaseHas('produtos',[
            'id'=>4
        ]);
    }

    public function  testUpdate(){
        $produto = $this->post('/produtos/salvar',[
            'produto'=>6,
            'sabor'=>6,
            'tipo'=>5,
            'litragem'=>8,
            'quantidade'=>100,
            'valor'=>1.05,
            'marca'=>2
        ]);

        $this->assertDatabaseHas('produtos',[
            'id'=>6
        ]);
    }
}
