<?php
namespace Alvarium\OCClient\Test\TestCase\Controller\Component;

use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;
use Alvarium\OCClient\Controller\Component\ClientComponent;

/**
 * OCClient\Controller\Component\ClientComponent Test Case
 */
class ClientComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \OCClient\Controller\Component\ClientComponent
     */
    public $Client;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Client = new ClientComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Client);

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
