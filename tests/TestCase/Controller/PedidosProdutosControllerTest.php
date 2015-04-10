<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PedidosProdutosController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\PedidosProdutosController Test Case
 */
class PedidosProdutosControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'PedidosProdutos' => 'app.pedidos_produtos',
        'Produtos' => 'app.produtos',
        'Categorias' => 'app.categorias',
        'Pedidos' => 'app.pedidos',
        'Clientes' => 'app.clientes'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
