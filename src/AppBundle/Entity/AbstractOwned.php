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

use AppBundle\Model\DescriptionInterface;
use AppBundle\Model\IpTraceableInterface;
use AppBundle\Model\TimestampableInterface;
use Application\Sonata\UserBundle\Entity\User;

/**
 * AbstractOwned Entity.
 *
 * @category Entity
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
abstract class AbstractOwned extends AbstractEntity implements
    IpTraceableInterface,
    TimestampableInterface,
    DescriptionInterface
{
    /**
     * Persistant identifier.
     *
     * @var int
     */
    protected $id;

    /**
     * Name of the entity.
     *
     * @var string
     */
    protected $name;

    /**
     * Description of the entity.
     *
     * @var string
     */
    protected $description;

    /**
     * Owner of the Entity.
     *
     * @var User
     */
    protected $owner;

    /**
     * Url of the entity.
     *
     * @var string
     */
    protected $url;

    /**
     * Url slugified.
     *
     * @var string
     */
    protected $slugUrl;

    /**
     * Name slugified.
     *
     * @var string
     */
    protected $slugName;

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
     * @return AbstractOwned
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
     * @return AbstractOwned
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
     * @return AbstractOwned
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
     * Set url.
     *
     * @param string $url
     *
     * @return AbstractOwned
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
     * Get Slug URL without http|https.
     *
     * @return string
     */
    public function getSlugUrl()
    {
        return $this->slugUrl;
    }

    /**
     * Get Slug Name.
     *
     * @return mixed
     */
    public function getSlugName()
    {
        return $this->slugName;
    }

    /**
     * Setter of slugUrl.
     *
     * @param string $slugUrl
     *
     * @return DescriptionInterface
     */
    public function setSlugUrl($slugUrl)
    {
        $this->slugUrl = $slugUrl;

        return $this;
    }

    /**
     * Getter of slug url.
     *
     * @param string $slugName
     *
     * @return DescriptionInterface
     */
    public function setSlugName($slugName)
    {
        $this->slugName = $slugName;

        return $this;
    }

    /**
     * Return the name of the site.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
