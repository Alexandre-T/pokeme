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

use Application\Sonata\ClassificationBundle\Entity\Context;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Application\Sonata\ClassificationBundle\Entity\Tag;

/**
 * Load test tag of PokeMe Application.
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
class LoadTagData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data to database.
     *
     * @param ObjectManager $em Doctrine entity manager
     */
    public function load(ObjectManager $em)
    {

        //Dictionary Cooking
        $mots = 'érotique,fantastique,contemporain,historique,futuriste,apocalyptique,avatars réels,avatar manga,city,université';
        $mots .= ',harry potter,ange,démon,vampire,lycanthrope';
        $mots = explode(',', $mots);
        natsort($mots);
        /** @var Context $context */
        $context = $this->getReference('site-context');

        foreach ($mots as $mot) {
            $tag = new Tag();
            $tag->setEnabled(true);
            $tag->setContext($context);
            $tag->setName($mot);
            $em->persist($tag);
            $this->addReference("tag-$mot", $tag);
        }
        unset($mots);
        $em->flush();
    }

    /**
     * Order of these data to be load.
     *
     * @return int
     */
    public function getOrder()
    {
        return 1; // After Context
    }
}
