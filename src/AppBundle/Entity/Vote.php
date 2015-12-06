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

use AppBundle\Model\IpTraceableInterface;
use AppBundle\Model\TimestampableInterface;
use Application\Sonata\UserBundle\Entity\User;

/**
 * Vote Entity.
 *
 * @category Entity
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class Vote extends AbstractEntity implements TimestampableInterface, IpTraceableInterface
{
    /**
     * Identifier.
     *
     * @var int
     */
    private $id;

    /**
     * Annuaire of this vote.
     *
     * @var Annuaire
     */
    private $annuaire;

    /**
     * Voter.
     *
     * @var User
     */
    private $user;

    /**
     * Site of this vote.
     *
     * @var Site
     */
    private $site;

    /**
     * Tracker to find real owner and detect bot.
     *
     * @var string
     */
    private $tracker;

    /**
     * Points given by this vote.
     *
     * @var int
     */
    private $point;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user.
     *
     * @param User $user
     *
     * @return Vote
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set site.
     *
     * @param Site $site
     *
     * @return Vote
     */
    public function setSite(Site $site = null)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site.
     *
     * @return Site
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set annuaire.
     *
     * @param Annuaire $annuaire
     *
     * @return Vote
     */
    public function setAnnuaire(Annuaire $annuaire = null)
    {
        $this->annuaire = $annuaire;

        return $this;
    }

    /**
     * Get annuaire.
     *
     * @return Annuaire
     */
    public function getAnnuaire()
    {
        return $this->annuaire;
    }

    /**
     * Set tracker.
     *
     * @param string
     *
     * @return Vote
     */
    public function setTracker($tracker)
    {
        $this->tracker = $tracker;

        return $this;
    }

    /**
     * Get tracker.
     *
     * @return string
     */
    public function getTracker()
    {
        return $this->tracker;
    }

    /**
     * Return the number of points given by this vote.
     *
     * @return int
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * Set Point for this vote.
     *
     * @param mixed $point
     *
     * @return Vote
     */
    public function setPoint($point)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * Return the name of the site.
     *
     * @return string
     */
    public function __toString()
    {
        return 'Vote '.$this->getId();
    }
}
