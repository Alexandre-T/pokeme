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

use AppBundle\Entity\Site;
use AppBundle\Model\SiteManager;
use Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Sonata\ClassificationBundle\Model\Tag;

/**
 * Load development and test Site data of PokeMe Application.
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
class LoadSiteData extends AbstractLoadData implements OrderedFixtureInterface
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

            /** @var SiteManager $SiteManager */
            $siteManager = $this->container->get('app.site_manager');
            for ($i = 1; $i < 240; ++$i) {
                /** @var User $user1 */
                $user = $this->getReference('user-member-'.($i % 24 + 1));
                $admin = $this->getReference('user-administrator-'.($i % 24 + LoadSonataUserData::MEMBERS));
                /** @var Site $site */
                $site = $siteManager->createSite();
                $site->setName("Site numéro $i");
                $site->setDescription("Description de l'Site numéro $i");
                $site->setIpCreator("127.0.0.$i");
                $site->setIpUpdater("127.0.1.$i");
                $site->setUrl("http://www.site$i.example.org");
                $site->setOwner($user);
                if ($i < 10) {
                    $site->addTag($tagApocalyptique);
                    $siteManager->validateSite($site, $admin, 'validation par LoadSiteData');
                }
                if ($i < 5) {
                    $site->addTag($tagHistorique);
                    $siteManager->rejectSite($site, $admin, 'refus par LoadSiteData');
                }
                if ($i > 15) {
                    $site->addTag($tagFuturiste);
                    $siteManager->stayWaitingSite($site, $admin, 'attente par LoadSiteData');
                }
                if ($i > 5 && $i < 15) {
                    $site->addTag($tagContemporain);
                }
                $site->addAnnuaire($this->getReference('annuaire-'.($i % 24 + 1)));
                $site->addAnnuaire($this->getReference('annuaire-'.($i % 24 + 2)));

                $siteManager->updateSite($site);
                $this->addReference("site-$i", $site);
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
        return 3; // After User Tag Annuaire
    }
}
