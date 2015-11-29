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

use AppBundle\Entity\Annuaire;
use AppBundle\Entity\Validation;
use Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Model Manager for Annuaire.
 *
 * @category ModelManager
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class AnnuaireManager
{
    /**
     * Object Manager.
     *
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * Repository of Annuaire Entity.
     *
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    protected $repository;

    /**
     * AnnuaireManager constructor.
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
     * Returns an empty annuaire instance.
     *
     * @return Annuaire
     */
    public function createAnnuaire()
    {
        return new Annuaire();
    }

    /**
     * Delete an annuaire instance.
     *
     * @param Annuaire $annuaire
     */
    public function deleteAnnuaire(Annuaire $annuaire)
    {
        $this->objectManager->remove($annuaire);
        $this->objectManager->flush();
    }

    /**
     * Validate an Annuaire.
     *
     * @param Annuaire    $annuaire
     * @param User        $user
     * @param string|null $reason
     */
    public function validateAnnuaire(Annuaire $annuaire, User $user, $reason = null)
    {
        $validation = $annuaire->getValidation();
        $validation->setValidator($user);
        $validation->setStatus(Validation::ACCEPTE);
        $validation->setReason($reason);
    }

    /**
     * Reject an Annuaire.
     *
     * @param Annuaire    $annuaire
     * @param User        $user
     * @param string|null $reason
     */
    public function rejectAnnuaire(Annuaire $annuaire, User $user, $reason = null)
    {
        $validation = $annuaire->getValidation();
        $validation->setValidator($user);
        $validation->setStatus(Validation::REFUSE);
        $validation->setReason($reason);
    }

    /**
     * Let waiting an Annuaire.
     *
     * @param Annuaire    $annuaire
     * @param User        $user
     * @param string|null $reason
     */
    public function stayWaitingAnnuaire(Annuaire $annuaire, User $user, $reason = null)
    {
        $validation = $annuaire->getValidation();
        $validation->setValidator($user);
        $validation->setStatus(Validation::EN_ATTENTE);
        $validation->setReason($reason);
    }

    /**
     * Reload an annuaire instance.
     *
     * @param Annuaire $annuaire
     */
    public function reloadAnnuaire(Annuaire $annuaire)
    {
        $this->objectManager->refresh($annuaire);
    }

    /**
     * Updates an annuaire.
     *
     * @param Annuaire $annuaire
     * @param Boolean  $andFlush Whether to flush the changes (default true)
     */
    public function updateAnnuaire(Annuaire $annuaire, $andFlush = true)
    {
        $this->objectManager->persist($annuaire->getValidation());
        $this->objectManager->persist($annuaire);
        if ($andFlush) {
            $this->objectManager->flush();
        }
    }
}
