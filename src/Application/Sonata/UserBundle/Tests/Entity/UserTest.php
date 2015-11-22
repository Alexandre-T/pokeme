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

use Application\Sonata\UserBundle\Entity\User as UserEntity;

/**
 * Entity User Class Tests.
 *
 * @category Testing
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * User entity class to Test.
     *
     * @var UserEntity
     */
    private $user;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->user = new UserEntity();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->user = null;

        parent::tearDown();
    }

    /**
     * Tests User->getId().
     */
    public function testGetId()
    {
        $this->assertNull($this->user->getId());
    }

    /**
     * Test User->__construct().
     */
    public function testConstruct()
    {
        $this->user = new UserEntity();
        $this->assertNull($this->user->getId());
    }
}
