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

use AppBundle\Model\ValidationInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Sonata\ClassificationBundle\Model\Tag;

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
class Site extends AbstractOwned implements ValidationInterface
{
    /**
     * Votes for this site.
     *
     * @var ArrayCollection
     */
    private $votes;

    /**
     * Annuaire where this site is referenced.
     *
     * @var ArrayCollection
     */
    private $annuaires;

    /**
     * Tags of this site.
     *
     * @var ArrayCollection
     */
    private $tags;

    /**
     * Validation status of this site.
     *
     * @var Validation
     */
    private $validation;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->votes = new ArrayCollection();
        $this->annuaires = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->validation = new Validation();
    }

    /**
     * Getter Validation.
     *
     * @return Validation
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * Set Validation.
     *
     * @param Validation $validation
     *
     * @return Site
     */
    public function setValidation(Validation $validation)
    {
        $this->validation = $validation;

        return $this;
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
     * Add annuaire.
     *
     * @param Annuaire $annuaire
     *
     * @return Site
     */
    public function addAnnuaire(Annuaire $annuaire)
    {
        $this->annuaires[] = $annuaire;

        return $this;
    }

    /**
     * Remove annuaire.
     *
     * @param Annuaire $annuaire
     */
    public function removeAnnuaire(Annuaire $annuaire)
    {
        $this->annuaires->removeElement($annuaire);
    }

    /**
     * Get annuaires.
     *
     * @return ArrayCollection
     */
    public function getAnnuaires()
    {
        return $this->annuaires;
    }

    /**
     * Add tag.
     *
     * @param Tag $tag
     *
     * @return Site
     */
    public function addTag(Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag.
     *
     * @param Tag $tag
     */
    public function removeTag(Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags.
     *
     * @return ArrayCollection
     */
    public function getTags()
    {
        return $this->tags;
    }
}
