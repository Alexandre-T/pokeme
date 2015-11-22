<?php
/**
 * This file is part of the PokeMe Application.
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @author      Alexandre Tranchant
 * @copyright   2015 Alexandre Tranchant
 * @license     GNU General Public License, version 3
 * @license     http://opensource.org/licenses/GPL-3.0
 */
namespace Application\Sonata\UserBundle\Tests;

use Application\Sonata\UserBundle\ApplicationSonataUserBundle;

/**
 * Bundle Class Tests.
 *
 * @category Testing
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class ApplicationSonataUserBundleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ApplicationSonataUserBundle
     */
    private $applicationSonataUserBundle;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->applicationSonataUserBundle = new ApplicationSonataUserBundle();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->applicationSonataUserBundle = null;
        parent::tearDown();
    }

    /**
     * Test getParent method.
     */
    public function testGetParent()
    {
        $this->assertEquals('SonataUserBundle', $this->applicationSonataUserBundle->getParent());
    }
}
