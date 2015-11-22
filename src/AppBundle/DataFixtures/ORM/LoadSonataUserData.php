<?php
/**
 * This file is part of the PokeMe Application.
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
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

/**
 * Load Users of Jdr Application.
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
class LoadSonataUserData extends AbstractLoadData implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * Members are referenced from 1 to 250.
     *
     * @var int
     */
    const MEMBERS = 250;

    /**
     * Admins are referenced from 251 to 300.
     *
     * @var int
     */
    const ADMINISTRATORS = 300;

    /**
     * SUPER_ADMIN are referenced from 301 to 305.
     *
     * @var int
     */
    const SUPERADMIN = 305;

    /**
     * Load data to database.
     *
     * @param ObjectManager $em Doctrine entity manager
     */
    public function load(ObjectManager $em)
    {
        //Données de tests
        if ($this->isEnvironment(array('test', 'dev'))) {
            /**
             * @var \Sonata\UserBundle\Entity\UserManager
             */
            $userManager = $this->container->get('fos_user.user_manager');
            $birth = date_create('1985-10-10');
            $oneDay = new \DateInterval('P1D');
            $members[] = array();
            $administrators = array();
            $superAdmins = array();

            //Members creation
            for ($index = 1; $index < self::MEMBERS; ++$index) {
                /**
                 * @var \Application\Sonata\UserBundle\Entity\User
                 */
                $members[$index] = $userManager->createUser();
                $members[$index]->setEmail("membre$index@example.org");
                $members[$index]->setWebsite("www$index.example.org");
                $members[$index]->setBiography("Biographie de membre $index");
                $members[$index]->setDateOfBirth($birth->add($oneDay));
                $members[$index]->setEnabled((0 != $index % 5));
                $members[$index]->setLocked((0 == $index % 10));
                $members[$index]->setLastname("Membre$index");
                $members[$index]->setFirstname("Membre$index");
                $members[$index]->setUsername("Membre$index");
                $encoder = $this->container->get('security.encoder_factory')->getEncoder($members[$index]);
                $members[$index]->setPassword($encoder->encodePassword('secret', $members[$index]->getSalt()));
                $members[$index]->addGroup($this->getReference('group-user'));
                $members[$index]->setLocale('fr_FR');
                $members[$index]->setTimezone('Europe/Paris');
            }

            for ($index = self::MEMBERS; $index < self::ADMINISTRATORS; ++$index) {
                $administrators[$index] = $userManager->createUser();
                $administrators[$index]->setEmail("administrator$index@example.org");
                $administrators[$index]->setWebsite("www$index.example.org");
                $administrators[$index]->setBiography("Biographie de administrator$index");
                $administrators[$index]->setDateOfBirth($birth->add($oneDay));
                $administrators[$index]->setEnabled(true);
                $administrators[$index]->setFirstname("administrator$index");
                $administrators[$index]->setUsername("administrator$index");
                $encoder = $this->container->get('security.encoder_factory')->getEncoder($administrators[$index]);
                $administrators[$index]->setPassword($encoder->encodePassword('secret', $administrators[$index]->getSalt()));
                $administrators[$index]->addGroup($this->getReference('group-user'));
                $administrators[$index]->addGroup($this->getReference('group-admin'));
                $administrators[$index]->setLocale('fr_FR');
                $administrators[$index]->setTimezone('Europe/Paris');
            }
            for ($index = self::ADMINISTRATORS; $index < self::SUPERADMIN; ++$index) {
                $superAdmins[$index] = $userManager->createUser();
                $superAdmins[$index]->setEmail("superAdmin$index@example.org");
                $superAdmins[$index]->setWebsite("www$index.example.org");
                $superAdmins[$index]->setBiography("Biographie de superAdmin $index");
                $superAdmins[$index]->setDateOfBirth($birth->add($oneDay));
                $superAdmins[$index]->setEnabled(true);
                $superAdmins[$index]->setFirstname("superAdmin$index");
                $superAdmins[$index]->setUsername("superAdmin$index");
                $encoder = $this->container->get('security.encoder_factory')->getEncoder($superAdmins[$index]);
                $superAdmins[$index]->setPassword($encoder->encodePassword('secret', $superAdmins[$index]->getSalt()));
                $superAdmins[$index]->addGroup($this->getReference('group-super-admin'));
                $superAdmins[$index]->setLocale('fr_FR');
                $superAdmins[$index]->setTimezone('Europe/Paris');
            }

            //Enregistrement des données de tests
            foreach ($members as $member) {
                $userManager->updateUser($member);
            }
            foreach ($administrators as $administrator) {
                $userManager->updateUser($administrator);
            }
            foreach ($superAdmins as $superAdmin) {
                $userManager->updateUser($superAdmin);
            }

            //Référencement des données de tests
            foreach ($members as $index => $member) {
                $this->addReference("user-member-$index", $member);
            }
            foreach ($administrators as $index => $administrator) {
                $this->addReference("user-administrator-$index", $administrator);
            }
            foreach ($superAdmins as $index => $superAdmin) {
                $this->addReference("user-super-admin-$index", $superAdmin);
            }
        }
    }

    /**
     * Order of these data to be load.
     *
     * @return int
     */
    public function getOrder()
    {
        return 20; // the order in which fixtures will be loaded
    }
}
