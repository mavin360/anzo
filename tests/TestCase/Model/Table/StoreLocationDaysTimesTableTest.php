<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StoreLocationDaysTimesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StoreLocationDaysTimesTable Test Case
 */
class StoreLocationDaysTimesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StoreLocationDaysTimesTable
     */
    public $StoreLocationDaysTimes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.store_location_days_times',
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
        $config = TableRegistry::exists('StoreLocationDaysTimes') ? [] : ['className' => StoreLocationDaysTimesTable::class];
        $this->StoreLocationDaysTimes = TableRegistry::get('StoreLocationDaysTimes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StoreLocationDaysTimes);

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
