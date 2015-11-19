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
namespace Application\Sonata\ClassificationBundle\Tests\Entity;
use Application\Sonata\ClassificationBundle\Entity\Collection;
/**
 * Class CollectionTest.
 *
 * @category Testing
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Collection to test.
     *
     * @var Collection
     */
    private $collection;
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->collection = new Collection();
    }
    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->collection = null;
        parent::tearDown();
    }
    /**
     * Test that Id is null at the beginning.
     */
    public function testGetId()
    {
        $this->assertNull($this->collection->getId());
    }
}
