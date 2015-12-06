<?php
/**
 * This file is part of the PokeMe Application.
 *
 * PHP version 5
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category EventListener
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2015 Alexandre Tranchant
 * @license   GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
namespace AppBundle\DoctrineListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\Validation;
use Application\Sonata\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

/**
 * Validation updater.
 *
 * @category DoctrineLister
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class ValidationUpdater implements ContainerAwareInterface
{
    /**
     * The container Intrface
     *
     * @var ContainerInterface|null
     */
    private $container;

    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * If Validation::status change, update the validator.
     *
     * @param LifecycleEventArgs $eventArgs
     */
    public function preUpdate(LifecycleEventArgs $eventArgs)
    {
        $entity = $eventArgs->getEntity();
        if ($entity instanceof Validation) {
            $changeSet = $eventArgs->getEntityManager()->getUnitOfWork()->getEntityChangeSet($entity);
            $user = $this->getUser();
            if (array_key_exists('status', $changeSet) && !empty($user)) {
                $entity->setValidator($user);
            }
        }
    }

    /**
     * Get connected user or false.
     *
     * @return User|false
     */
    public function getUser()
    {
        $token = $this->container->get('security.token_storage')->getToken();
        //Because token can be null !
        if ($token instanceof TokenInterface) {
            $user = $token->getUser();
            if ($user instanceof User) {
                return $user;
            }
        }

        return false;
    }
}
