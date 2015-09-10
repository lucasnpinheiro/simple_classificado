<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PedidosProdutosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PedidosProdutosTable Test Case
 */
class PedidosProdutosTableTest extends TestCase
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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PedidosProdutos') ? [] : ['className' => 'App\Model\Table\PedidosProdutosTable'];
        $this->PedidosProdutos = TableRegistry::get('PedidosProdutos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PedidosProdutos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
