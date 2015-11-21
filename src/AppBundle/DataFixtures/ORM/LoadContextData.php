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
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Application\Sonata\ClassificationBundle\Entity\Context;

/**
 * Load production Context data of PokeMe Application.
 *
 * @category LoadDataFixture
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 *
 * @codeCoverageIgnore
 */
class LoadContextData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data to database.
     *
     * @param ObjectManager $em Doctrine entity manager
     */
    public function load(ObjectManager $em)
    {
        $defaultContext = new Context();
        $defaultContext->setId('default');
        $defaultContext->setEnabled(true);
        $defaultContext->setName('Classement');
        $em->persist($defaultContext);

        $siteContext = new Context();
        $siteContext->setId('site');
        $siteContext->setEnabled(true);
        $siteContext->setName('Site');
        $em->persist($siteContext);

        $em->flush();

        $this->addReference('default-context', $defaultContext);
        $this->addReference('site-context', $siteContext);
    }

    /**
     * Order of these data to be load.
     *
     * @return int
     */
    public function getOrder()
    {
        return 0; // the order in which fixtures will be loaded
    }
}
