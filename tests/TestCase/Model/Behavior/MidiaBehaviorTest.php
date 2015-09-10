<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\MidiaBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\MidiaBehavior Test Case
 */
class MidiaBehaviorTest extends TestCase
{

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Midia = new MidiaBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Midia);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
