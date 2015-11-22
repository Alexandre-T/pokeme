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
class Vote
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var Classement
     */
    private $classement;

    /**
     * @var int
     */
    private $ip;

    /**
     * @var User
     */
    private $user;

    /**
     * @var Site
     */
    private $site;

    /**
     * @var string
     */
    private $tracker;

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
     * Set created.
     *
     * @param \DateTime $created
     *
     * @return Vote
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created.
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
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
     * Set classement.
     *
     * @param Classement $classement
     *
     * @return Vote
     */
    public function setClassement(Classement $classement = null)
    {
        $this->classement = $classement;

        return $this;
    }

    /**
     * Get classement.
     *
     * @return Classement
     */
    public function getClassement()
    {
        return $this->classement;
    }

    /**
     * Initialize Creation Date.
     *
     * @return Site
     */
    public function setCreatedValue()
    {
        if (!$this->getCreated()) {
            $this->created = new \DateTime();
        }

        return $this;
    }

    /**
     * Set ip.
     *
     * @param int
     *
     * @return Vote
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip.
     *
     * @return int
     */
    public function getIp()
    {
        return $this->ip;
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
}
