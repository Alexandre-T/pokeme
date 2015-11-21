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
namespace Application\Sonata\MediaBundle\Tests;
use Application\Sonata\MediaBundle\ApplicationSonataMediaBundle;
/**
 * Class ApplicationSonataMediaBundleTest.
 *
 * @category Testing
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class ApplicationMediaBundleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * ApplicationSonataMediaBundle instance to test.
     *
     * @var ApplicationSonataMediaBundle
     */
    private $applicationSonataMediaBundle;
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->applicationSonataMediaBundle = new ApplicationSonataMediaBundle();
    }
    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->applicationSonataMediaBundle = null;
        parent::tearDown();
    }
    /**
     * Tests that the parent is well declared.
     */
    public function testGetParent()
    {
        $this->assertEquals('SonataMediaBundle', $this->applicationSonataMediaBundle->getParent());
    }
}
