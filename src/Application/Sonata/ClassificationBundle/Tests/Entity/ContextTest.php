<?php
/**
 * This file is part of the JDR Application.
 *
 * PHP version 5
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category Testing
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2015 Alexandre Tranchant
 * @license   GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
namespace Application\Sonata\ClassificationBundle\Tests\Entity;
use Application\Sonata\ClassificationBundle\Entity\Context;
/**
 * Class ContextTest.
 *
 * @category Testing
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class ContextTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Context to test.
     *
     * @var Context
     */
    private $context;
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->context = new Context();
    }
    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->context = null;
        parent::tearDown();
    }
    /**
     * Test that Id is null at the beginning.
     */
    public function testGetId()
    {
        $this->assertNull($this->context->getId());
    }
}
