<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobCategoriesTable Test Case
 */
class JobCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JobCategoriesTable
     */
    public $JobCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.job_categories',
        'app.jobs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('JobCategories') ? [] : ['className' => JobCategoriesTable::class];
        $this->JobCategories = TableRegistry::get('JobCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JobCategories);

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
