<?php
/**
 * This file is part of the PokeMe Application.
 *
 * PHP version 5
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category Repository
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2015 Alexandre Tranchant
 * @license   GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
namespace Application\Sonata\UserBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * User Repository.
 *
 * @category Repository
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class UserRepository extends EntityRepository
{
    /**
     * Return active user count.
     *
     * @return int
     */
    public function userCount()
    {
        //Active users count
        $query = $this->getEntityManager()->createQuery(
            'SELECT count(u.id) as userCount
                    FROM ApplicationSonataUserBundle:User u');
        $nUser = $query->getSingleScalarResult();
        $query->free();

        return $nUser;
    }

    /**
     * Return active user count.
     *
     * @return int
     */
    public function activeUserCount()
    {
        //Active users count
        $query = $this->getEntityManager()->createQuery(
            'SELECT count(u.id) as userCount
                    FROM ApplicationSonataUserBundle:User u
                   WHERE u.enabled = 1');
        $nActive = $query->getSingleScalarResult();
        $query->free();

        return $nActive;
    }

    /**
     * Return inactive user count.
     *
     * @return int
     */
    public function inactiveUserCount()
    {
        $query = $this->getEntityManager()->createQuery(
            'SELECT count(u.id) as userCount
                    FROM ApplicationSonataUserBundle:User u
                   WHERE u.enabled = 0');
        $nInactive = $query->getSingleScalarResult();
        $query->free();

        return $nInactive;
    }

    /**
     * Return administrator user count.
     *
     * @return int
     */
    public function administratorUserCount()
    {

        //Active administrators count
        $qb = $this->getEntityManager()->createQueryBuilder()->from('ApplicationSonataUserBundle:User', 'u');
        $query = $qb->select('COUNT(DISTINCT u.id) as userCount')
        ->innerJoin('u.groups', 'g')
        ->where('g.name = :name')
        ->andwhere('u.enabled = :enabled')
        ->setParameters(array(
            'name' => 'Administrateur',
            'enabled' => 1,
        ))
        ->getQuery();
        $nAdministrator = $query->getSingleScalarResult();
        $query->free();

        return $nAdministrator;
    }

    /**
     * Return banned user count.
     *
     * @return int
     */
    public function bannedUserCount()
    {
        //Banned users count
        $query = $this->getEntityManager()->createQuery(
            'SELECT count(u.id) as userCount
                        FROM ApplicationSonataUserBundle:User u
                       WHERE u.locked = 1');
        $nBanned = $query->getSingleScalarResult();
        $query->free();

        return $nBanned;
    }
}
