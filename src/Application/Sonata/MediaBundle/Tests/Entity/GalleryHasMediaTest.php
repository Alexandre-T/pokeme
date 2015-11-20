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
namespace Application\Sonata\MediaBundle\Tests\Entity;
use Application\Sonata\MediaBundle\Entity\GalleryHasMedia;
/**
 * Class GalleryHasMediaTest.
 *
 * @category Testing
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class GalleryHasMediaTest extends \PHPUnit_Framework_TestCase
{
    /**
     * GalleryHasMedia to test.
     *
     * @var GalleryHasMedia
     */
    private $galleryHasMedia;
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->galleryHasMedia = new GalleryHasMedia();
    }
    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->galleryHasMedia = null;
        parent::tearDown();
    }
    /**
     * Test that Id is null at the beginning.
     */
    public function testGetId()
    {
        $this->assertNull($this->galleryHasMedia->getId());
    }
}
