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
use AppBundle\Entity\Site;
use AppBundle\Entity\Vote;
use AppBundle\Model\VoteManager;
use Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

/**
 * Load development and test Vote data of PokeMe Application.
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
class LoadVoteData extends AbstractLoadData implements OrderedFixtureInterface
{
    /**
     * Load data to database.
     *
     * @param ObjectManager $em Doctrine entity manager
     */
    public function load(ObjectManager $em)
    {
        if ($this->isEnvironment(array('test', 'dev'))) {

            /* @var VoteManager $VoteManager */
            $voteManager = $this->container->get('app.vote_manager');
            $ip = ip2long('127.0.0.1');
            for ($i = 1; $i < 500; ++$i) {
                /** @var User $user */
                $user = $this->getReference('user-member-'.rand(1, 249));
                /* @var Site $site */
                $number = rand(1, 239);
                $site = $this->getReference("site-$number");
                /** @var Annuaire $annuaire */
                $annuaire = $this->getReference('annuaire-'.($number % 24 + rand(1, 2)));
                /** @var Vote $vote */
                $vote = $voteManager->createVote();
                $tracker = uniqid();
                $vote = $voteManager->initVote($vote, $user, $site, $annuaire, $tracker, rand(1, 3));
                $vote->setIpCreator(long2ip($ip + $i));
                $voteManager->updateVote($vote);
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
        return 4; // After User Tag Annuaire Site
    }
}
