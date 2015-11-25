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
     * Tests Annuaire->setCreated() Annuaire->getCreated().
     */
    public function testSetCreated()
    {
        $date = new \DateTime();
        $this->object->setCreated($date);
        $this->assertEquals($date, $this->object->getCreated());
    }

    /**
     * Tests Annuaire->setUpdated() Annuaire->getUpdated().
     */
    public function testSetUpdated()
    {
        $updated = new \DateTime();
        $this->object->setUpdated($updated);
        $this->assertEquals($updated, $this->object->getUpdated());
    }

    /**
     * Tests Annuaire->setCreatedValue().
     */
    public function testSetCreatedValue()
    {
        $this->assertNull($this->object->getCreated());
        $this->assertEquals($this->object, $this->object->setCreatedValue());
        $this->assertNotNull($this->object->getCreated());
        $this->assertTrue($this->object->getCreated() instanceof \DateTime);

        $date = new \DateTime();
        $date->sub(new \DateInterval('P5Y'));
        $this->object->setCreated($date);
        $this->assertEquals($date, $this->object->getCreated());
        $this->assertEquals($this->object, $this->object->setCreatedValue());
        $this->assertEquals($date, $this->object->getCreated());
    }

    /**
     * Tests Annuaire->setUpdatedValue().
     */
    public function testSetUpdatedValue()
    {
        $this->assertNull($this->object->getUpdated());
        $this->object->setUpdatedValue();
        $this->assertNotNull($this->object->getUpdated());
        $this->assertTrue($this->object->getUpdated() instanceof \DateTime);

        $date = new \DateTime();
        $date->sub(new \DateInterval('P5Y'));
        $this->object->setUpdated($date);
        $this->assertEquals($date, $this->object->getUpdated());
        $this->object->setUpdatedValue();
        $this->assertNotEquals($date, $this->object->getUpdated());
    }
}
