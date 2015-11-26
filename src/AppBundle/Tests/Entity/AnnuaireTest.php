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
use Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\Collections\Collection;

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
class AnnuaireTest extends AbstractEntityTest
{
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->object = new Annuaire();
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
     * Tests User->getId().
     */
    public function testGetId()
    {
        $this->assertNull($this->object->getId());
    }

    /**
     * Test Annuaire->__construct().
     */
    public function testConstruct()
    {
        $this->assertNull($this->object->getId());
        $this->assertNull($this->object->getCreated());
        $this->assertNull($this->object->getDescription());
        $this->assertNull($this->object->getName());
        $this->assertNull($this->object->getOwner());
        $this->assertNull($this->object->getUpdated());
        $this->assertNull($this->object->getUrl());
        $this->assertInstanceOf('AppBundle\Entity\Validation', $this->object->getValidation());
        $this->assertInstanceOf('Doctrine\Common\Collections\Collection', $this->object->getSites());
        $this->assertEquals(0, $this->object->getSites()->count());
        $this->assertInstanceOf('Doctrine\Common\Collections\Collection', $this->object->getVotes());
        $this->assertEquals(0, $this->object->getVotes()->count());
    }

    /**
     * Tests User->addVote() testRemoveVote() testGetVotes().
     */
    public function testAddVote()
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
     * Tests User->addSite() User->removeSite() User->getSites().
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

    /**
     * Tests Annuaire->addTag() Annuaire->removeTag() Annuaire->getTags().
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
     * Tests annuaire->setName() annuaire->getName().
     */
    public function testSetName()
    {
        $name = 'name';
        $this->object->setName($name);
        $this->assertEquals($name, $this->object->getName());
    }

    /**
     * Tests annuaire->setDescription() annuaire->getDescription().
     */
    public function testSetDescription()
    {
        $description = 'description';
        $this->object->setDescription($description);
        $this->assertEquals($description, $this->object->getDescription());
    }

    /**
     * Tests annuaire->setUrl() annuaire->getUrl().
     */
    public function testSetUrl()
    {
        $url = 'http://www.example.org';
        $this->object->setUrl($url);
        $this->assertEquals($url, $this->object->getUrl());
    }

    /**
     * Tests annuaire->setOwner() annuaire->getOwner().
     */
    public function testSetOwner()
    {
        $owner = new User();
        $this->object->setOwner($owner);
        $this->assertEquals($owner, $this->object->getOwner());
    }

    /**
     * Tests annuaire->setName() annuaire->getName().
     */
    public function testSetValidator()
    {
        $validation = new Validation();
        $this->object->setValidation($validation);
        $this->assertEquals($validation, $this->object->getValidation());
    }
}
