<?php

/**
 * This file is part of the PokeMe Application.
 *
 * PHP version 5
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category ModelManager
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2015 Alexandre Tranchant
 * @license   GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
namespace AppBundle\Model;

use AppBundle\Entity\Annuaire;
use AppBundle\Entity\Site;
use AppBundle\Entity\Vote;
use Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Model Manager for Vote.
 *
 * @category ModelManager
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class VoteManager
{
    /**
     * Object Manager.
     *
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * Repository of Vote Entity.
     *
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    protected $repository;

    /**
     * VoteManager constructor.
     *
     * @param ObjectManager $om
     * @param string        $class
     */
    public function __construct(ObjectManager $om, $class)
    {
        $this->objectManager = $om;
        $this->repository = $om->getRepository($class);
    }

    /**
     * Returns an empty vote instance.
     *
     * @return Vote
     */
    public function createVote()
    {
        return new Vote();
    }

    /**
     * Initialize Vote with required data.
     *
     * @param Vote     $vote
     * @param User     $user
     * @param Site     $site
     * @param Annuaire $annuaire
     * @param $tracker
     * @param $point
     *
     * @return Vote
     */
    public function initVote(Vote $vote, User $user, Site $site, Annuaire $annuaire, $tracker, $point)
    {
        if ($site->getAnnuaires()->contains($annuaire)) {
            $vote->setUser($user);
            $vote->setSite($site);
            $vote->setAnnuaire($annuaire);
            $vote->setTracker($tracker);
            $vote->setPoint($point);
        } else {
            //@todo Générer une exception !
        }

        return $vote;
    }

    /**
     * Delete an vote instance.
     *
     * @param Vote $vote
     */
    public function deleteVote(Vote $vote)
    {
        $this->objectManager->remove($vote);
        $this->objectManager->flush();
    }

    /**
     * Updates an vote.
     *
     * @param Vote    $vote
     * @param Boolean $andFlush Whether to flush the changes (default true)
     */
    public function updateVote(Vote $vote, $andFlush = true)
    {
        $this->objectManager->persist($vote);
        if ($andFlush) {
            $this->objectManager->flush();
        }
    }
}
