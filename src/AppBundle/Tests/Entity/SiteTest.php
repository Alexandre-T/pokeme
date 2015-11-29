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

use AppBundle\Entity\Site;
use AppBundle\Entity\Annuaire;
use AppBundle\Entity\Validation;
use AppBundle\Entity\Vote;
use Application\Sonata\ClassificationBundle\Entity\Tag;
use Doctrine\Common\Collections\Collection;

/**
 * Entity Site Class Tests.
 *
 * @category Testing
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class SiteTest extends AbstractOwnedTest
{
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->object = new Site();
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
     * Test site constructor.
     *
     * @covers AppBundle\Entity\Site::__construct()
     */
    public function testConstruct()
    {
        $this->assertNull($this->object->getCreated());
        $this->assertTrue($this->object->getAnnuaires() instanceof Collection);
        $this->assertEquals(0, $this->object->getAnnuaires()->count());
        $this->assertNull($this->object->getDescription());
        $this->assertNull($this->object->getId());
        $this->assertNull($this->object->getName());
        $this->assertNull($this->object->getOwner());
        $this->assertNull($this->object->getUpdated());
        $this->assertNull($this->object->getUrl());
        $this->assertInstanceOf('AppBundle\Entity\Validation', $this->object->getValidation());
        $this->assertTrue($this->object->getVotes() instanceof Collection);
        $this->assertEquals(0, $this->object->getVotes()->count());
    }

    /**
     * Test manipulation of Vote Collection.
     *
     * @covers AppBundle\Entity\Site::addVote()
     * @covers AppBundle\Entity\Site::removeVote()
     * @covers AppBundle\Entity\Site::getVotes()
     */
    public function testVote()
    {
        $votes[0] = new Vote();
        $votes[1] = new Vote();
        $votes[2] = new Vote();

        $this->assertTrue($this->object->getVotes() instanceof Collection);
        $this->assertEquals(0, $this->object->getVotes()->count());

        $this->object->addVote($votes[0]);
        $this->assertEquals(1, $this->object->getVotes()->count());
        $this->assertTrue($this->object->getVotes()->contains($votes[0]));
        $this->assertFalse($this->object->getVotes()->contains($votes[1]));
        $this->assertFalse($this->object->getVotes()->contains($votes[2]));

        $this->object->addVote($votes[1]);
        $this->assertEquals(2, $this->object->getVotes()->count());
        $this->assertTrue($this->object->getVotes()->contains($votes[0]));
        $this->assertTrue($this->object->getVotes()->contains($votes[1]));
        $this->assertFalse($this->object->getVotes()->contains($votes[2]));

        $this->object->removeVote($votes[2]);
        $this->assertEquals(2, $this->object->getVotes()->count());
        $this->assertTrue($this->object->getVotes()->contains($votes[0]));
        $this->assertTrue($this->object->getVotes()->contains($votes[1]));
        $this->assertFalse($this->object->getVotes()->contains($votes[2]));

        $this->object->removeVote($votes[0]);
        $this->assertEquals(1, $this->object->getVotes()->count());
        $this->assertFalse($this->object->getVotes()->contains($votes[0]));
        $this->assertTrue($this->object->getVotes()->contains($votes[1]));
        $this->assertFalse($this->object->getVotes()->contains($votes[2]));
    }

    /**
     * Test manipulation of annuaire collection.
     *
     * @covers AppBundle\Entity\Site::addAnnuaire()
     * @covers AppBundle\Entity\Site::removeAnnuaire()
     * @covers AppBundle\Entity\Site::getAnnuaires()
     */
    public function testAnnuaire()
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
     * Test manipulation of Tag collection.
     *
     * @covers AppBundle\Entity\Site::addTag()
     * @covers AppBundle\Entity\Site::removeTag()
     * @covers AppBundle\Entity\Site::getTags()
     */
    public function testAddTag()
    {
        $tags[0] = new Tag();
        $tags[1] = new Tag();
        $tags[2] = new Tag();
        $this->assertTrue($this->object->getTags() instanceof Collection);
        $this->assertEquals(0, $this->object->getTags()->count());

        $this->object->addTag($tags[0]);
        $this->assertEquals(1, $this->object->getTags()->count());
        $this->assertTrue($this->object->getTags()->contains($tags[0]));
        $this->assertFalse($this->object->getTags()->contains($tags[1]));
        $this->assertFalse($this->object->getTags()->contains($tags[2]));

        $this->object->addTag($tags[1]);
        $this->assertEquals(2, $this->object->getTags()->count());
        $this->assertTrue($this->object->getTags()->contains($tags[0]));
        $this->assertTrue($this->object->getTags()->contains($tags[1]));
        $this->assertFalse($this->object->getTags()->contains($tags[2]));

        $this->object->removeTag($tags[2]);
        $this->assertEquals(2, $this->object->getTags()->count());
        $this->assertTrue($this->object->getTags()->contains($tags[0]));
        $this->assertTrue($this->object->getTags()->contains($tags[1]));
        $this->assertFalse($this->object->getTags()->contains($tags[2]));

        $this->object->removeTag($tags[0]);
        $this->assertEquals(1, $this->object->getTags()->count());
        $this->assertFalse($this->object->getTags()->contains($tags[0]));
        $this->assertTrue($this->object->getTags()->contains($tags[1]));
        $this->assertFalse($this->object->getTags()->contains($tags[2]));
    }

    /**
     * Test getter and setter of validation property.
     *
     * @covers AppBundle\Entity\Site::setValidation()
     * @covers AppBundle\Entity\Site::getValidation()
     */
    public function testSetValidator()
    {
        $validation = new Validation();
        $this->object->setValidation($validation);
        $this->assertEquals($validation, $this->object->getValidation());
    }
}
