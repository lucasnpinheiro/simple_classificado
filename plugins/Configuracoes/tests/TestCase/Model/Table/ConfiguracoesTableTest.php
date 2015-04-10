<?php
namespace Configuracoes\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Configuracoes\Model\Table\ConfiguracoesTable;

/**
 * Configuracoes\Model\Table\ConfiguracoesTable Test Case
 */
class ConfiguracoesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Configuracoes' => 'plugin.configuracoes.configuracoes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Configuracoes') ? [] : ['className' => 'Configuracoes\Model\Table\ConfiguracoesTable'];
        $this->Configuracoes = TableRegistry::get('Configuracoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Configuracoes);

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
}
