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
use Sonata\ClassificationBundle\Model\Tag;

/**
 * Annuaire Entity.
 *
 * @category Entity
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class Annuaire extends AbstractOwned
{
    /**
     * @var ArrayCollection
     */
    private $votes;

    /**
     * @var ArrayCollection
     */
    private $sites;

    /**
     * @var ArrayCollection
     */
    private $tags;

    /**
     * @var Validation
     */
    private $validation;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->votes = new ArrayCollection();
        $this->sites = new ArrayCollection();
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
     * @return Annuaire
     */
    public function setValidation($validation)
    {
        $this->validation = $validation;

        return $this;
    }

    /**
     * Add vote.
     *
     * @param Vote $vote
     *
     * @return Annuaire
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
     * Add site.
     *
     * @param Site $site
     *
     * @return Annuaire
     */
    public function addSite(Site $site)
    {
        $this->sites[] = $site;

        return $this;
    }

    /**
     * Remove site.
     *
     * @param Site $site
     */
    public function removeSite(Site $site)
    {
        $this->sites->removeElement($site);
    }

    /**
     * Get sites.
     *
     * @return ArrayCollection
     */
    public function getSites()
    {
        return $this->sites;
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
