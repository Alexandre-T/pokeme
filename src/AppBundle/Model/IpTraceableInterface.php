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
interface IpTraceableInterface
{
    /**
     * Get IP of updater.
     *
     * @return string
     */
    public function getIpUpdater();

    /**
     * Get IP of Creator.
     *
     * @return string
     */
    public function getIpCreator();

    /**
     * Set creation date.
     *
     * @param string $created
     *
     * @return IpTraceableInterface
     */
    public function setIpUpdater($created);

    /**
     * Set last update.
     *
     * @param string $updated
     *
     * @return IpTraceableInterface
     */
    public function setIpCreator($updated);
}
