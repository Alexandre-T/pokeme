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
use Application\Sonata\ClassificationBundle\Entity\Tag;
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
    private $tag;
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->tag = new Tag();
    }
    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->tag = null;
        parent::tearDown();
    }
    /**
     * Test that Id is null at the beginning.
     */
    public function testGetId()
    {
        $this->assertNull($this->tag->getId());
    }
}
