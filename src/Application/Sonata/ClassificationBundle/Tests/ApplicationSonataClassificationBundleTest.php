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
namespace Application\Sonata\ClassificationBundle\Tests;

use Application\Sonata\ClassificationBundle\ApplicationSonataClassificationBundle;

/**
 * Class ApplicationSonataClassificationBundleTest.
 *
 * @category Testing
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class ApplicationSonataClassificationBundleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * ApplicationSonataClassificationBundle instance to test.
     *
     * @var ApplicationSonataClassificationBundle
     */
    private $applicationSonataClassificationBundle;
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->applicationSonataClassificationBundle = new ApplicationSonataClassificationBundle();
    }
    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->applicationSonataClassificationBundle = null;
        parent::tearDown();
    }
    /**
     * Tests that the parent is well declared.
     */
    public function testGetParent()
    {
        $this->assertEquals('SonataClassificationBundle', $this->applicationSonataClassificationBundle->getParent());
    }
}
