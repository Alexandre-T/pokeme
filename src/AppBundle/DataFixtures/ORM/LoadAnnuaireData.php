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

use AppBundle\Entity\Annuaire;
use AppBundle\Model\AnnuaireManager;
use Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Sonata\ClassificationBundle\Model\Tag;

/**
 * Load development and test Annuaire data of PokeMe Application.
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
class LoadAnnuaireData extends AbstractLoadData implements OrderedFixtureInterface
{
    /**
     * Load data to database.
     *
     * @param ObjectManager $em Doctrine entity manager
     */
    public function load(ObjectManager $em)
    {
        if ($this->isEnvironment(array('test', 'dev'))) {
            /** @var Tag $tagHistorique */
            $tagHistorique = $this->getReference('tag-historique');
            /** @var Tag $tagContemporain */
            $tagContemporain = $this->getReference('tag-contemporain');
            /** @var Tag $tagFuturiste */
            $tagFuturiste = $this->getReference('tag-futuriste');
            /** @var Tag $tagApocalyptique */
            $tagApocalyptique = $this->getReference('tag-apocalyptique');

            /** @var AnnuaireManager $annuaireManager */
            $annuaireManager = $this->container->get('app.annuaire_manager');
            for ($i = 1; $i < 25; ++$i) {
                /** @var User $user1 */
                $user = $this->getReference("user-member-$i");
                /** @var Annuaire $annuaire */
                $annuaire = $annuaireManager->createAnnuaire();
                $annuaire->setName("Annuaire numéro $i");
                $annuaire->setIpCreator("127.0.0.$i");
                $annuaire->setIpUpdater("127.0.1.$i");
                $annuaire->setUrl("http://www.annuaire$i.example.org");
                $annuaire->setOwner($user);
                if ($i < 10) {
                    $annuaire->addTag($tagApocalyptique);
                }
                if ($i < 5) {
                    $annuaire->addTag($tagHistorique);
                }
                if ($i > 15) {
                    $annuaire->addTag($tagFuturiste);
                }
                if ($i > 5 && $i < 15) {
                    $annuaire->addTag($tagContemporain);
                }

                $annuaireManager->updateAnnuaire($annuaire);
                $this->addReference("annuaire-$i", $annuaire);
            }
        }
    }

    /**
     * Order of these data to be load.
     *
     * @return int
     */
    public function getOrder()
    {
        return 2; // After User and Tag
    }
}
