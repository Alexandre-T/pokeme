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
use AppBundle\Entity\Validation;
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
class SiteManager implements SiteManagerInterface
{
    /**
     * Object Manager.
     *
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * Repository of Site Entity.
     *
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    protected $repository;

    /**
     * SiteManager constructor.
     *
     * @param ObjectManager $om
     * @param string        $class
     */
    public function __construct(ObjectManager $om, $class)
    {
        $this->objectManager = $om;
        $this->repository = $om->getRepository($class);
    }

    /**
     * Returns an empty site instance.
     *
     * @return Site
     */
    public function createSite()
    {
        return new Site();
    }

    /**
     * Delete an site instance.
     *
     * @param Site $site
     */
    public function deleteSite(Site $site)
    {
        $this->objectManager->remove($site);
        $this->objectManager->flush();
    }

    /**
     * Validate an Site.
     *
     * @param Site        $site
     * @param User        $user
     * @param string|null $reason
     */
    public function validateSite(Site $site, User $user, $reason = null)
    {
        $validation = $site->getValidation();
        $validation->setValidator($user);
        $validation->setStatus(Validation::ACCEPTE);
        $validation->setReason($reason);
    }

    /**
     * Reject an Site.
     *
     * @param Site        $site
     * @param User        $user
     * @param string|null $reason
     */
    public function rejectSite(Site $site, User $user, $reason = null)
    {
        $validation = $site->getValidation();
        $validation->setValidator($user);
        $validation->setStatus(Validation::REFUSE);
        $validation->setReason($reason);
    }

    /**
     * Let waiting an Site.
     *
     * @param Site        $site
     * @param User        $user
     * @param string|null $reason
     */
    public function stayWaitingSite(Site $site, User $user, $reason = null)
    {
        $validation = $site->getValidation();
        $validation->setValidator($user);
        $validation->setStatus(Validation::EN_ATTENTE);
        $validation->setReason($reason);
    }

    /**
     * Reload an site instance.
     *
     * @param Site $site
     */
    public function reloadSite(Site $site)
    {
        $this->objectManager->refresh($site);
    }

    /**
     * Updates an site.
     *
     * @param Site    $site
     * @param Boolean $andFlush Whether to flush the changes (default true)
     */
    public function updateSite(Site $site, $andFlush = true)
    {
        $this->objectManager->persist($site->getValidation());
        $this->objectManager->persist($site);
        if ($andFlush) {
            $this->objectManager->flush();
        }
    }
}
