<?php
/**
 * This file is part of the PokeMe Application.
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
namespace Application\Sonata\UserBundle\Tests\Entity;

use Application\Sonata\UserBundle\Entity\Group;

/**
 * Entity Group Class Tests.
 *
 * @category Testing
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class GroupTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Group instance to test.
     *
     * @var Group
     */
    private $group;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->group = new Group('group-test', array());
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->group = null;

        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function testConstruct()
    {
        $this->assertNull($this->group->getId());
    }

    /**
     * Tests Group->getId().
     */
    public function testGetId()
    {
        $this->assertNull($this->group->getId());
    }
}
