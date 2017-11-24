<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PageSectionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PageSectionsTable Test Case
 */
class PageSectionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PageSectionsTable
     */
    public $PageSections;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.page_sections',
        'app.pages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PageSections') ? [] : ['className' => PageSectionsTable::class];
        $this->PageSections = TableRegistry::get('PageSections', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PageSections);

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
