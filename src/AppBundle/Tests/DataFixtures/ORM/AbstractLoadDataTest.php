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
namespace AppBundle\Tests\DataFixtures\ORM;

use AppBundle\DataFixtures\ORM\AbstractLoadData;

/**
 * Tests of Abstract Class AbstractLoadData.
 *
 * @category Testing
 *
 * @author   Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license  GNU General Public License, version 3
 *
 * @link     http://opensource.org/licenses/GPL-3.0
 */
class AbstractLoadDataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Abstract class to Test.
     *
     * @var AbstractLoadData
     */
    private $abstractLoadData;

    /**
     * Test setter of property container.
     *
     * @covers AppBundle\DataFixtures\ORM\AbstractLoadData::setContainer()
     */
    public function testSetContainer()
    {
        $container = $this->getMockBuilder('Symfony\Component\DependencyInjection\ContainerInterface')
            ->disableOriginalConstructor()
            ->getMock();
        $this->abstractLoadData->setContainer($container);
        $this->assertEquals($container, \PHPUnit_Framework_Assert::readAttribute($this->abstractLoadData, 'container'));
    }

    /**
     * Test randTrueFalse Method.
     *
     * @covers AppBundle\DataFixtures\ORM\AbstractLoadData::randTrueFalse
     */
    public function testRandTrueFalse()
    {
        $randTrueFalse = self::getMethod('randTrueFalse');

        $this->assertFalse($randTrueFalse->invokeArgs($this->abstractLoadData, array(0)));
        $this->assertTrue($randTrueFalse->invokeArgs($this->abstractLoadData, array(101)));
        $this->assertThat($randTrueFalse->invokeArgs($this->abstractLoadData, array(25)), $this->isType('boolean'));
        $this->assertThat($randTrueFalse->invokeArgs($this->abstractLoadData, array(50)), $this->isType('boolean'));
        $this->assertThat($randTrueFalse->invokeArgs($this->abstractLoadData, array(75)), $this->isType('boolean'));
    }

    /**
     * Test method isEnvironment with array and comma separated words.
     *
     * @covers AppBundle\DataFixtures\ORM\AbstractLoadData::isEnvironment
     */
    public function testIsEnvironment()
    {
        $kernel = $this->getMock('Symfony\Component\HttpKernel\KernelInterface');
        $kernel->expects($this->any())
            ->method('getEnvironment')
            ->willReturn('expected');
        $container = $this->getMockForAbstractClass('Symfony\Component\DependencyInjection\ContainerInterface');
        $badContainer = $this->getMockForAbstractClass('Symfony\Component\DependencyInjection\ContainerInterface');

        $container->expects($this->any())
            ->method('get')
            ->willReturn($kernel);
        $badContainer->expects($this->any())
            ->method('get')
            ->willReturn(false);

        $this->abstractLoadData->setContainer($container);
        $isEnvironment = self::getMethod('isEnvironment');

        $this->assertFalse($isEnvironment->invokeArgs($this->abstractLoadData, array(array('foo', 'bar'))));
        $this->assertTrue($isEnvironment->invokeArgs($this->abstractLoadData, array(array('foo', 'expected'))));
        $this->assertFalse($isEnvironment->invokeArgs($this->abstractLoadData, array('foo')));
        $this->assertTrue($isEnvironment->invokeArgs($this->abstractLoadData, array('expected')));

        $this->abstractLoadData->setContainer($badContainer);
        $this->assertFalse($isEnvironment->invokeArgs($this->abstractLoadData, array(array('foo', 'bar'))));
        $this->assertFalse($isEnvironment->invokeArgs($this->abstractLoadData, array(array('foo', 'expected'))));
        $this->assertFalse($isEnvironment->invokeArgs($this->abstractLoadData, array('foo')));
        $this->assertFalse($isEnvironment->invokeArgs($this->abstractLoadData, array('expected')));
    }

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->abstractLoadData = $this->getMockForAbstractClass('AppBundle\DataFixtures\ORM\AbstractLoadData');
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->abstractLoadData = null;

        parent::tearDown();
    }

    /**
     * Set Accessible specified protected or private method.
     *
     * @param $name
     *
     * @return mixed
     */
    protected static function getMethod($name)
    {
        $class = new \ReflectionClass('AppBundle\DataFixtures\ORM\AbstractLoadData');
        $method = $class->getMethod($name);
        $method->setAccessible(true);

        return $method;
    }
}
