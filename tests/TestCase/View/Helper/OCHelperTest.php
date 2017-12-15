<?php
namespace Alvarium\OCClient\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Alvarium\OCClient\View\Helper\OCHelper;

/**
 * OCClient\View\Helper\OCHelper Test Case
 */
class OCHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \OCClient\View\Helper\OCHelper
     */
    public $OC;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->OC = new OCHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OC);

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
