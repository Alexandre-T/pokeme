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
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Site Entity.
 *
 * @category Entity
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class Site extends AbstractOwned
{

    /**
     * @var ArrayCollection
     */
    private $votes;

    /**
     * @var ArrayCollection
     */
    private $classements;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->votes = new ArrayCollection();
        $this->classements = new ArrayCollection();
    }

    /**
     * Add vote.
     *
     * @param Vote $vote
     *
     * @return Site
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
     * @return ArrayCollection
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * Add classement.
     *
     * @param Classement $classement
     *
     * @return Site
     */
    public function addClassement(Classement $classement)
    {
        $this->classements[] = $classement;

        return $this;
    }

    /**
     * Remove classement.
     *
     * @param Classement $classement
     */
    public function removeClassement(Classement $classement)
    {
        $this->classements->removeElement($classement);
    }

    /**
     * Get classements.
     *
     * @return ArrayCollection
     */
    public function getClassements()
    {
        return $this->classements;
    }

}
