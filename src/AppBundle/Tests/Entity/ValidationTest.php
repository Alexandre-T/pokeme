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
class ValidationTest extends \PHPUnit_Framework_TestCase
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
     * Test Validation->__construct().
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
     * Tests Validation->setReason() Validation->getReason().
     */
    public function testSetReason()
    {
        $expected = 'foo';
        $this->validation->setReason($expected);
        $this->assertEquals($expected, $this->validation->getReason());
    }

    /**
     * Tests Validation->setValidator() Validation->getValidator().
     */
    public function testSetValidator()
    {
        $expected = new User();
        $this->validation->setValidator($expected);
        $this->assertEquals($expected, $this->validation->getValidator());
    }

    /**
     * Tests Validation->setStatus() Validation->getStatus().
     */
    public function testSetStatus()
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
     * Tests Validation->setValidated() Validation->getValidated() Validation->isValidated().
     */
    public function testSetValidated()
    {
        $this->assertFalse($this->validation->isValidated());
        $this->assertNull($this->validation->getValidated());

        $validated = new \DateTime();
        $this->validation->setValidated($validated);
        $this->assertTrue($this->validation->isValidated());
        $this->assertEquals($validated, $this->validation->getValidated());
    }
}
