<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StoreLocationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StoreLocationsTable Test Case
 */
class StoreLocationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StoreLocationsTable
     */
    public $StoreLocations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.store_locations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('StoreLocations') ? [] : ['className' => StoreLocationsTable::class];
        $this->StoreLocations = TableRegistry::get('StoreLocations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StoreLocations);

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
