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
    protected $objectManager;
    protected $class;
    protected $repository;

    public function __construct(ObjectManager $om, $class)
    {
        $this->objectManager = $om;
        $this->repository = $om->getRepository($class);

        $metadata = $om->getClassMetadata($class);
        $this->class = $metadata->getName();
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
