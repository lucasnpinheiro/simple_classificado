<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BlogsPagesPostsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BlogsPagesPostsTable Test Case
 */
class BlogsPagesPostsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'BlogsPagesPosts' => 'app.blogs_pages_posts',
        'BlogsPages' => 'app.blogs_pages',
        'BlogsPosts' => 'app.blogs_posts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BlogsPagesPosts') ? [] : ['className' => 'App\Model\Table\BlogsPagesPostsTable'];
        $this->BlogsPagesPosts = TableRegistry::get('BlogsPagesPosts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BlogsPagesPosts);

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
