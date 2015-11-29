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

use AppBundle\Entity\Annuaire;
use AppBundle\Entity\Site;
use AppBundle\Entity\Vote;
use Application\Sonata\UserBundle\Entity\User as UserEntity;
use Doctrine\Common\Collections\Collection;

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
    private $object;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->object = new UserEntity();
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
     * @covers Application\Sonata\UserBundle\Entity\User::getId()
     */
    public function testGetId()
    {
        $this->assertNull($this->object->getId());
    }

    /**
     * Test constructor.
     *
     * @covers Application\Sonata\UserBundle\Entity\User::__construct()
     */
    public function testConstruct()
    {
        $this->object = new UserEntity();
        $this->assertNull($this->object->getId());
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $this->object->getOwnedAnnuaires());
        $this->assertEquals(0, $this->object->getOwnedAnnuaires()->count());
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $this->object->getOwnedSites());
        $this->assertEquals(0, $this->object->getOwnedSites()->count());
    }

    /**
     * Test manipulation of Annuaire collection.
     *
     * @covers Application\Sonata\UserBundle\Entity\User::addOwnedAnnuaire()
     * @covers Application\Sonata\UserBundle\Entity\User::removeOwnedAnnuaire()
     * @covers Application\Sonata\UserBundle\Entity\User::getOwnedAnnuaires()
     */
    public function testAddOwnedAnnuaire()
    {
        $ownedAnnuaires[0] = new Annuaire();
        $ownedAnnuaires[1] = new Annuaire();
        $ownedAnnuaires[2] = new Annuaire();

        $this->assertTrue($this->object->getOwnedAnnuaires() instanceof Collection);
        $this->assertEquals(0, $this->object->getOwnedAnnuaires()->count());

        $this->object->addOwnedAnnuaire($ownedAnnuaires[0]);
        $this->assertEquals(1, $this->object->getOwnedAnnuaires()->count());
        $this->assertTrue($this->object->getOwnedAnnuaires()->contains($ownedAnnuaires[0]));
        $this->assertFalse($this->object->getOwnedAnnuaires()->contains($ownedAnnuaires[1]));
        $this->assertFalse($this->object->getOwnedAnnuaires()->contains($ownedAnnuaires[2]));

        $this->object->addOwnedAnnuaire($ownedAnnuaires[1]);
        $this->assertEquals(2, $this->object->getOwnedAnnuaires()->count());
        $this->assertTrue($this->object->getOwnedAnnuaires()->contains($ownedAnnuaires[0]));
        $this->assertTrue($this->object->getOwnedAnnuaires()->contains($ownedAnnuaires[1]));
        $this->assertFalse($this->object->getOwnedAnnuaires()->contains($ownedAnnuaires[2]));

        $this->object->removeOwnedAnnuaire($ownedAnnuaires[2]);
        $this->assertEquals(2, $this->object->getOwnedAnnuaires()->count());
        $this->assertTrue($this->object->getOwnedAnnuaires()->contains($ownedAnnuaires[0]));
        $this->assertTrue($this->object->getOwnedAnnuaires()->contains($ownedAnnuaires[1]));
        $this->assertFalse($this->object->getOwnedAnnuaires()->contains($ownedAnnuaires[2]));

        $this->object->removeOwnedAnnuaire($ownedAnnuaires[0]);
        $this->assertEquals(1, $this->object->getOwnedAnnuaires()->count());
        $this->assertFalse($this->object->getOwnedAnnuaires()->contains($ownedAnnuaires[0]));
        $this->assertTrue($this->object->getOwnedAnnuaires()->contains($ownedAnnuaires[1]));
        $this->assertFalse($this->object->getOwnedAnnuaires()->contains($ownedAnnuaires[2]));
    }

    /**
     * Test manipulation of owned sites collection.
     *
     * @covers Application\Sonata\UserBundle\Entity\User::addOwnedSite()
     * @covers Application\Sonata\UserBundle\Entity\User::removeOwnedSite()
     * @covers Application\Sonata\UserBundle\Entity\User::getOwnedSites()
     */
    public function testAddOwnedSites()
    {
        $ownedSites[0] = new Site();
        $ownedSites[1] = new Site();
        $ownedSites[2] = new Site();

        $this->assertTrue($this->object->getOwnedSites() instanceof Collection);
        $this->assertEquals(0, $this->object->getOwnedSites()->count());

        $this->object->addOwnedSite($ownedSites[0]);
        $this->assertEquals(1, $this->object->getOwnedSites()->count());
        $this->assertTrue($this->object->getOwnedSites()->contains($ownedSites[0]));
        $this->assertFalse($this->object->getOwnedSites()->contains($ownedSites[1]));
        $this->assertFalse($this->object->getOwnedSites()->contains($ownedSites[2]));

        $this->object->addOwnedSite($ownedSites[1]);
        $this->assertEquals(2, $this->object->getOwnedSites()->count());
        $this->assertTrue($this->object->getOwnedSites()->contains($ownedSites[0]));
        $this->assertTrue($this->object->getOwnedSites()->contains($ownedSites[1]));
        $this->assertFalse($this->object->getOwnedSites()->contains($ownedSites[2]));

        $this->object->removeOwnedSite($ownedSites[2]);
        $this->assertEquals(2, $this->object->getOwnedSites()->count());
        $this->assertTrue($this->object->getOwnedSites()->contains($ownedSites[0]));
        $this->assertTrue($this->object->getOwnedSites()->contains($ownedSites[1]));
        $this->assertFalse($this->object->getOwnedSites()->contains($ownedSites[2]));

        $this->object->removeOwnedSite($ownedSites[0]);
        $this->assertEquals(1, $this->object->getOwnedSites()->count());
        $this->assertFalse($this->object->getOwnedSites()->contains($ownedSites[0]));
        $this->assertTrue($this->object->getOwnedSites()->contains($ownedSites[1]));
        $this->assertFalse($this->object->getOwnedSites()->contains($ownedSites[2]));
    }

    /**
     * Test manipulation of votes collection.
     *
     * @covers Application\Sonata\UserBundle\Entity\User::addVote()
     * @covers Application\Sonata\UserBundle\Entity\User::removeVote()
     * @covers Application\Sonata\UserBundle\Entity\User::getVotes()
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
}
