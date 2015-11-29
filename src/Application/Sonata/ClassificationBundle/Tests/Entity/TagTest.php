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

use AppBundle\Entity\Annuaire;
use AppBundle\Entity\Site;
use Application\Sonata\ClassificationBundle\Entity\Tag;
use Doctrine\Common\Collections\Collection;

/**
 * Class TagTest.
 *
 * @category Testing
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class TagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tag to test.
     *
     * @var Tag
     */
    private $object;
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->object = new Tag();
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
     * Test that Id is null at the beginning.
     */
    public function testGetId()
    {
        $this->assertNull($this->object->getId());
    }

    /**
     * Test manipulation of annuaire collection.
     *
     * @covers Application\Sonata\ClassificationBundle\Entity\Tag::addAnnuaire
     * @covers Application\Sonata\ClassificationBundle\Entity\Tag::removeAnnuaire
     * @covers Application\Sonata\ClassificationBundle\Entity\Tag::getAnnuaires
     */
    public function testAddAnnuaire()
    {
        $annuaires[0] = new Annuaire();
        $annuaires[1] = new Annuaire();
        $annuaires[2] = new Annuaire();
        $this->assertTrue($this->object->getAnnuaires() instanceof Collection);
        $this->assertEquals(0, $this->object->getAnnuaires()->count());

        $this->object->addAnnuaire($annuaires[0]);
        $this->assertEquals(1, $this->object->getAnnuaires()->count());
        $this->assertTrue($this->object->getAnnuaires()->contains($annuaires[0]));
        $this->assertFalse($this->object->getAnnuaires()->contains($annuaires[1]));
        $this->assertFalse($this->object->getAnnuaires()->contains($annuaires[2]));

        $this->object->addAnnuaire($annuaires[1]);
        $this->assertEquals(2, $this->object->getAnnuaires()->count());
        $this->assertTrue($this->object->getAnnuaires()->contains($annuaires[0]));
        $this->assertTrue($this->object->getAnnuaires()->contains($annuaires[1]));
        $this->assertFalse($this->object->getAnnuaires()->contains($annuaires[2]));

        $this->object->removeAnnuaire($annuaires[2]);
        $this->assertEquals(2, $this->object->getAnnuaires()->count());
        $this->assertTrue($this->object->getAnnuaires()->contains($annuaires[0]));
        $this->assertTrue($this->object->getAnnuaires()->contains($annuaires[1]));
        $this->assertFalse($this->object->getAnnuaires()->contains($annuaires[2]));

        $this->object->removeAnnuaire($annuaires[0]);
        $this->assertEquals(1, $this->object->getAnnuaires()->count());
        $this->assertFalse($this->object->getAnnuaires()->contains($annuaires[0]));
        $this->assertTrue($this->object->getAnnuaires()->contains($annuaires[1]));
        $this->assertFalse($this->object->getAnnuaires()->contains($annuaires[2]));
    }

    /**
     * Test manipulation of tag collection.
     *
     * @covers Application\Sonata\ClassificationBundle\Entity\Tag::addSite
     * @covers Application\Sonata\ClassificationBundle\Entity\Tag::removeSite
     * @covers Application\Sonata\ClassificationBundle\Entity\Tag::getSites
     */
    public function testAddSite()
    {
        $sites[0] = new Site();
        $sites[1] = new Site();
        $sites[2] = new Site();
        $this->assertTrue($this->object->getSites() instanceof Collection);
        $this->assertEquals(0, $this->object->getSites()->count());

        $this->object->addSite($sites[0]);
        $this->assertEquals(1, $this->object->getSites()->count());
        $this->assertTrue($this->object->getSites()->contains($sites[0]));
        $this->assertFalse($this->object->getSites()->contains($sites[1]));
        $this->assertFalse($this->object->getSites()->contains($sites[2]));

        $this->object->addSite($sites[1]);
        $this->assertEquals(2, $this->object->getSites()->count());
        $this->assertTrue($this->object->getSites()->contains($sites[0]));
        $this->assertTrue($this->object->getSites()->contains($sites[1]));
        $this->assertFalse($this->object->getSites()->contains($sites[2]));

        $this->object->removeSite($sites[2]);
        $this->assertEquals(2, $this->object->getSites()->count());
        $this->assertTrue($this->object->getSites()->contains($sites[0]));
        $this->assertTrue($this->object->getSites()->contains($sites[1]));
        $this->assertFalse($this->object->getSites()->contains($sites[2]));

        $this->object->removeSite($sites[0]);
        $this->assertEquals(1, $this->object->getSites()->count());
        $this->assertFalse($this->object->getSites()->contains($sites[0]));
        $this->assertTrue($this->object->getSites()->contains($sites[1]));
        $this->assertFalse($this->object->getSites()->contains($sites[2]));
    }
}
