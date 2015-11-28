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
namespace AppBundle\Tests\Entity;

/**
 * Entity Annuaire Class Tests.
 *
 * @category Testing
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class AbstractEntityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * AbstractEntity entity mocked class to Test.
     *
     * @var \AppBundle\Entity\AbstractEntity
     */
    protected $object;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->object = $this->getMockForAbstractClass('AppBundle\Entity\AbstractEntity');
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->object = null;

        parent::tearDown();
    }

    /**
     * Tests AbstractEntity->setCreated() AbstractEntity->getCreated().
     */
    public function testSetCreated()
    {
        $date = new \DateTime();
        $this->object->setCreated($date);
        $this->assertEquals($date, $this->object->getCreated());
    }

    /**
     * Tests AbstractEntity->setUpdated() AbstractEntity->getUpdated().
     */
    public function testSetUpdated()
    {
        $updated = new \DateTime();
        $this->object->setUpdated($updated);
        $this->assertEquals($updated, $this->object->getUpdated());
    }

    /**
     * Tests AbstractEntity->setIpCreator() AbstractEntity->getIpCreator().
     */
    public function testSetIpCreator()
    {
        $ipV4 = '127.0.0.1';
        $ipV6 = 'fe80::226:18ff:fef9:2cbe/64';
        $this->object->setIpCreator($ipV4);
        $this->assertEquals($ipV4, $this->object->getIpCreator());
        $this->object->setIpCreator($ipV6);
        $this->assertEquals($ipV6, $this->object->getIpCreator());
    }

    /**
     * Tests AbstractEntity->setIpUpdater() AbstractEntity->getIpUpdater().
     */
    public function testSetIpUpdater()
    {
        $ipV4 = '127.0.0.1';
        $ipV6 = 'fe80::226:18ff:fef9:2cbe/64';
        $this->object->setIpUpdater($ipV4);
        $this->assertEquals($ipV4, $this->object->getIpUpdater());
        $this->object->setIpUpdater($ipV6);
        $this->assertEquals($ipV6, $this->object->getIpUpdater());
    }
}
