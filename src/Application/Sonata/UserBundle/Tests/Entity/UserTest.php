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
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $this->user->getOwnedAnnuaires());
        $this->assertEquals(0, $this->user->getOwnedAnnuaires()->count());
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $this->user->getOwnedSites());
        $this->assertEquals(0, $this->user->getOwnedSites()->count());
    }

    /**
     * Tests User->addOwnedAnnuaire() testRemoveOwnedAnnuaire() testGetOwnedAnnuaires().
     */
    public function testAddOwnedAnnuaire()
    {
        $ownedAnnuaires[0] = new Annuaire();
        $ownedAnnuaires[1] = new Annuaire();
        $ownedAnnuaires[2] = new Annuaire();

        $this->assertTrue($this->user->getOwnedAnnuaires() instanceof Collection);
        $this->assertEquals(0, $this->user->getOwnedAnnuaires()->count());

        $this->user->addOwnedAnnuaire($ownedAnnuaires[0]);
        $this->assertEquals(1, $this->user->getOwnedAnnuaires()->count());
        $this->assertTrue($this->user->getOwnedAnnuaires()->contains($ownedAnnuaires[0]));
        $this->assertFalse($this->user->getOwnedAnnuaires()->contains($ownedAnnuaires[1]));
        $this->assertFalse($this->user->getOwnedAnnuaires()->contains($ownedAnnuaires[2]));

        $this->user->addOwnedAnnuaire($ownedAnnuaires[1]);
        $this->assertEquals(2, $this->user->getOwnedAnnuaires()->count());
        $this->assertTrue($this->user->getOwnedAnnuaires()->contains($ownedAnnuaires[0]));
        $this->assertTrue($this->user->getOwnedAnnuaires()->contains($ownedAnnuaires[1]));
        $this->assertFalse($this->user->getOwnedAnnuaires()->contains($ownedAnnuaires[2]));

        $this->user->removeOwnedAnnuaire($ownedAnnuaires[2]);
        $this->assertEquals(2, $this->user->getOwnedAnnuaires()->count());
        $this->assertTrue($this->user->getOwnedAnnuaires()->contains($ownedAnnuaires[0]));
        $this->assertTrue($this->user->getOwnedAnnuaires()->contains($ownedAnnuaires[1]));
        $this->assertFalse($this->user->getOwnedAnnuaires()->contains($ownedAnnuaires[2]));

        $this->user->removeOwnedAnnuaire($ownedAnnuaires[0]);
        $this->assertEquals(1, $this->user->getOwnedAnnuaires()->count());
        $this->assertFalse($this->user->getOwnedAnnuaires()->contains($ownedAnnuaires[0]));
        $this->assertTrue($this->user->getOwnedAnnuaires()->contains($ownedAnnuaires[1]));
        $this->assertFalse($this->user->getOwnedAnnuaires()->contains($ownedAnnuaires[2]));
    }

    /**
     * Tests User->addOwnedSites() testRemoveOwnedSites() testGetOwnedSites().
     */
    public function testAddOwnedSites()
    {
        $ownedSites[0] = new Site();
        $ownedSites[1] = new Site();
        $ownedSites[2] = new Site();

        $this->assertTrue($this->user->getOwnedSites() instanceof Collection);
        $this->assertEquals(0, $this->user->getOwnedSites()->count());

        $this->user->addOwnedSite($ownedSites[0]);
        $this->assertEquals(1, $this->user->getOwnedSites()->count());
        $this->assertTrue($this->user->getOwnedSites()->contains($ownedSites[0]));
        $this->assertFalse($this->user->getOwnedSites()->contains($ownedSites[1]));
        $this->assertFalse($this->user->getOwnedSites()->contains($ownedSites[2]));

        $this->user->addOwnedSite($ownedSites[1]);
        $this->assertEquals(2, $this->user->getOwnedSites()->count());
        $this->assertTrue($this->user->getOwnedSites()->contains($ownedSites[0]));
        $this->assertTrue($this->user->getOwnedSites()->contains($ownedSites[1]));
        $this->assertFalse($this->user->getOwnedSites()->contains($ownedSites[2]));

        $this->user->removeOwnedSite($ownedSites[2]);
        $this->assertEquals(2, $this->user->getOwnedSites()->count());
        $this->assertTrue($this->user->getOwnedSites()->contains($ownedSites[0]));
        $this->assertTrue($this->user->getOwnedSites()->contains($ownedSites[1]));
        $this->assertFalse($this->user->getOwnedSites()->contains($ownedSites[2]));

        $this->user->removeOwnedSite($ownedSites[0]);
        $this->assertEquals(1, $this->user->getOwnedSites()->count());
        $this->assertFalse($this->user->getOwnedSites()->contains($ownedSites[0]));
        $this->assertTrue($this->user->getOwnedSites()->contains($ownedSites[1]));
        $this->assertFalse($this->user->getOwnedSites()->contains($ownedSites[2]));
    }
}
