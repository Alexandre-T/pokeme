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

use Application\Sonata\UserBundle\Entity\User;

/**
 * Abstract Entity Owned Class Tests.
 *
 * @category Testing
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class AbstractOwnedTest extends AbstractEntityTest
{
    /**
     * AbstractOwned entity mocked class to Test.
     *
     * @var \AppBundle\Entity\AbstractOwned
     */
    protected $object;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->object = $this->getMockForAbstractClass('AppBundle\Entity\AbstractOwned');
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
     * Test getter of id property.
     *
     * @covers AppBundle\Entity\AbstractOwned::getId
     */
    public function testId()
    {
        $this->assertNull($this->object->getId());
    }

    /**
     * Test getter and setter of name property.
     *
     * @covers AppBundle\Entity\AbstractOwned::setName()
     * @covers AppBundle\Entity\AbstractOwned::getName()
     */
    public function testName()
    {
        $name = 'name';
        $this->object->setName($name);
        $this->assertEquals($name, $this->object->getName());
    }

    /**
     * Test getter and setter of description property.
     *
     * @covers AppBundle\Entity\AbstractOwned::setDescription()
     * @covers AppBundle\Entity\AbstractOwned::getDescription()
     */
    public function testDescription()
    {
        $description = 'description';
        $this->object->setDescription($description);
        $this->assertEquals($description, $this->object->getDescription());
    }

    /**
     * Test getter and setter of url property.
     *
     * @covers AppBundle\Entity\AbstractOwned::setUrl()
     * @covers AppBundle\Entity\AbstractOwned::getUrl()
     */
    public function testUrl()
    {
        $url = 'http://www.example.org';
        $this->object->setUrl($url);
        $this->assertEquals($url, $this->object->getUrl());
    }

    /**
     * Test getter and setter of owner property.
     *
     * @covers AppBundle\Entity\AbstractOwned::setOwner()
     * @covers AppBundle\Entity\AbstractOwned::getOwner()
     */
    public function testOwner()
    {
        $owner = new User();
        $this->object->setOwner($owner);
        $this->assertEquals($owner, $this->object->getOwner());
    }

    /**
     * Test getter and setter of slugUrl property.
     *
     * @covers AppBundle\Entity\AbstractOwned::setSlugUrl()
     * @covers AppBundle\Entity\AbstractOwned::getSlugUrl()
     */
    public function testSlugUrl()
    {
        $expected = 'http-www-example-org';
        $this->object->setSlugUrl($expected);
        $this->assertEquals($expected, $this->object->getSlugUrl());
    }

    /**
     * Test getter and setter of slugName property.
     *
     * @covers AppBundle\Entity\AbstractOwned::setSlugName()
     * @covers AppBundle\Entity\AbstractOwned::getSlugName()
     */
    public function testSlugName()
    {
        $expected = 'name-1';
        $this->object->setSlugName($expected);
        $this->assertEquals($expected, $this->object->getSlugName());
    }
}
