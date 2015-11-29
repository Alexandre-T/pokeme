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

use AppBundle\Entity\Validation;
use Application\Sonata\UserBundle\Entity\User;

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
class ValidationTest extends AbstractEntityTest
{
    /**
     * Validation entity class to Test.
     *
     * @var Validation
     */
    private $validation;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->validation = new Validation();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->validation = null;

        parent::tearDown();
    }

    /**
     * Test constructor of Validation Entity.
     */
    public function testConstruct()
    {
        $this->assertNull($this->validation->getId());
        $this->assertNull($this->validation->getReason());
        $this->assertEquals(Validation::EN_ATTENTE, $this->validation->getStatus());
        $this->assertNull($this->validation->getValidated());
        $this->assertNull($this->validation->getValidator());
        $this->assertFalse($this->validation->isValidated());
        $this->assertFalse($this->validation->isEnabled());
        $this->assertTrue($this->validation->isWaiting());
        $this->assertFalse($this->validation->isRejected());
    }

    /**
     * Test getter and setter of reason property.
     *
     * @covers AppBundle\Entity\Validation::setReason()
     * @covers AppBundle\Entity\Validation::getReason()
     */
    public function testSetReason()
    {
        $expected = 'foo';
        $this->validation->setReason($expected);
        $this->assertEquals($expected, $this->validation->getReason());
    }

    /**
     * Test getter and setter of validator property.
     *
     * @covers AppBundle\Entity\Validation::setValidator()
     * @covers AppBundle\Entity\Validation::getValidator()
     */
    public function testSetValidator()
    {
        $expected = new User();
        $this->validation->setValidator($expected);
        $this->assertEquals($expected, $this->validation->getValidator());
    }

    /**
     * Test getter and setter of status property.
     *
     * @covers AppBundle\Entity\Validation::setStatus()
     * @covers AppBundle\Entity\Validation::getStatus()
     */
    public function testStatus()
    {
        $this->validation->setStatus(Validation::ACCEPTE);
        $this->assertEquals(Validation::ACCEPTE, $this->validation->getStatus());
        $this->assertTrue($this->validation->isEnabled());
        $this->assertFalse($this->validation->isWaiting());
        $this->assertFalse($this->validation->isRejected());
        $this->validation->setStatus(Validation::EN_ATTENTE);
        $this->assertEquals(Validation::EN_ATTENTE, $this->validation->getStatus());
        $this->assertFalse($this->validation->isEnabled());
        $this->assertTrue($this->validation->isWaiting());
        $this->assertFalse($this->validation->isRejected());
        $this->validation->setStatus(Validation::REFUSE);
        $this->assertEquals(Validation::REFUSE, $this->validation->getStatus());
        $this->assertFalse($this->validation->isEnabled());
        $this->assertFalse($this->validation->isWaiting());
        $this->assertTrue($this->validation->isRejected());
    }

    /**
     * Test getter and setter of validated property.
     *
     * @covers AppBundle\Entity\Validation::setValidated()
     * @covers AppBundle\Entity\Validation::getValidated()
     * @covers AppBundle\Entity\Validation::isValidated()
     */
    public function testValidated()
    {
        $this->assertFalse($this->validation->isValidated());
        $this->assertNull($this->validation->getValidated());

        $validated = new \DateTime();
        $this->validation->setValidated($validated);
        $this->assertTrue($this->validation->isValidated());
        $this->assertEquals($validated, $this->validation->getValidated());
    }
}
