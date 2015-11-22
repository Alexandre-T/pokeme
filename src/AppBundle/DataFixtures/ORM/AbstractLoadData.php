<?php
/**
 * This file is part of the PokeMe Application.
 *
 * PHP version 5
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category LoadDataFixture
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2015 Alexandre Tranchant
 * @license   GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * AbstractLoadData can retrieve environment data like a proxy to
 * retrieve some autogenerated text from the web.
 *
 * @category LoadDataFixture
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
abstract class AbstractLoadData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * The Container.
     *
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    /**
     * Set Container to retrieve Environment data.
     *
     * @param ContainerInterface $container Container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Return true or false.
     *
     * @param int $chance Chance in percent to obtain true
     *
     * @return bool
     */
    protected function randTrueFalse($chance = 50)
    {
        return (rand(1, 100) <= $chance);
    }

    /**
     * Are we in some environment ?
     *
     * @param array|string $environments Array, string or coma separated string
     *
     * @return bool
     */
    protected function isEnvironment($environments)
    {
        if (!is_array($environments)) {
            $environments = explode(',', $environments);
        }

        $kernel = $this->container->get('kernel');
        if ($kernel instanceof KernelInterface) {
            return in_array($kernel->getEnvironment(), $environments);
        }

        return false;
    }
}
