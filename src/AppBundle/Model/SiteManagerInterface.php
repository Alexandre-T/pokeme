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

use AppBundle\Entity\Site;
use Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Model Manager for Site.
 *
 * @category ModelManager
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
interface SiteManagerInterface
{
    /**
     * SiteManager constructor.
     *
     * @param ObjectManager $om
     * @param string        $class
     */
    public function __construct(ObjectManager $om, $class);

    /**
     * Returns an empty site instance.
     *
     * @return Site
     */
    public function createSite();

    /**
     * Delete an site instance.
     *
     * @param Site $site
     */
    public function deleteSite(Site $site);

    /**
     * Validate an Site.
     *
     * @param Site        $site
     * @param User        $user
     * @param string|null $reason
     */
    public function validateSite(Site $site, User $user, $reason = null);

    /**
     * Reject an Site.
     *
     * @param Site        $site
     * @param User        $user
     * @param string|null $reason
     */
    public function rejectSite(Site $site, User $user, $reason = null);

    /**
     * Let waiting an Site.
     *
     * @param Site        $site
     * @param User        $user
     * @param string|null $reason
     */
    public function stayWaitingSite(Site $site, User $user, $reason = null);

    /**
     * Reload an site instance.
     *
     * @param Site $site
     */
    public function reloadSite(Site $site);

    /**
     * Updates an site.
     *
     * @param Site    $site
     * @param Boolean $andFlush Whether to flush the changes (default true)
     */
    public function updateSite(Site $site, $andFlush = true);
}
