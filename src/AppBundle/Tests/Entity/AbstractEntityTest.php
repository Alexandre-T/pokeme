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
     * Test getter and setter of created property.
     *
     * @covers AppBundle\Entity\AbstractEntity::setCreated()
     * @covers AppBundle\Entity\AbstractEntity::getCreated()
     */
    public function testCreated()
    {
        $date = new \DateTime();
        $this->object->setCreated($date);
        $this->assertEquals($date, $this->object->getCreated());
    }

    /**
     * Test getter and setter of updated property.
     *
     * @covers AppBundle\Entity\AbstractEntity::setUpdated()
     * @covers AppBundle\Entity\AbstractEntity::getUpdated()
     */
    public function testUpdated()
    {
        $updated = new \DateTime();
        $this->object->setUpdated($updated);
        $this->assertEquals($updated, $this->object->getUpdated());
    }

    /**
     * Test getter and setter of ipCreator property.
     *
     * @covers AppBundle\Entity\AbstractEntity::setIpCreator()
     * @covers AppBundle\Entity\AbstractEntity::getIpCreator()
     */
    public function testIpCreator()
    {
        $ipV4 = '127.0.0.1';
        $ipV6 = 'fe80::226:18ff:fef9:2cbe/64';
        $this->object->setIpCreator($ipV4);
        $this->assertEquals($ipV4, $this->object->getIpCreator());
        $this->object->setIpCreator($ipV6);
        $this->assertEquals($ipV6, $this->object->getIpCreator());
    }

    /**
     * Test getter and setter of created property.
     *
     * @covers AppBundle\Entity\AbstractEntity::setIpUpdater()
     * @covers AppBundle\Entity\AbstractEntity::getIpUpdater()
     */
    public function testIpUpdater()
    {
        $ipV4 = '127.0.0.1';
        $ipV6 = 'fe80::226:18ff:fef9:2cbe/64';
        $this->object->setIpUpdater($ipV4);
        $this->assertEquals($ipV4, $this->object->getIpUpdater());
        $this->object->setIpUpdater($ipV6);
        $this->assertEquals($ipV6, $this->object->getIpUpdater());
    }
}
