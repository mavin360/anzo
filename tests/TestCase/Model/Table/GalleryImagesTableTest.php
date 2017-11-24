<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GalleryImagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GalleryImagesTable Test Case
 */
class GalleryImagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GalleryImagesTable
     */
    public $GalleryImages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.gallery_images',
        'app.galleries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('GalleryImages') ? [] : ['className' => GalleryImagesTable::class];
        $this->GalleryImages = TableRegistry::get('GalleryImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GalleryImages);

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
