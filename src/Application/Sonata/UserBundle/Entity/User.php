<?php
/**
 * This file is part of the PokeMe Application.
 *
 * PHP version 5
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category Entity
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2015 Alexandre Tranchant
 * @license   GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
namespace Application\Sonata\UserBundle\Entity;

use AppBundle\Entity\Annuaire;
use AppBundle\Entity\Site;
use AppBundle\Entity\Vote;
use Doctrine\Common\Collections\ArrayCollection;
use Sonata\UserBundle\Entity\BaseUser as BaseUser;

/**
 * User Entity.
 *
 * This file has been generated by the Sonata EasyExtends bundle ( http://sonata-project.org/bundles/easy-extends ).
 *
 * References :
 *   working with object : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/working-with-objects/en
 *
 *
 * @category Entity
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class User extends BaseUser
{
    /**
     * Identifiant.
     *
     * @var int
     */
    protected $id;

    /**
     * Annuaires owned by this user.
     *
     * @var ArrayCollection
     */
    private $ownedAnnuaires;

    /**
     * Sites owned by this user.
     *
     * @var ArrayCollection
     */
    private $ownedSites;

    /**
     * Votes done by this user.
     *
     * @var ArrayCollection
     */
    private $votes;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->ownedAnnuaires = new ArrayCollection();
        $this->ownedSites = new ArrayCollection();
        $this->votes = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add owned annuaire.
     *
     * @param Annuaire $ownedAnnuaire
     *
     * @return User
     */
    public function addOwnedAnnuaire(Annuaire $ownedAnnuaire)
    {
        $this->ownedAnnuaires[] = $ownedAnnuaire;

        return $this;
    }

    /**
     * Remove owned annuaire.
     *
     * @param Annuaire $ownedAnnuaire
     */
    public function removeOwnedAnnuaire(Annuaire $ownedAnnuaire)
    {
        $this->ownedAnnuaires->removeElement($ownedAnnuaire);
    }

    /**
     * Get owned annuaires.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOwnedAnnuaires()
    {
        return $this->ownedAnnuaires;
    }

    /**
     * Add owned site.
     *
     * @param Site $ownedSite
     *
     * @return User
     */
    public function addOwnedSite(Site $ownedSite)
    {
        $this->ownedSites[] = $ownedSite;

        return $this;
    }

    /**
     * Remove owned site.
     *
     * @param Site $ownedSite
     */
    public function removeOwnedSite(Site $ownedSite)
    {
        $this->ownedSites->removeElement($ownedSite);
    }

    /**
     * Get owned sites.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOwnedSites()
    {
        return $this->ownedSites;
    }

    /**
     * Add vote.
     *
     * @param Vote $vote
     *
     * @return User
     */
    public function addVote(Vote $vote)
    {
        $this->votes[] = $vote;

        return $this;
    }

    /**
     * Remove vote.
     *
     * @param Vote $vote
     */
    public function removeVote(Vote $vote)
    {
        $this->votes->removeElement($vote);
    }

    /**
     * Get votes.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVotes()
    {
        return $this->votes;
    }
}
