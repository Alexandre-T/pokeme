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

use AppBundle\Entity\Annuaire;
use AppBundle\Entity\Site;
use AppBundle\Entity\Vote;
use Application\Sonata\UserBundle\Entity\User;

/**
 * Entity Vote Class Tests.
 *
 * @category Testing
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class VoteTest extends AbstractEntityTest
{
    /**
     * Vote entity class to Test.
     *
     * @var Vote
     */
    private $vote;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->vote = new Vote();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->vote = null;

        parent::tearDown();
    }

    /**
     * Test constructor.
     */
    public function testConstruct()
    {
        $this->assertNull($this->vote->getAnnuaire());
        $this->assertNull($this->vote->getCreated());
        $this->assertNull($this->vote->getId());
        $this->assertNull($this->vote->getSite());
        $this->assertNull($this->vote->getTracker());
        $this->assertNull($this->vote->getUser());
    }

    /**
     * Test getter and setter of Annuaire property.
     *
     * @covers AppBundle\Entity\Vote::setAnnuaire()
     * @covers AppBundle\Entity\Vote::getAnnuaire()
     */
    public function testSetAnnuaire()
    {
        $annuaire = new Annuaire();
        $this->vote->setAnnuaire($annuaire);
        $this->assertEquals($annuaire, $this->vote->getAnnuaire());
    }

    /**
     * Test getter and setter of Site property.
     *
     * @covers AppBundle\Entity\Vote::setSite()
     * @covers AppBundle\Entity\Vote::getSite()
     */
    public function testSetSite()
    {
        $site = new Site();
        $this->vote->setSite($site);
        $this->assertEquals($site, $this->vote->getSite());
    }

    /**
     * Test getter and setter of tracker property.
     *
     * @covers AppBundle\Entity\Vote::setTracker()
     * @covers AppBundle\Entity\Vote::getTracker()
     */
    public function testSetTracker()
    {
        $tracker = uniqid();
        $this->vote->setTracker($tracker);
        $this->assertEquals($tracker, $this->vote->getTracker());
    }

    /**
     * Test getter and setter of User property.
     *
     * @covers AppBundle\Entity\Vote::setUser()
     * @covers AppBundle\Entity\Vote::getUser()
     */
    public function testUser()
    {
        $user = new User();
        $this->vote->setUser($user);
        $this->assertEquals($user, $this->vote->getUser());
    }

    /**
     * Test getter and setter of point property.
     *
     * @covers AppBundle\Entity\Vote::setPoint()
     * @covers AppBundle\Entity\Vote::getPoint()
     */
    public function testPoint()
    {
        $expected = 3;
        $this->vote->setPoint($expected);
        $this->assertEquals($expected, $this->vote->getPoint());
    }
}
