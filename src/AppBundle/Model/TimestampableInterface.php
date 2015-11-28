<?php
/**
 * This file is part of the PokeMe Application.
 *
 * PHP version 5
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category Interface
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2015 Alexandre Tranchant
 * @license   GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
namespace AppBundle\Model;

/**
 * Horodate Interface.
 *
 * @category Interface
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
interface TimestampableInterface
{
    /**
     * Get last update date time.
     *
     * @return \DateTime
     */
    public function getUpdated();

    /**
     * Get creation date time.
     *
     * @return \DateTime
     */
    public function getCreated();

    /**
     * Set creation date.
     *
     * @param \DateTime $created
     *
     * @return TimestampableInterface
     */
    public function setCreated(\DateTime $created);

    /**
     * Set last update.
     *
     * @param \DateTime $updated
     *
     * @return TimestampableInterface
     */
    public function setUpdated(\DateTime $updated);
}
