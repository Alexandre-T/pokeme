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
use AppBundle\Entity\Classement;
use AppBundle\Entity\Vote;
use Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\Collections\Collection;

/**
 * Entity Classement Class Tests.
 *
 * @category Testing
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class ClassementTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Classement entity class to Test.
     *
     * @var Classement
     */
    private $classement;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->classement = new Classement();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->classement = null;

        parent::tearDown();
    }

    /**
     * Tests User->getId().
     */
    public function testGetId()
    {
        $this->assertNull($this->classement->getId());
    }

    /**
     * Test User->__construct().
     */
    public function testConstruct()
    {
        $this->assertNull($this->classement->getId());
        $this->assertNull($this->classement->getCreated());
        $this->assertNull($this->classement->getDescription());
        $this->assertNull($this->classement->getName());
        $this->assertNull($this->classement->getOwner());
        $this->assertEquals(Classement::EN_ATTENTE, $this->classement->getStatus());
        $this->assertNull($this->classement->getUpdated());
        $this->assertNull($this->classement->getUrl());
        $this->assertNull($this->classement->getValidated());
        $this->assertNull($this->classement->getValidator());
        $this->assertFalse($this->classement->isValidated());
        $this->assertTrue($this->classement->getSites() instanceof Collection);
        $this->assertEquals(0, $this->classement->getSites()->count());
        $this->assertTrue($this->classement->getVotes() instanceof Collection);
        $this->assertEquals(0, $this->classement->getVotes()->count());
    }

    /**
     * Tests User->addVote() testRemoveVote() testGetVotes().
     */
    public function testAddVote()
    {
        $votes[0] = new Vote();
        $votes[1] = new Vote();
        $votes[2] = new Vote();

        $this->assertTrue($this->classement->getVotes() instanceof Collection);
        $this->assertEquals(0, $this->classement->getVotes()->count());

        $this->classement->addVote($votes[0]);
        $this->assertEquals(1, $this->classement->getVotes()->count());
        $this->assertTrue($this->classement->getVotes()->contains($votes[0]));
        $this->assertFalse($this->classement->getVotes()->contains($votes[1]));
        $this->assertFalse($this->classement->getVotes()->contains($votes[2]));

        $this->classement->addVote($votes[1]);
        $this->assertEquals(2, $this->classement->getVotes()->count());
        $this->assertTrue($this->classement->getVotes()->contains($votes[0]));
        $this->assertTrue($this->classement->getVotes()->contains($votes[1]));
        $this->assertFalse($this->classement->getVotes()->contains($votes[2]));

        $this->classement->removeVote($votes[2]);
        $this->assertEquals(2, $this->classement->getVotes()->count());
        $this->assertTrue($this->classement->getVotes()->contains($votes[0]));
        $this->assertTrue($this->classement->getVotes()->contains($votes[1]));
        $this->assertFalse($this->classement->getVotes()->contains($votes[2]));

        $this->classement->removeVote($votes[0]);
        $this->assertEquals(1, $this->classement->getVotes()->count());
        $this->assertFalse($this->classement->getVotes()->contains($votes[0]));
        $this->assertTrue($this->classement->getVotes()->contains($votes[1]));
        $this->assertFalse($this->classement->getVotes()->contains($votes[2]));
    }

    /**
     * Tests User->addSite() User->removeSite() User->getSites().
     */
    public function testAddSite()
    {
        $sites[0] = new Site();
        $sites[1] = new Site();
        $sites[2] = new Site();
        $this->assertTrue($this->classement->getSites() instanceof Collection);
        $this->assertEquals(0, $this->classement->getSites()->count());

        $this->classement->addSite($sites[0]);
        $this->assertEquals(1, $this->classement->getSites()->count());
        $this->assertTrue($this->classement->getSites()->contains($sites[0]));
        $this->assertFalse($this->classement->getSites()->contains($sites[1]));
        $this->assertFalse($this->classement->getSites()->contains($sites[2]));

        $this->classement->addSite($sites[1]);
        $this->assertEquals(2, $this->classement->getSites()->count());
        $this->assertTrue($this->classement->getSites()->contains($sites[0]));
        $this->assertTrue($this->classement->getSites()->contains($sites[1]));
        $this->assertFalse($this->classement->getSites()->contains($sites[2]));

        $this->classement->removeSite($sites[2]);
        $this->assertEquals(2, $this->classement->getSites()->count());
        $this->assertTrue($this->classement->getSites()->contains($sites[0]));
        $this->assertTrue($this->classement->getSites()->contains($sites[1]));
        $this->assertFalse($this->classement->getSites()->contains($sites[2]));

        $this->classement->removeSite($sites[0]);
        $this->assertEquals(1, $this->classement->getSites()->count());
        $this->assertFalse($this->classement->getSites()->contains($sites[0]));
        $this->assertTrue($this->classement->getSites()->contains($sites[1]));
        $this->assertFalse($this->classement->getSites()->contains($sites[2]));
    }

    /**
     * Tests classement->setName() classement->getName().
     */
    public function testSetName()
    {
        $name = 'name';
        $this->classement->setName($name);
        $this->assertEquals($name, $this->classement->getName());
    }

    /**
     * Tests classement->setDescription() classement->getDescription().
     */
    public function testSetDescription()
    {
        $description = 'description';
        $this->classement->setDescription($description);
        $this->assertEquals($description, $this->classement->getDescription());
    }

    /**
     * Tests classement->setStatus() classement->getStatus().
     */
    public function testSetStatus()
    {
        $this->classement->setStatus(Classement::ACCEPTE);
        $this->assertEquals(Classement::ACCEPTE, $this->classement->getStatus());
        $this->classement->setStatus(Classement::EN_ATTENTE);
        $this->assertEquals(Classement::EN_ATTENTE, $this->classement->getStatus());
        $this->classement->setStatus(Classement::REFUSE);
        $this->assertEquals(Classement::REFUSE, $this->classement->getStatus());
    }

    /**
     * Tests classement->setUrl() classement->getUrl().
     */
    public function testSetUrl()
    {
        $url = 'http://www.example.org';
        $this->classement->setUrl($url);
        $this->assertEquals($url, $this->classement->getUrl());
    }

    /**
     * Tests classement->setOwner() classement->getOwner().
     */
    public function testSetOwner()
    {
        $owner = new User();
        $this->classement->setOwner($owner);
        $this->assertEquals($owner, $this->classement->getOwner());
    }

    /**
     * Tests Classement->setCreated() Classement->getCreated().
     */
    public function testSetCreated()
    {
        $date = new \DateTime();
        $this->classement->setCreated($date);
        $this->assertEquals($date, $this->classement->getCreated());
    }

    /**
     * Tests Classement->setUpdated() Classement->getUpdated().
     */
    public function testSetUpdated()
    {
        $updated = new \DateTime();
        $this->classement->setUpdated($updated);
        $this->assertEquals($updated, $this->classement->getUpdated());
    }

    /**
     * Tests Classement->setValidated() Classement->getValidated() Classement->isValidated().
     */
    public function testSetValidated()
    {
        $validated = new \DateTime();
        $this->classement->setValidated($validated);
        $this->assertTrue($this->classement->isValidated());
        $this->assertEquals($validated, $this->classement->getValidated());

        $this->classement->setValidated(null);
        $this->assertFalse($this->classement->isValidated());
        $this->assertNull($this->classement->getValidated());
    }

    /**
     * Tests Classement->setCreatedValue().
     */
    public function testSetCreatedValue()
    {
        $this->assertNull($this->classement->getCreated());
        $this->assertInstanceOf('AppBundle\Entity\Classement', $this->classement->setCreatedValue());
        $this->assertNotNull($this->classement->getCreated());
        $this->assertTrue($this->classement->getCreated() instanceof \DateTime);

        $date = new \DateTime();
        $date->sub(new \DateInterval('P5Y'));
        $this->classement->setCreated($date);
        $this->assertEquals($date, $this->classement->getCreated());
        $this->assertInstanceOf('AppBundle\Entity\Classement', $this->classement->setCreatedValue());
        $this->assertEquals($date, $this->classement->getCreated());
    }

    /**
     * Tests Classement->setUpdatedValue().
     */
    public function testSetUpdatedValue()
    {
        $this->assertNull($this->classement->getUpdated());
        $this->classement->setUpdatedValue();
        $this->assertNotNull($this->classement->getUpdated());
        $this->assertTrue($this->classement->getUpdated() instanceof \DateTime);

        $date = new \DateTime();
        $date->sub(new \DateInterval('P5Y'));
        $this->classement->setUpdated($date);
        $this->assertEquals($date, $this->classement->getUpdated());
        $this->classement->setUpdatedValue();
        $this->assertNotEquals($date, $this->classement->getUpdated());
    }
}
