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
 * Classement Entity.
 *
 * @category Entity
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
abstract class AbstractOwned
{
    /**
     * Classement accepté.
     *
     * @var int
     */
    const ACCEPTE = 1;
    /**
     * Classement mis en attente par défaut.
     *
     * @var int
     */
    const EN_ATTENTE = 2;

    /**
     * Classement refusé.
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
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var User
     */
    private $owner;

    /**
     * @var string
     */
    private $reason;

    /**
     * @var int
     */
    private $status = 2;

    /**
     * @var string
     */
    private $url;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var \DateTime
     */
    private $validated;

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
     * Set name.
     *
     * @param string $name
     *
     * @return Classement
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Classement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set owner.
     *
     * @param User $owner
     *
     * @return Classement
     */
    public function setOwner(User $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner.
     *
     * @return User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set statut.
     *
     * @param int $status
     *
     * @return Classement
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
     * Set url.
     *
     * @param string $url
     *
     * @return Classement
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set validator.
     *
     * @param User $validator
     *
     * @return Classement
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
     * @return Site
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
     * Set created.
     *
     * @param \DateTime $created
     *
     * @return Classement
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
     * Set updated.
     *
     * @param \DateTime $updated
     *
     * @return Classement
     */
    public function setUpdated($updated)
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
     * Set validated.
     *
     * @param \DateTime $validated
     *
     * @return Classement
     */
    public function setValidated($validated)
    {
        $this->validated = $validated;

        return $this;
    }

    /**
     * Get validated.
     *
     * @return \DateTime
     */
    public function getValidated()
    {
        return $this->validated;
    }

    /**
     * Is validated.
     *
     * @return bool
     */
    public function isValidated()
    {
        return !is_null($this->validated);
    }

    /**
     * Initialize Creation Date.
     *
     * @return Classement
     */
    public function setCreatedValue()
    {
        if (!$this->getCreated()) {
            $this->created = new \DateTime();
        }

        return $this;
    }

    /**
     * Update Updated Date.
     *
     * @return Classement
     */
    public function setUpdatedValue()
    {
        $this->updated = new \DateTime();

        return $this;
    }
}