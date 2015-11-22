<?php
/**
 * This file is part of the JDR Application.
 *
 * PHP version 5
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category LoadDataFixture
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2015 Alexandre Tranchant
 * @license   GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Application\Sonata\UserBundle\Entity\Group;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

/**
 * Loading default group.
 *
 * @category LoadDataFixture
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 *
 * @codeCoverageIgnore
 */
class LoadSonataGroupData extends AbstractLoadData implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * Load data to database.
     *
     * @param ObjectManager $em Doctrine entity manager
     */
    public function load(ObjectManager $em)
    {

        /**
         * @var \Sonata\UserBundle\Entity\GroupManager
         */
        $groupManager = $this->container->get('fos_user.group_manager');

        //Declaration
        $membre = $groupManager->createGroup('Membre');
        $membre->addRole(Group::ROLE_USER);

        $administrateur = $groupManager->createGroup('Administrateur');
        $administrateur->addRole(Group::ROLE_ADMIN);

        $superAdmin = $groupManager->createGroup('Root');
        $superAdmin->addRole(Group::ROLE_SUPER_ADMIN);

        //Persistance
        $groupManager->updateGroup($membre);
        $groupManager->updateGroup($administrateur);
        $groupManager->updateGroup($superAdmin);

        //Reference
        $this->addReference('group-user', $membre);
        $this->addReference('group-admin', $administrateur);
        $this->addReference('group-super-admin', $superAdmin);
    }

    /**
     * Order of these data to be load.
     *
     * @return int
     */
    public function getOrder()
    {
        return 0; // the order in which fixtures will be loaded
    }
}
