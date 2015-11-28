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

/**
 * Abstract Entity.
 *
 * @category Entity
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
abstract class AbstractEntity implements TimestampableInterface, IpTraceableInterface
{
    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var \DateTime
     */
    protected $updated;

    /**
     * @var string
     */
    protected $ipCreator;

    /**
     * @var string
     */
    protected $ipUpdater;

    /**
     * Set created.
     *
     * @param \DateTime $created
     *
     * @return AbstractEntity
     */
    public function setCreated(\Datetime $created)
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
     * Set updated.
     *
     * @param \DateTime $updated
     *
     * @return AbstractEntity
     */
    public function setUpdated(\DateTime $updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated.
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Get IP of creator.
     *
     * @return string
     */
    public function getIpCreator()
    {
        return $this->ipCreator;
    }

    /**
     * Set Ip of creator.
     *
     * @param string $ipCreator
     *
     * @return AbstractOwned
     */
    public function setIpCreator($ipCreator)
    {
        $this->ipCreator = $ipCreator;

        return $this;
    }

    /**
     * Get IP of updater.
     *
     * @return string
     */
    public function getIpUpdater()
    {
        return $this->ipUpdater;
    }

    /**
     * Set IP of updater.
     *
     * @param string $ipUpdater
     *
     * @return AbstractOwned
     */
    public function setIpUpdater($ipUpdater)
    {
        $this->ipUpdater = $ipUpdater;

        return $this;
    }
}
