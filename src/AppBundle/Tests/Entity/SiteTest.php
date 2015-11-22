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
 * Entity Site Class Tests.
 *
 * @category Testing
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class SiteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Classement entity class to Test.
     *
     * @var Site
     */
    private $site;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->site = new Site();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->site = null;

        parent::tearDown();
    }

    /**
     * Tests User->getId().
     */
    public function testGetId()
    {
        $this->assertNull($this->site->getId());
    }

    /**
     * Test User->__construct().
     */
    public function testConstruct()
    {
        $this->assertNull($this->site->getCreated());
        $this->assertTrue($this->site->getClassements() instanceof Collection);
        $this->assertEquals(0, $this->site->getClassements()->count());
        $this->assertNull($this->site->getDescription());
        $this->assertNull($this->site->getId());
        $this->assertNull($this->site->getName());
        $this->assertNull($this->site->getOwner());
        $this->assertNull($this->site->getReason());
        $this->assertEquals(Site::EN_ATTENTE, $this->site->getStatus());
        $this->assertNull($this->site->getUpdated());
        $this->assertNull($this->site->getUrl());
        $this->assertNull($this->site->getValidated());
        $this->assertNull($this->site->getValidator());
        $this->assertFalse($this->site->isValidated());
        $this->assertTrue($this->site->getVotes() instanceof Collection);
        $this->assertEquals(0, $this->site->getVotes()->count());
    }

    /**
     * Tests Site->addVote() testRemoveVote() testGetVotes().
     */
    public function testAddVote()
    {
        $votes[0] = new Vote();
        $votes[1] = new Vote();
        $votes[2] = new Vote();

        $this->assertTrue($this->site->getVotes() instanceof Collection);
        $this->assertEquals(0, $this->site->getVotes()->count());

        $this->site->addVote($votes[0]);
        $this->assertEquals(1, $this->site->getVotes()->count());
        $this->assertTrue($this->site->getVotes()->contains($votes[0]));
        $this->assertFalse($this->site->getVotes()->contains($votes[1]));
        $this->assertFalse($this->site->getVotes()->contains($votes[2]));

        $this->site->addVote($votes[1]);
        $this->assertEquals(2, $this->site->getVotes()->count());
        $this->assertTrue($this->site->getVotes()->contains($votes[0]));
        $this->assertTrue($this->site->getVotes()->contains($votes[1]));
        $this->assertFalse($this->site->getVotes()->contains($votes[2]));

        $this->site->removeVote($votes[2]);
        $this->assertEquals(2, $this->site->getVotes()->count());
        $this->assertTrue($this->site->getVotes()->contains($votes[0]));
        $this->assertTrue($this->site->getVotes()->contains($votes[1]));
        $this->assertFalse($this->site->getVotes()->contains($votes[2]));

        $this->site->removeVote($votes[0]);
        $this->assertEquals(1, $this->site->getVotes()->count());
        $this->assertFalse($this->site->getVotes()->contains($votes[0]));
        $this->assertTrue($this->site->getVotes()->contains($votes[1]));
        $this->assertFalse($this->site->getVotes()->contains($votes[2]));
    }

    /**
     * Tests Site->addClassement() User->removeClassement() User->getClassements().
     */
    public function testAddClassement()
    {
        $classements[0] = new Classement();
        $classements[1] = new Classement();
        $classements[2] = new Classement();
        $this->assertTrue($this->site->getClassements() instanceof Collection);
        $this->assertEquals(0, $this->site->getClassements()->count());

        $this->site->addClassement($classements[0]);
        $this->assertEquals(1, $this->site->getClassements()->count());
        $this->assertTrue($this->site->getClassements()->contains($classements[0]));
        $this->assertFalse($this->site->getClassements()->contains($classements[1]));
        $this->assertFalse($this->site->getClassements()->contains($classements[2]));

        $this->site->addClassement($classements[1]);
        $this->assertEquals(2, $this->site->getClassements()->count());
        $this->assertTrue($this->site->getClassements()->contains($classements[0]));
        $this->assertTrue($this->site->getClassements()->contains($classements[1]));
        $this->assertFalse($this->site->getClassements()->contains($classements[2]));

        $this->site->removeClassement($classements[2]);
        $this->assertEquals(2, $this->site->getClassements()->count());
        $this->assertTrue($this->site->getClassements()->contains($classements[0]));
        $this->assertTrue($this->site->getClassements()->contains($classements[1]));
        $this->assertFalse($this->site->getClassements()->contains($classements[2]));

        $this->site->removeClassement($classements[0]);
        $this->assertEquals(1, $this->site->getClassements()->count());
        $this->assertFalse($this->site->getClassements()->contains($classements[0]));
        $this->assertTrue($this->site->getClassements()->contains($classements[1]));
        $this->assertFalse($this->site->getClassements()->contains($classements[2]));
    }

    /**
     * Tests classement->setDescription() classement->getDescription().
     */
    public function testSetDescription()
    {
        $description = 'description';
        $this->site->setDescription($description);
        $this->assertEquals($description, $this->site->getDescription());
    }

    /**
     * Tests classement->setName() classement->getName().
     */
    public function testSetName()
    {
        $name = 'name';
        $this->site->setName($name);
        $this->assertEquals($name, $this->site->getName());
    }

    /**
     * Tests classement->setStatus() classement->getStatus().
     */
    public function testSetStatus()
    {
        $this->site->setStatus(Site::ACCEPTE);
        $this->assertEquals(Site::ACCEPTE, $this->site->getStatus());
        $this->site->setStatus(Site::EN_ATTENTE);
        $this->assertEquals(Site::EN_ATTENTE, $this->site->getStatus());
        $this->site->setStatus(Site::REFUSE);
        $this->assertEquals(Site::REFUSE, $this->site->getStatus());
    }

    /**
     * Tests Site->setRaison() Site->getRaison().
     */
    public function testSetRaison()
    {
        $raison = 'raison';
        $this->site->setReason($raison);
        $this->assertEquals($raison, $this->site->getReason());
    }

    /**
     * Tests classement->setUrl() classement->getUrl().
     */
    public function testSetUrl()
    {
        $url = 'http://www.example.org';
        $this->site->setUrl($url);
        $this->assertEquals($url, $this->site->getUrl());
    }

    /**
     * Tests classement->setOwner() classement->getOwner().
     */
    public function testSetOwner()
    {
        $owner = new User();
        $this->site->setOwner($owner);
        $this->assertEquals($owner, $this->site->getOwner());
    }

    /**
     * Tests classement->setValidator() classement->getValidator().
     */
    public function testSetValidator()
    {
        $validator = new User();
        $this->site->setValidator($validator);
        $this->assertEquals($validator, $this->site->getValidator());
    }

    /**
     * Tests Classement->setCreated() Classement->getCreated().
     */
    public function testSetCreated()
    {
        $date = new \DateTime();
        $this->site->setCreated($date);
        $this->assertEquals($date, $this->site->getCreated());
    }

    /**
     * Tests Classement->setUpdated() Classement->getUpdated().
     */
    public function testSetUpdated()
    {
        $updated = new \DateTime();
        $this->site->setUpdated($updated);
        $this->assertEquals($updated, $this->site->getUpdated());
    }

    /**
     * Tests Classement->setValidated() Classement->getValidated() Classement->isValidated().
     */
    public function testSetValidated()
    {
        $validated = new \DateTime();
        $this->site->setValidated($validated);
        $this->assertTrue($this->site->isValidated());
        $this->assertEquals($validated, $this->site->getValidated());

        $this->site->setValidated(null);
        $this->assertFalse($this->site->isValidated());
        $this->assertNull($this->site->getValidated());
    }

    /**
     * Tests Classement->setCreatedValue().
     */
    public function testSetCreatedValue()
    {
        $this->assertNull($this->site->getCreated());
        $this->assertInstanceOf('AppBundle\Entity\Site', $this->site->setCreatedValue());
        $this->assertNotNull($this->site->getCreated());
        $this->assertTrue($this->site->getCreated() instanceof \DateTime);

        $date = new \DateTime();
        $date->sub(new \DateInterval('P5Y'));
        $this->site->setCreated($date);
        $this->assertEquals($date, $this->site->getCreated());
        $this->assertInstanceOf('AppBundle\Entity\Site', $this->site->setCreatedValue());
        $this->assertEquals($date, $this->site->getCreated());
    }

    /**
     * Tests Classement->setUpdatedValue().
     */
    public function testSetUpdatedValue()
    {
        $this->assertNull($this->site->getUpdated());
        $this->site->setUpdatedValue();
        $this->assertNotNull($this->site->getUpdated());
        $this->assertTrue($this->site->getUpdated() instanceof \DateTime);

        $date = new \DateTime();
        $date->sub(new \DateInterval('P5Y'));
        $this->site->setUpdated($date);
        $this->assertEquals($date, $this->site->getUpdated());
        $this->site->setUpdatedValue();
        $this->assertNotEquals($date, $this->site->getUpdated());
    }
}
