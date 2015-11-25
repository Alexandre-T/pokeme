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

use AppBundle\Model\HorodateInterface;
use Application\Sonata\UserBundle\Entity\User;

/**
 * Validation Entity.
 *
 * @category Entity
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class Validation extends AbstractEntity implements HorodateInterface
{
    /**
     * Statut accepté.
     *
     * @var int
     */
    const ACCEPTE = 1;
    /**
     * Statut mis en attente par défaut.
     *
     * @var int
     */
    const EN_ATTENTE = 2;

    /**
     * Statut refusé.
     *
     * @var int
     */
    const REFUSE = 3;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $reason;

    /**
     * @var int
     */
    private $status = self::EN_ATTENTE;

    /**
     * @var User
     */
    private $validator;

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
     * Set statut.
     *
     * @param int $status
     *
     * @return Validation
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get statut.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set validator.
     *
     * @param User $validator
     *
     * @return Validation
     */
    public function setValidator(User $validator = null)
    {
        $this->validator = $validator;

        return $this;
    }

    /**
     * Get validator.
     *
     * @return User
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * Set raison.
     *
     * @param string $reason
     *
     * @return Validation
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Get raison.
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set validated.
     *
     * @alias setUpdated
     *
     * @param \DateTime $updated
     *
     * @return Validation
     */
    public function setValidated(\DateTime $updated)
    {
        return $this->setUpdated($updated);
    }

    /**
     * Get validated.
     *
     * @alias getUpdated
     *
     * @return \DateTime
     */
    public function getValidated()
    {
        return $this->getUpdated();
    }

    /**
     * Is validated.
     *
     * @return bool
     */
    public function isValidated()
    {
        return !is_null($this->updated);
    }

    /**
     * Is the entity validated ?
     *
     * @return bool
     */
    public function isEnabled()
    {
        return self::ACCEPTE === $this->status;
    }

    /**
     * Is the entity waiting for a validation ?
     *
     * @return bool
     */
    public function isWaiting()
    {
        return self::EN_ATTENTE === $this->status;
    }

    /**
     * Is the entity rejected ?
     *
     * @return bool
     */
    public function isRejected()
    {
        return self::REFUSE === $this->status;
    }
}
